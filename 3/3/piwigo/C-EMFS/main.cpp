#include <stdio.h>
#include <unistd.h>

#include "task_thread.h"
#include "emfs.h"

void *emfs_task_func(void *arg);

int main_init();

int main(int argc, char *argv[])
{
	// 必须在main函数里调用下，后面才能用。
	time_t time_now = time(NULL);
    struct tm mt;
    localtime_r(&time_now, &mt);

	OpenDB(); // 数据库连接信息读取配置文件
	main_init();
	task_thread_create(5, emfs_task_start, NULL);
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
