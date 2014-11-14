#include <stdlib.h>  
#include <stdio.h>  
#include <time.h>
#include <mariadb/mysql.h>  

#include "log.h"
#include "db.h"

int db_test()
{
	vector<task_info_t> tasks;
	OpenDB("192.168.0.96", 3306, "root", "123456", "pwg81");
	GetTask(tasks);
	printf("tasks size: %d\n", tasks.size());
	CloseDB();
	return 0;
}

int mysql_test(){
    MYSQL *conn_ptr; 
    conn_ptr = mysql_init(NULL);  
    if (!conn_ptr) {  
        printf("mysql_init failed\n");  
        return EXIT_FAILURE;  
    }  
    conn_ptr = mysql_real_connect(conn_ptr, "localhost", "root", "123456", "test", 0, NULL, 0);   
    if (conn_ptr) {  
        printf("Connection success\n");  
    } else {  
        printf("Connection failed\n");  
    }  
    mysql_close(conn_ptr);  
    return EXIT_SUCCESS;  
}  

int log_test()
{
	int n = 245;
	const char *str = "hello log";
	OpenLog("test.log", 1);
	Logging(E_LOG_ERROR, "test error - %d", n);
	Logging(E_LOG_WARNNING, "test waring - %s", str);
	Logging(E_LOG_INFO, "test info - %d", n);
	Logging(E_LOG_DEBUG, "test debug - %s", str);
	CloseLog();
}

int main() {  

	
	time_t time_now = time(NULL);
    struct tm mt;
    localtime_r(&time_now, &mt);

	//log_test();
	db_test();
	return 0;
}

