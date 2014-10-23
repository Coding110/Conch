<?php

	global $conf;
	$conf['show_queries'] = false;
	$conf['dblayer'] = 'mysqli';
	$conf['db_base'] = 'pwg81';
	$conf['db_user'] = 'root';
	$conf['db_password'] = '123456';
	$conf['db_host'] = '192.168.0.96';

define('BKT_PWG_ROOT_PATH', "../../../../");
include_once(BKT_PWG_ROOT_PATH.'local/config/database.inc.php');
include_once(BKT_PWG_ROOT_PATH.'include/dblayer/functions_'.$conf['dblayer'].'.inc.php');
include_once("common.php");

define('PHPWG_ROOT_PATH', "../../../../");
//include_once( PHPWG_ROOT_PATH.'include/common.inc.php' );
//include(PHPWG_ROOT_PATH.'include/section_init.inc.php');

//include(PHPWG_ROOT_PATH . 'include/config_default.inc.php');
//@include(PHPWG_ROOT_PATH. 'local/config/config.inc.php');

//defined('PWG_LOCAL_DIR') or define('PWG_LOCAL_DIR', 'local/');
//defined('PWG_DERIVATIVE_DIR') or define('PWG_DERIVATIVE_DIR', $conf['data_location'].'i/');
//@include(PHPWG_ROOT_PATH.PWG_LOCAL_DIR .'config/database.inc.php');


function db_open()
{
	global $conf;
	//$conf['show_queries'] = false;
	//$conf['dblayer'] = 'mysqli';
	//$conf['db_base'] = 'pwg81';
	//$conf['db_user'] = 'root';
	//$conf['db_password'] = '123456';
	//$conf['db_host'] = '192.168.0.96';

	@syslog(LOG_INFO, "db open start");
	@syslog(LOG_INFO, "current dir while open db: ".getcwd());
	// $result = pwg_db_connect($conf['db_host'], $conf['db_user'], $conf['db_password'], $conf['db_base']);
	try
	{
		ob_start();
		var_dump($conf);
		pwg_db_connect($conf['db_host'], $conf['db_user'],
	                 $conf['db_password'], $conf['db_base']);
		$tmp = ob_get_contents();
		ob_end_clean();
		@syslog(LOG_INFO, "db open OK, tmp:".$tmp);
	}
	catch (Exception $e)
	{
		@syslog(LOG_INFO, "db open: ".l10n($e->getMessage()));
	}
	//ob_start();
	//var_dump($result);
	//$tmp = ob_get_contents(); 
	//ob_end_clean();
}

function db_close()
{
	pwg_db_close();
}


/*
 *	Get email information by user id
 *
 *	@param string $user_id
 *	@return array [email, passwd, imapserver, imapport] 
 *
 */
function get_mail_info($user_id)
{
	global $conf;
	$conf['show_queries'] = false;
	$conf['emfs'] = 1;
	ob_start();
	var_dump($conf);
	$tmp = ob_get_contents();
	ob_end_clean();
	@syslog(LOG_INFO, "conf:".$tmp);

	//db_open();
	$query = "select email,passwd,imapserver,imapport from ".EMFS_MAILS_TABLE." where uid = '".$user_id."';";
	//echo '<h3>'.$query.'</h3>';
	@syslog(LOG_INFO, "get mail query: ".$query);
	@syslog(LOG_INFO, "current dir while get mail info: ".getcwd());
	$result = pwg_query($query);

	ob_start();
	var_dump($result);
	$tmp = ob_get_contents();
	ob_end_clean();
	@syslog(LOG_INFO, "query result:".$result);

	$result = pwg_db_fetch_row($result);
	//@syslog(LOG_INFO, "query result 1: ".$result);
	ob_start();
	var_dump($result);
	$tmp = ob_get_contents(); 
	ob_end_clean();
	@syslog(LOG_INFO, "query result 2: ".$tmp);
	return $result;
}

/*
 *	Update file status in db
 *
 *	@param string $image_id
 *	@param array $img_info
 *	@return (true | false)
 *
 */
function update_file_info($image_id, $img_info)
{
	single_update(
		EMFS_FILES_TABLE,
		$img_info,
		array("fid" => $image_id)
	);	
}

function db_test()
{
	db_open();
	$res = get_mail_info("3");
	var_dump($res);

	@syslog(LOG_INFO, "current dir while test pwg_db: ".getcwd());
}

//test();
?>

