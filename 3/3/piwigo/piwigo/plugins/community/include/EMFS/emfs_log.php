<?php

global $logfile, $logmode, $loglevel, $emfsmutex;
$logfile = "/var/emfs/emfs.log";
$logmode = "a";
$loglevel = 4;

define('EMFS_LOG_ERROR', 	1);
define('EMFS_LOG_WARNING',	2);
define('EMFS_LOG_INFO', 	3);
define('EMFS_LOG_DEBUG', 	4);

function LogOpen()
{
	global $emfslog, $logfile, $logmode, $emfsmutex, $loglevel;
	$emfslog = fopen($logfile, $logmode);
	$loglevel = 4;
	//if(isset($emfsmutex)){
	//	 unset($emfsmutex);
	//	 //Mutex::destroy($emfsmutex);
	//}
	//$emfsmutex = Mutex::create($emfsmutex);
	return $emfslog;
}

function LogClose()
{
	global $emfslog, $emfsmutex;
	fclose($emfslog);
	//Mutex::destroy($emfsmutex);
}

/*
 *		$level: EMFS_LOG_INFO, EMFS_LOG_WARNING, EMFS_LOG_DEBUG, EMFS_LOG_ERROR
 */
function LogWrite($level, $logmsg)
{
	global $emfslog, $loglevel, $emfsmutex ;
	@syslog(LOG_INFO, "log writing: ".$level."[".$loglevel."] - ".$logmsg);
	if($level > $loglevel) return true;
	@syslog(LOG_INFO, "log writing 2");

	$timenow = date('Y-m-d H:i:s');
	switch($level)
	{
		case EMFS_LOG_ERROR:
			$logstr = $timenow." [ERROR] ".$logmsg."\n";
			break;
		case EMFS_LOG_WARNING:
			$logstr = $timenow." [WARNING] ".$logmsg."\n";
			break;
		case EMFS_LOG_INFO:
			$logstr = $timenow." [INFO] ".$logmsg."\n";
			break;
		case EMFS_LOG_DEBUG:
			$logstr = $timenow." [DEBUG] ".$logmsg."\n";
			break;
		default:
			$logstr = $timenow." [UNDEFINE] ".$logmsg."\n";
			break;
	}
	@syslog(LOG_INFO, "get log lock.");
	//Mutex::lock($emfsmutex);
	$ret = fwrite($emfslog, $logstr);
	//Mutex::unlock($emfsmutex);
	@syslog(LOG_INFO, "get log lock. - Yeah, you got it.");
	return $ret;
}

function log_test()
{
	$ret = LogOpen();
	var_dump($ret);
	$ret = LogWrite(EMFS_LOG_ERROR, "some error.");
	var_dump($ret);
	$ret = LogWrite(EMFS_LOG_WARNING, "some warning.");
	var_dump($ret);
	$ret = LogWrite(EMFS_LOG_INFO, "some information.");
	var_dump($ret);
	$ret = LogWrite(EMFS_LOG_DEBUG, "some debug.");
	var_dump($ret);
	$ret = LogClose();
	var_dump($ret);
}
//log_test();

?>
