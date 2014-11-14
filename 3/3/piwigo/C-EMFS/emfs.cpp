#include <stdio.h>
#include <unistd.h>
#include <libetpan/libetpan.h>
#include <libetpan/connect.h>
#include "db.h"

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
	// 大部分imap在append之后返回UID（像163邮箱等）
	// 但有些imap在select时，预测UID（像QQ邮箱）
    uint32_t mUIDNext = imap->imap_selection_info->sel_uidnext;

	// 上传文件到邮箱

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
