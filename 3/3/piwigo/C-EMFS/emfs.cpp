#include <stdio.h>
#include <unistd.h>
#include <libetpan/libetpan.h>
#include <libetpan/connect.h>
#include "db.h"
#include "log.h"
#include "imap_message.h"
#include "base64.h"

#define MAX_MAIL_FILE_SIZE 4194304 // 4MB

static int thread_count = 0;
static int thread_sleep = 5; // seconds

int emfs_task_consume(vector<task_info_t> &tasks);
int imap_upload(task_info_t &task, mail_info_t &mail_info);

void *emfs_task_start(void *arg)
{
	printf("emfs task thread %d start\n", ++thread_count);
	
	vector<task_info_t> tasks;
	int tasks_count = 0;
	while(1)
	{
		tasks_count = GetTask(tasks);
		if(tasks_count <= 0){
			sleep(thread_sleep);
		}else{
			// do task
			emfs_task_consume(tasks);
		}
	}//end while


	return (void*)0;
}

int emfs_task_consume(vector<task_info_t> &tasks)
{
	int len = tasks.size();
	long long last_uid = -1;
	int ret = 0;
	mail_info_t mail_info;
	for(int i = 0; i < len; i++)
	{
		//if(tasks[i].status == 0)
		if(i == 0 || tasks[i].uid != task[i-1].uid){
			ret = GetMailInfo(tasks[i].uid, mail_info);
		}

		if(0 == ret)
		{
			imap_upload(task[i], mail_info;);
		}else{
			tasks[i].status = 3;
		}
	}

	return 0;
}

int imap_upload(task_info_t &task, mail_info_t &mail_info)
{
	mailimap * imap;
    mailstream *ms;
	int fd, r;
	char strtmp[256];

	imap = mailimap_new(0, NULL);
	if(mail_info.imapport == 143){
    	fd = mail_tcp_connect(mail_info.imapserver, mail_info.imapport);
    	ms = mailstream_socket_open(fd);
    	r = mailimap_connect(imap, ms);
	}else if(mail_info.imapport == 993){
        r = mailimap_ssl_connect(imap, mail_info.imapserver, mail_info.imapport);
	}

	if(check_error(r) != 0)
	{
		// 有些imap必须使用SSL连接
        r = mailimap_ssl_connect(imap, mail_info.imapserver, mail_info.imapport);
		if(check_error(r) != 0){
			Logging(E_LOG_ERROR, "imap connect failed, imap server: %s", mail_info.imapserver);
			return -1;
		}
	}

	//
	r = mailimap_login(imap, mail_info.email, mail_info.passwd);
	if(check_error(r) != 0){
		Logging(E_LOG_ERROR, "imap login failed, mail: %s", mail_info.email);
		return -1;
	}
   
	// 邮箱文件夹的命名：BKT_{user id}_{category id} 
	char maildir[64];
	snprintf(maildir, 64, "BKT_%lld_%lld", task.uid, task_catid); 
	check_maildir(maildir);
    r = mailimap_select(imap, maildir);
	if(check_error(r) != 0){
		Logging(E_LOG_ERROR, "imap select failed, mail box: %s.", maildir);
		return -1;
	}

	// 上传文件到邮箱
	//
	struct stat img_stat;
	struct mailimap_date_time * date_time = now_date_for_mail();
	long long fsize; // file size
	long long rsize; // read size
	long long ssize; // sending size
	uint32_t last_mailid;

	// 上传原图
	//
	// 大部分imap在append之后返回UID（像163邮箱等）
	// 但有些imap在select时，预测UID（像QQ邮箱）
    uint32_t mUIDNext = imap->imap_selection_info->sel_uidnext;
	imap_msg_t *p_imap_msg = imap_msg_new();

	// 设置头信息
	imap_mime_head_set("From", "Photos backup<photos@backup.becktu.com>");
	imap_mime_head_set("To", mail_info.email);

	snprintf(strtmp, 256, "%s - 自来becktu.com的照片备份", mail_info.md5);
	char *head_encode = mime_head_encode(strtmp);
	imap_mime_head_set("Subject", head_encode);
	delete[] head_encode;

	imap_mime_head_set("EMFS", "1");
	imap_mime_head_set("FNAME", mail_info.orig_filename);
	imap_mime_head_set("FTYPE", "");

	stat(mail_info.orig_img, &img_stat);
	snprintf(strtmp, 256, "%d", img_stat.st_size);
	imap_mime_head_set("FSIZE", strtmp);

	snprintf(strtmp, 256, "becktu.com %s", mail_info.username);
	imap_mime_head_set("FOWNER", strtmp);
	imap_mime_head_set("FMD5", mail_info.md5);

	fsize = img_stat.st_size;
	rsize = 0;
	last_mailid = -1; // 存储图片的第一封邮件的上一个mail id为-1
	// 图片为邮件的正文，图片太大时，分开存储
	while(rsize < fsize){

		if(fsize - rsize > MAX_MAIL_FILE_SIZE)
		{
		    ssize = MAX_MAIL_FILE_SIZE;
		}else{
		    ssize = fsize - rsize;
		}

		snprintf(strtmp, 256, "%d", ssize);
		imap_mime_head_set("PSIZE", strtmp);
		snprintf(strtmp, 256, "%d", last_mailid);
		imap_mime_head_set("LAST-MAILID", strtmp);

		r = mailimap_append(imap, 
    	        maildir,
    	        0,//flag_list,
    	        date_time,
    	        cont, 
    	        strlen(cont));

    	uint32_t uidvr, uidr;
    	r = mailimap_uidplus_append(imap, "INBOX",
    	        0,
    	        date_time,
    	        cont, strlen(cont),
    	        &uidvr,
    	        &uidr);

    	check_error(r, "could not append INBOX");
    	printf("imap append: %u - %u\n", uidvr, uidr);
	}

	// 上传网络查看图
	//

	imap_msg_free(p_imap_msg);

	return 0;
}

/*
 * 	检查邮箱文件夹是否存在，不存在就创建
 * 	@return 0 - OK, else - failed
 */
int check_maildir(mailimap *imap, const char *maildir)
{
    int r = mailimap_select(imap, maildir);
	if(check_error(r) != 0){
		r = mailimap_create(imap, maildir);
		if(check_error(r) != 0){
			Logging(E_LOG_ERROR, "imap create failed, mail box: %s.", maildir);
			return -1;
		}
	}
	return 0;
}

/*
 *	@return encoded head with 0-terminated, caller should delete[] the memory
 */
char *mime_head_encode(const char *value)
{
    //$hdmsg = "=?UTF-8?B?".base64_encode($msg)."?=";
    //@syslog(LOG_INFO, "headers encode: ".$hdmsg);
    //return $hdmsg;
    
	char *pbase64 = base64Encode(value, strlen(value));
	int enc_buf_len = strlen(pbase64) + 20;
	char *enc_buf = new char[enc_buf_len];
	snprintf(enc_buf, enc_buf_len, "=?UTF-8?B?%s?=", pbase64);
	delete[] pbase64;
	return enc_buf;
}
/*
 * 	@return 0 - OK, else - failed
 */
int check_error(int r)
{
	if (r == MAILIMAP_NO_ERROR)
		return 0;
	if (r == MAILIMAP_NO_ERROR_AUTHENTICATED)
		return 0;
	if (r == MAILIMAP_NO_ERROR_NON_AUTHENTICATED)
		return 0;

	//fprintf(stderr, "%s [%d]\n", msg, r);
	return -1;
}
