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
 *	Package format: [string] + [blank] + [string] + [blank] ...	
 *
 *	@param string $task_msg, a string 
 *	@return string
 *
 */
function build_task_package($task_msg)
{
	$pkg = "";
	foreach($task_msg as $msg){
		$pkg = $pkg.$msg.' ';
	}
	$pkg = $pkg."\n";
	return $pkg;	
}

/*
 *	Add task (a line is a task)	
 *	Task format in a line string: [user id] + [blank] + [image id] + [blank] + [source file path]
 *	
 *	@param array $task_msg, include user id, image id and source file path 
 *	@return bool
 *	
 *	Note: $task_msg shouldn't with "\n" or "\r\n"
 */
function task_set($task_msg)
{
	$f = fopen($pipe,"w");
	$cont = build_task_package($task_msg);
	fwrite($f, $cont);
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

/*
 *	Test
 */
//$msgs = array();
//$msgs[] = "2";
//$msgs[] = "5";
//$msgs[] = "/tmp/a.png";
//$cont = build_task_package($msgs);
//echo $cont;

?>
