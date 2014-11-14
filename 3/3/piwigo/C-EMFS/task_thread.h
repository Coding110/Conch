#ifndef _HEDADER_THD_
#define _HEDADER_THD_

#include <pthread.h>

//typedef void *(*pthd_func)(void*);
int task_thread_create(int n, void *(*pthd_func)(void*) , void *arg);
int task_thread_join();

#endif
