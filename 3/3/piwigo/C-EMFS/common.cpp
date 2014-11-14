#include <stdio.h>
#include <time.h>
#include "common.h"

char *gettime(char *timestr) // 'timestr's length at least 20 bytes.
{
	time_t time_now = time(NULL);
    struct tm mt;
    localtime_r(&time_now, &mt);
    mt.tm_year += 1900;
	sprintf(timestr, "%04d-%02d-%02d %02d:%02d:%02d", 
		mt.tm_year, mt.tm_mon, mt.tm_mday,
		mt.tm_hour, mt.tm_min, mt.tm_sec);
	return timestr;
}
