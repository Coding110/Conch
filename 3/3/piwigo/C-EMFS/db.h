#ifndef _HEDADER_DB_
#define _HEDADER_DB_

#include <stdio.h>
#include <vector>
using namespace std;

/*
 * 		structs define
 */
typedef struct _task_info_t{
	long long uid;
	long long imgid;
	long long catid;
	char orig_img[256];
	char net_img[256];
	char th_img[256];
	int status;
	time_t add_time;
	time_t exec_time;
}task_info_t;

typedef struct _mail_info_t{
	long long uid;
	char email[128];
	char passwd[512];
	char imapserver[256];
	int imapport;
}mail_info_t;

/*
 *		main function
 */
int OpenDB(const char *host, int port, const char *usr, const char *passwd, const char *db);
int CloseDB();
int GetTask(vector<task_info_t> &tasks);
int TaskComplete(vector<task_info_t> &tasks);
int ImageUpdate(int image_id, char *orig_image);
int GetMailInfo(long long uid, mail_info_t &mail_info); // mail_info is output parameter

#endif

