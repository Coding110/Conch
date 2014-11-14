#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>

static pthread_t *pthd_handlers;
static int pthd_count;
//int task_thread_create(int n, pthd_func *fpthdcb, void *arg)
int task_thread_create(int n, void *(*pthd_func)(void*) , void *arg)
{
	int ret = 0, i, *argn;
	pthd_count = n;
	pthd_handlers = (pthread_t*)malloc(n * sizeof(pthread_t));
	for(i = 0; i < n; i++)
	{
		ret = pthread_create(&pthd_handlers[i], NULL, pthd_func, arg);
		//argn = (int*)malloc(sizeof(int));
		//*argn = i;
		//ret = pthread_create(&pthd_handlers[i], NULL, pthd_func, argn);
		if(ret != 0){
			fprintf(stderr, "pthread_create failed [%d]\n", ret);
		}
	}

	return 0;
}

int task_thread_join()
{
	int i;
	for(i = 0; i < pthd_count; i++)
	{
		fprintf(stdout, "pthread_join %d, hd: %p\n", i, pthd_handlers[i]);
		pthread_join(pthd_handlers[i], NULL);
	}

	return 0;
}

