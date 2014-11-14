#include <stdio.h>

#include "task_thread.h"
#include "emfs.h"

void *emfs_task_func(void *arg);

int main_init();

int main(int argc, char *argv[])
{
	main_init();
	task_thread_create(5, emfs_task_func, NULL);
	task_thread_join();
	return 0;
}

int main_init()
{
	return 0;
}

void *emfs_task_func(void *arg)
{
	printf("arg = %p\n", arg);
	int *n, m;// = (int)malloc(sizeof(int));
	n = (int*)arg;
	m = *n;
	while(1)
	{
		printf("I'm thread %d\n", m);
		sleep(m+1);
	}
	return (void*)0;
}
