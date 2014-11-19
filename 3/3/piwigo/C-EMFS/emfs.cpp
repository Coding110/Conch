#include <stdio.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <unistd.h>
#include <errno.h>
#include <string.h>
#include <libetpan/libetpan.h>
#include <libetpan/connect.h>
#include "base64.h"
#include "db.h"
#include "log.h"
#include "imap_message.h"

#define ONE_MB_SIZE 1048576 // 1MB
#define MAX_MAIL_FILE_SIZE 4194304 // 4MB


int emfs_task_consume(vector<task_info_t> &tasks);
int imap_upload(task_info_t &task, mail_info_t &mail_info);
int check_error(int r);
struct mailimap_date_time * now_date_for_mail();
int check_maildir(mailimap *imap, const char *maildir);
char *mime_head_encode(const char *value);
char *thumbnail_encode(const char *th_file);

void *emfs_task_start(void *arg)
{
	static int thread_count = 0;  
	static int thread_sleep = 5;
	printf("emfs task thread %d start\n", ++thread_count);

	//thread_count = 0;
	//thread_sleep = 5; // seconds
	
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
		if(i == 0 || tasks[i].uid != tasks[i-1].uid){
			ret = GetMailInfo(tasks[i].uid, mail_info);
		}

		if(0 == ret)
		{
			imap_upload(tasks[i], mail_info);
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
	int ret = 0;

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
	snprintf(maildir, 64, "BKT_%lld_%lld", task.uid, task.catid); 
	check_maildir(imap, maildir);
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
	struct mailimap_flag_list *flag_list;
	clist *fl_list;
	char *cont_buf = new char[MAX_MAIL_FILE_SIZE + ONE_MB_SIZE]; // 5MB (4MB正文 + 1MB头信息)
	long long cont_buf_pos = 0;
	char *body_buf = new char[MAX_MAIL_FILE_SIZE]; // 4MB 
	long long body_len = 0;
	FILE *fp = NULL;
	char *phead = NULL;
	char *pthumbnail = NULL;
	long long head_len;
	char *image_file = NULL;
	char *image_md5 = NULL;
	char image_filename[256];
	uint32_t mUIDNext;
	imap_msg_t *p_imap_msg;

	p_imap_msg = imap_msg_new();

	// 邮件需要设为已读
	fl_list = clist_new();
	mailimap_flag mail_fl;
	mail_fl.fl_type = MAILIMAP_FLAG_SEEN;
	clist_append(fl_list, &mail_fl); 
	flag_list = mailimap_flag_list_new(fl_list);


	// i==0, 上传原图; i==1, 上传网络查看图
	for(int i = 0; i < 2; i++){
		if(i == 0){
			image_file = task.orig_img;
			image_md5 = task.orig_md5;
			snprintf(image_filename, 256, "%s", task.orig_filename);
		}else{
			image_file = task.net_img;
			image_md5 = task.net_md5;
			snprintf(image_filename, 256, "%s-net", task.orig_filename);
		}

		// 大部分imap在append之后返回UID（像163邮箱等）
		// 但有些imap在select时，预测UID（像QQ邮箱）
    	mUIDNext = imap->imap_selection_info->sel_uidnext;
		// 设置头信息
		imap_mime_head_set(p_imap_msg, "From", "Photos backup<photos@backup.becktu.com>");
		imap_mime_head_set(p_imap_msg, "To", mail_info.email);

		snprintf(strtmp, 256, "%s - 自来becktu.com的照片备份", image_md5);
		char *head_encode = mime_head_encode(strtmp);
		imap_mime_head_set(p_imap_msg, "Subject", head_encode);
		delete[] head_encode;

		imap_mime_head_set(p_imap_msg, "EMFS", "1");
		imap_mime_head_set(p_imap_msg, "FNAME", image_filename);
		imap_mime_head_set(p_imap_msg, "FTYPE", "");

		stat(image_file, &img_stat);
		snprintf(strtmp, 256, "%d", img_stat.st_size);
		imap_mime_head_set(p_imap_msg, "FSIZE", strtmp);

		snprintf(strtmp, 256, "becktu.com %s", task.username);
		imap_mime_head_set(p_imap_msg, "FOWNER", strtmp);
		imap_mime_head_set(p_imap_msg, "FMD5", image_md5);

		fsize = img_stat.st_size;
		rsize = 0;
		last_mailid = -1; // 存储图片的第一封邮件的上一个mail id为-1

		fp = fopen(image_file, "r");
		if(fp == NULL){
			Logging(E_LOG_ERROR, "Open file '%s' failed, errno[%d], user[%s].", image_file, errno, task.username);
		}
		
		// 图片为邮件的正文，图片太大时，分开存储
		while(rsize < fsize && fp){

			if(fsize - rsize > MAX_MAIL_FILE_SIZE)
			{
			    ssize = MAX_MAIL_FILE_SIZE;
			}else{
			    ssize = fsize - rsize;
			}

			// 部分头信息需要经常改动
			snprintf(strtmp, 256, "%d", ssize);
			imap_mime_head_set(p_imap_msg, "PSIZE", strtmp);
			snprintf(strtmp, 256, "%d", last_mailid);
			imap_mime_head_set(p_imap_msg, "LAST-MAILID", strtmp);

			if(i == 0 && last_mailid == -1){ // 只在保存原图的第一封邮件中保存thumbnail
				pthumbnail = thumbnail_encode(task.th_img);
				imap_mime_head_set(p_imap_msg, "THUMBNAIL", pthumbnail);
				delete[] pthumbnail;
			}

			// 邮件正文
			ret = fread(body_buf, 1, ssize, fp);
			if(ret > 0){
				rsize += ret;
				body_len = ret;
			}

			// 构建邮件内容
			phead = imap_mime_heads_get(p_imap_msg, head_len);
			cont_buf_pos = 0;
			memcpy(cont_buf, phead, head_len);
			cont_buf_pos += head_len;
			memcpy(cont_buf + cont_buf_pos, body_buf, body_len);
			cont_buf_pos += body_len;

    		uint32_t uidvr, uidr;
    		r = mailimap_uidplus_append(imap, 
					maildir,
    		        flag_list, // 着重测试
    		        date_time,
    		        cont_buf, cont_buf_pos,
    		        &uidvr,
    		        &uidr);

			if(check_error(r) != 0){
				Logging(E_LOG_ERROR, "imap append failed, file[%s], mail box[%s], user[%s].", image_file, maildir, task.username);
			}
			Logging(E_LOG_DEBUG, "imap append: %u - %u\n", uidvr, uidr);

			// mail id and 数据库更新 ???????
			// need code here
			
		}//end while

		if(fp) fclose(fp);

	}// end for

	imap_msg_free(p_imap_msg);
	mailimap_flag_list_free(flag_list);
	clist_free(fl_list);
	mailimap_logout(imap);
	mailimap_close(imap); // 不确定是否需要调用
	mailimap_free(imap);

	delete[] cont_buf;
	delete[] body_buf;

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
 *	@return base64 string with 0-terminated, caller should delete[] the memory
 */
char *thumbnail_encode(const char *th_file)
{
	struct stat th_stat;
	stat(th_file, &th_stat);
	FILE *fp = fopen(th_file, "r");
	if(fp == NULL) return NULL;

	char *read_buf = new char[th_stat.st_size];
	char *pbase64 = NULL;
	do{
		size_t ret = fread(read_buf, 1, th_stat.st_size, fp);
		if(ret < 0){
			Logging(E_LOG_ERROR, "Read file '%s' failed, errno[%d].", th_file, errno);
			break;
		}
		pbase64 = base64Encode(read_buf, th_stat.st_size);
	}while(0);

	delete[] read_buf;
	return pbase64;
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

/* 
 * need to free the return point 
 *	Notice: localtime_r函数需要先在main函数中调用下才能用。
 */
struct mailimap_date_time * now_date_for_mail()
{
    time_t time_now = {0};
    time_now = time(NULL);
    struct tm mt;
    localtime_r(&time_now, &mt);
    mt.tm_year += 1900;
    struct mailimap_date_time *midt = mailimap_date_time_new(mt.tm_mday, mt.tm_mon, mt.tm_year,
                mt.tm_hour, mt.tm_min, mt.tm_sec, 800);
    return midt;
}
