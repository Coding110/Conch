<?php

global $pipe;
global $mode;
global $pipe_read_size;
global $pipe_read_sleep;

$pipe = "/tmp/emfstaskpipe";
//$mode = 0600;
$mode = 0666;
$pipe_read_size = 1024;
$pipe_read_sleep = 100000; // 100ms

/*
 *	Create FIFO if not exist
 */
function create_fifo(){
	global $pipe;
	global $mode;
	//echo "create fifo, pipe name: ".$pipe.", file exists: ".file_exists($pipe)."\n";
	if(!file_exists($pipe)) {
		//echo "mk fifo\n";
	   $old = umask(0);
	   //echo "old mask 1: ".$old."\n";
	   $ret = posix_mkfifo($pipe,$mode);
	   //$old = umask($old);
		//echo "<div>mkfifo: ".$ret."</div>";
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
 *	@param array $task_msg, include user id, image id and source file path and so on, serialize $photoinfo of 'photo_upload' trigger event.
 *	@return bool
 *	
 *	Note: $task_msg shouldn't with "\n" or "\r\n"
 */
function task_set($task_msg)
{
	global $pipe;
	create_fifo();
	//echo "<div>pipe name: ".$pipe.", task set: , user: ".get_current_user().", posix uid: ".posix_getuid().", my uid: ".getmyuid()."</div>";
	$f = fopen($pipe,"w");
	//$cont = build_task_package($task_msg);
	$ret = fwrite($f, $task_msg."\n");
	//echo "<div>pipe write: ".$ret."</div>";
	fflush($f);
	fclose($f);
}

// for test
function task_get()
{
	global $pipe, $pipe_read_size;
	$f = fopen($pipe,"r");
	$line = stream_get_line($f, $pipe_read_size, "\n");
	//echo "<div>pipe read: ".$line."</div>";
	fclose($f);
	return $line;
}

/*
 *	Parse task and deliver it to callback
 *
 *	@param callable $consume_callback
 *
 */
function task_consume($consume_callback)
{
	global $pipe, $pipe_read_sleep, $pipe_read_size;
	create_fifo();
	$f = fopen($pipe, "r");
	while(true)
	{
		//ob_start();

		$line = stream_get_line($f, $pipe_read_size, "\n");
		//var_dump($line);
		if($line != false){
			call_user_func($consume_callback, $line);
			//syslog(LOG_INFO, "[consume] Task msg: ".$line);
		}else{
			usleep($pipe_read_sleep);
			//syslog(LOG_INFO, "[consume] No Task"); 
		}

		//$tmp = ob_get_contents();
		//ob_end_clean();
		//@syslog(LOG_ERR, 'task consume: '.$tmp);
	}
	fclose($f);
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

//TaskTest();
$msg = "a:13:{s:15:\"source_filepath\";s:14:\"/tmp/php38mZak\";s:17:\"original_filename\";s:13:\"BKTTpHCib.jpg\";s:10:\"categories\";a:1:{i:0;s:2:\"36\";}s:5:\"level\";i:16;s:15:\"original_md5sum\";s:32:\"be3caaa547c69b9032cdb1d9ed782089\";s:8:\"image_id\";N;s:6:\"result\";i:0;s:3:\"uid\";s:1:\"3\";s:8:\"mail_dir\";s:8:\"BKT_1_36\";s:5:\"owner\";s:14:\"becktu.com sam\";s:9:\"file_size\";s:1:\"1\";s:11:\"th_img_file\";s:34:\"/app/www/piwigo/temp/BKTnY2TK9.jpg\";s:11:\"nt_img_file\";b:0;}\n";
//task_set($msg);

/* Tasks of same user */
function TaskTest()
{
	$max_task = 10;
	$user_id = 2;
	for($i=0; $i<$max_task; $i++)
	{
	}
}

?>
