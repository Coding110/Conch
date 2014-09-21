<?php

$pipe = "/tmp/emfstaskpipe";
$mode = 0600;
$pipe_read_size = 1024;
$pipe_read_sleep = 10000; // 10ms

/*
 *	Create FIFO if not exist
 */
function create_fifo(){
	if(!file_exists($pipe)) {
	   umask(0);
	   posix_mkfifo($pipe,$mode);
	}
}

/*
 *	Package format: [string length] + [blank] + [string]	
 *
 *	@param string $task_msg, a string 
 *	@return string
 *
 *	(obsolete)
 */
function build_task_package($task_msg)
{
	$len = strlen($task_msg);
	$pkg = $len." ".$task_msg;
	return $pkg;	
}

/*
 *	Add task (a line is a task)	
 *	
 *	@param string $task_msg, a string of source file path in EMFS.
 *	@return bool
 *	
 *	Note: $task_msg shouldn't with "\n" or "\r\n"
 */
function task_set($task_msg)
{
	$f = fopen($pipe,"w");
	fwrite($f, $task_msg."\n");
	fclose($f);
}

/*
 *	Parse task and deliver it to callback
 *
 *	@param callable $consume_callback
 *
 */
function task_consume($consume_callback)
{
	create_fifo();
	$f = fopen($pipe, "r");
	while(true)
	{
		$line = stream_get_line($f, $pipe_read_size, "\n");
		if($line != false){
			call_user_func($consume_callback, $line);
		}else{
			usleep($pipe_read_sleep);
		}
	}
}


?>
