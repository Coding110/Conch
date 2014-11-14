#include <stdlib.h>  
#include <stdio.h>  
#include <string.h>  
#include <mariadb/mysql.h>  
#include <pthread.h>
#include "db.h"
#include "common.h"
//#include <vector>
//using namespace std;

static MYSQL *db_conn; 
static pthread_mutex_t db_mutex;
static const char *task_table = "piwigo_emfs_tasks";
static const char *mail_table = "piwigo_emfs_mails";
static const char *image_table = "piwigo_emfs_images";
static int task_size = 10;

int OpenDB(const char *host, int port, const char *usr, const char *passwd, const char *db)
{
    db_conn = mysql_init(NULL);  
    if (!db_conn) {  
        fprintf(stderr, "mysql_init failed\n");  
        return -1;  
    }  
    db_conn = mysql_real_connect(db_conn, host, usr, passwd, db, port, NULL, 0);   
    if (db_conn == NULL) {  
        fprintf(stderr, "mysql connect failed\n");  
		return -1;
    }  
	pthread_mutex_init(&db_mutex, NULL);
	return 0;
}

int CloseDB()
{
    mysql_close(db_conn);  
	pthread_mutex_destroy(&db_mutex);
	return 0;
}

/*
 *		@return -1 or tasks.size()
 */
int GetTask(vector<task_info_t> &tasks)
{
	int ret = 0;
	pthread_mutex_lock(&db_mutex);
	
	do{
		char query[1024] = {0};
		//snprintf(query, 1024, "select * from %s order by 'id' limit 0,%d", task_table, task_size);
		snprintf(query, 1024, "select * from %s where status = 0 order by uid limit 0,%d", task_table, task_size);

		if(mysql_query(db_conn, query) != 0){
			fprintf(stderr, "db query failed in 'GetTask', error: %s\n", mysql_error(db_conn));
			ret = -1;
			break;
		}

		MYSQL_RES *res = mysql_store_result(db_conn); 
		if(res == NULL){
			fprintf(stderr, "db store result failed in 'GetTask', error: %s\n", mysql_error(db_conn));
			ret = -1;
			break;
		}

		MYSQL_ROW row;
		task_info_t itask;
		unsigned long *lengths;
		int i;
		char timenow[24] = {0};
		unsigned int num_fields = mysql_num_fields(res);
		
		gettime(timenow);

		while ((row = mysql_fetch_row(res)))
		{
			memset(&itask, 0, sizeof(task_info_t));
			lengths = mysql_fetch_lengths(res);
			itask.uid = atoll(row[1]);
			itask.imgid = atoll(row[2]);
			itask.catid = atoll(row[3]);
			memcpy(itask.orig_img, row[4], lengths[4]);
			memcpy(itask.net_img, row[5], lengths[5]);
			memcpy(itask.th_img, row[6], lengths[6]);
			itask.status = atoll(row[7]);
			tasks.push_back(itask);	

			// update status
			snprintf(query, 1024, "update %s set status=1, exec_time='%s' where fid=%d", task_table, timenow, itask.imgid);
			if(mysql_query(db_conn, query) != 0){
				fprintf(stderr, "db update failed in 'GetTask', error: %s\n", mysql_error(db_conn));
				ret = -1;
				break;
			}
		}

		mysql_free_result(res);
	}while(0);

	pthread_mutex_unlock(&db_mutex);

	if(ret == 0) ret = tasks.size();
	return ret;
}

int TaskComplete(vector<task_info_t> &tasks)
{
	int ret = 0;
	char timenow[24] = {0};
	gettime(timenow);

	pthread_mutex_lock(&db_mutex);

	int len = tasks.size();
	for(int i = 0; i < len; i++)
	{
		if(tasks[i].status == 2) // task complete success, detele it. 
		{
			if(ImageUpdate(tasks[i].imgid, tasks[i].orig_img) == 0){
				snprintf(query, 1024, "delete %s where fid=%d", task_table, tasks[i].imgid);
			}else{
				snprintf(query, 1024, "update %s set status=3, exec_time='%s' where fid=%d", 
					task_table, timenow, tasks[i].imgid);
			}
		}else{ // maybe some error, does not delete, just update its status
			snprintf(query, 1024, "update %s set status=%d, exec_time='%s' where fid=%d", 
				task_table, tasks[i].status, timenow, tasks[i].imgid);
		}

		if(mysql_query(db_conn, query) != 0){
			fprintf(stderr, "db update failed in 'GetTask', error: %s\n", mysql_error(db_conn));
			ret = -1;
			break;
		}

	} // end for

	pthread_mutex_unlock(&db_mutex);

	return ret;
}

/*
 * 		@orig_image: orignal image file path. network image file and thumbnail image file named like: a.jpg, a-nt.jpg, a-th.jpg	
 */
int ImageUpdate(int image_id, char *orig_image)
{
	int ret = 0;
	pthread_mutex_lock(&db_mutex);

	do{
		char query[1024];
		snprintf(query, 1024, "update %s set path='%s' where id=%d", image_table, orig_image, image_id);
		if(mysql_query(db_conn, query) != 0){
			fprintf(stderr, "db update failed in 'ImageUpdate', error: %s\n", mysql_error(db_conn));
			ret = -1;
			break;
		}
		
	}while(0);

	pthread_mutex_unlock(&db_mutex);
	return 0;
}

int GetMailInfo(long long uid, mail_info_t &mail_info) // mail_info is output parameter
{
	int ret = 0;
	pthread_mutex_lock(&db_mutex);

	do{
		char query[1024] = {0};
		snprintf(query, 1024, "select * from %s where uid = %lld", task_table, uid);

		if(mysql_query(db_conn, query) != 0){
			fprintf(stderr, "db query failed in 'GetMailInfo', error: %s\n", mysql_error(db_conn));
			return -1;
		}

		MYSQL_RES *res = mysql_store_result(db_conn); 
		if(res == NULL){
			fprintf(stderr, "db store result failed in 'GetMailInfo', error: %s\n", mysql_error(db_conn));
			return -1;
		}

		MYSQL_ROW row;

		row = mysql_fetch_row(res);
		if(row){
			lengths = mysql_fetch_lengths(res);
			mail_info.uid = atoll(row[1]);
			memcpy(mail_info.email, row[2], lengths[2]);
			memcpy(mail_info.passwd, row[3], lengths[3]);
			memcpy(mail_info.imapserver, row[4], lengths[4]);
			mail_info.imapport = atoll(row[5]);
		}else{
			ret = -1;
		}

		mysql_free_result(res);
	}

	pthread_mutex_unlock(&db_mutex);

	return ret;
}
