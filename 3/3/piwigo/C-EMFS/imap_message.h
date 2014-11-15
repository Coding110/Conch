#ifndef _HEDADER_IMAP_MSG_
#define _HEDADER_IMAP_MSG_

#include <iostream>
#include <string>
#include <vector>
using namespace std;
//using namespace std::string;
//using namespace std::vector;

typedef struct _key_value_t
{
	string key;
	string value;
}key_value_t;

typedef struct _imap_msg_t
{
	vector<key_value_t> heads;
	char *body; // 引用外部内存指针
	long long body_len;
}imap_msg_t;

imap_msg_t *imap_msg_new();
int imap_msg_free(imap_msg_t *msg);
int imap_mime_head_set(imap_msg_t *pmsg, const char *title, const char *value);
char *imap_mime_heads_get(imap_msg_t *pmsg, long long &heads_len);
int imap_body_set(imap_msg_t *pmsg, const char *pbuf, const long long buf_len);
char *imap_body_get(imap_msg_t *pmsg, long long &body_len);
//int imap_msg_get(char **msg_buf, int *msg_len);

#endif
