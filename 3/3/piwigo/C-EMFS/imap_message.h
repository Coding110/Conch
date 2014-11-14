#ifndef _HEDADER_IMAP_MSG_
#define _HEDADER_IMAP_MSG_

typedef struct _imap_msg_t
{
	char *head;
	long long head_len;
	long long head_buffer_len;
	char *body;
	long long body_len;
	long long body_buffer_len;
}imap_msg_t;

imap_msg_t *imap_msg_new();
int imap_msg_free(imap_msg_t *msg);
int imap_mime_head_set(const char *title, const char *value);
int imap_body_set(const char *pbuf, const long long buf_len);
int imap_msg_get(char **msg_buf, int *msg_len);

#endif
