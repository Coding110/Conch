<?php

define('BKT_PWG_ROOT_PATH', "../../../../");
include_once(BKT_PWG_ROOT_PATH.'local/config/database.inc.php');
include_once(BKT_PWG_ROOT_PATH.'include/dblayer/functions_'.$conf['dblayer'].'.inc.php');
include_once("common.php");

function db_open()
{
	$conf['show_queries'] = false;
	pwg_db_connect($conf['db_host'], $conf['db_user'], $conf['db_password'], $conf['db_base']);
}

function db_close()
{
	pwg_db_close();
}


/*
 *	Get email information by user id
 *
 *	@param string $user_id
 *	@return array (same as db table 'piwigo_emfs_mails')
 *
 */
function get_mail_info($user_id)
{

}

/*
 *	Get email information by user id
 *
 *	@param string $image_id
 *	@param int $status
 *	@return (true | false)
 *
 */
function update_image_status($image_id, $status)
{

}


?>

