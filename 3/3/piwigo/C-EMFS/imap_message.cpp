
#include "imap_message.h"

#define HEAD_BUF_SIZE 4096 // 4KB
#define BODY_BUF_SIZE  4194304// 4MB
imap_msg_t *imap_msg_new()
{
	imap_msg_t *pmsg = new imap_msg_t; 
	pmsg->head = new char[HEAD_BUF_SIZE];
	pmsg->head_buffer_len = HEAD_BUF_SIZE; 
	pmsg->head_len = 0;
	pmsg->body = new char[BODY_BUF_SIZE];
	pmsg->body_buffer_len = BODY_BUF_SIZE;
	pmsg->body_len = 0;
}

int imap_msg_free(imap_msg_t *msg)
{
	delete[] pmsg->title;
	delete[] pmsg->body;
	delete pmsg;
}

int imap_mime_head_set(const char *title, const char *value)
{
	return 0;
}

int imap_body_set(const char *pbuf, const long long buf_len)
{
	return 0;
}

/*
 *
 */
int imap_msg_get(char **msg_buf, int *msg_len)
{
	return 0;
}

