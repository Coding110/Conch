
#include "imap_message.h"
#include "log.h"

#define HEAD_BUF_SIZE 1048576 // 1MB 
#define BODY_BUF_SIZE  4194304// 4MB

int find_head_by_key(vector<key_value_t> &heads, const char *key);

imap_msg_t *imap_msg_new()
{
	imap_msg_t *pmsg = new imap_msg_t; 
}

int imap_msg_free(imap_msg_t *pmsg)
{
	pmsg->heads.clear();
	delete pmsg;
}

/*
 *	邮件头信息以key-value形式存放在向量里
 *	注：存在相同的key值，替换其value
 */
int imap_mime_head_set(imap_msg_t *pmsg, const char *title, const char *value)
{
	if(pmsg == NULL){
		Logging(E_LOG_WARNNING, "imap message object can't be NULL.");
		return -1;
	}

	int idx = find_head_by_key(pmsg->heads, title);
	if(idx < 0){ // 之前添加的头信息里没有就新建
		key_value_t kv;
		kv.key = title;
		kv.value = value;
		pmsg->heads.push_back(kv);
	}else{ // 之前添加的头信息里有就替换其value
		pmsg->heads[idx].value = value;
	}
	return 0;
}

/*
 *	把向量里所有的key-value构建成邮件的字符串形式，并返回
 *	注：1.内存空间需要外部delete[]来回收；
 *		2.头信息与正文之间多一个'\r\n'已经包含在内；
 */
char *imap_mime_heads_get(imap_msg_t *pmsg, long long &heads_len)
{
	if(pmsg == NULL){
		Logging(E_LOG_WARNNING, "imap message object can't be NULL.");
		return NULL;
	}

	//long long total_need_size = 0;
	//for(int i = 0; i < pmsg->heads.size(); i++)
	//{
	//	total_need_size += pmsg->heads[i].key.size() + pmsg->heads[i].value.size() + 4; // '\r\n'、':'和空格，共额外需要4个字节
	//}
	//total_need_size += 2; //头信息与正文之间多一个'\r\n'

	char *head_buf = new char[HEAD_BUF_SIZE]; // 此处大小为估算的，一般不会超过1MB
	//long long max_head_buf_size = HEAD_BUF_SIZE;
	long long head_buf_pos = 0;
	for(int i = 0; i < pmsg->heads.size(); i++)
	{
		snprintf(head_buf + head_buf_pos, HEAD_BUF_SIZE - head_buf_pos, "%s: %s\r\n", pmsg->heads[i].key.c_str(), pmsg->heads[i].value.c_str());
		head_buf_pos += pmsg->heads[i].key.size() + pmsg->heads[i].value.size() + 4;
	}

	snprintf(head_buf + head_buf_pos, HEAD_BUF_SIZE - head_buf_pos, "\r\n");
	head_buf_pos += 2;
	heads_len = head_buf_pos;

	return head_buf;
}

/*
 *	暂时不需要
 */
char *imap_body_get(imap_msg_t *pmsg, long long &body_len)
{
	if(pmsg == NULL){
		Logging(E_LOG_WARNNING, "imap message object can't be NULL.");
		return NULL;
	}

	return 0;
}

/*
 *	暂时不需要
 */
int imap_body_set(imap_msg_t *pmsg, const char *pbuf, const long long buf_len)
{
	if(pmsg == NULL){
		Logging(E_LOG_WARNNING, "imap message object can't be NULL.");
		return -1;
	}

	return 0;
}

int find_head_by_key(vector<key_value_t> &heads, const char *key)
{
	int idx = -1;
	for(int i = 0; i < heads.size(); i++)
	{
		if(heads[i].key.compare(key) == 0){
			idx = i;
			break;
		}
	}
	return idx;
}  

