<?php

/*
 *	将添加图片到邮箱
 *		
 *	@param string $file, 图片文件
 *	@return null|string, 返回图片ID	
 *
 */
function add_photo_to_emfs($file)
{
	global $conf, $user, $prefixeTable;
	$query = "select mail,passwd,imapserver,imapport from ".$prefixeTable."_emfs_mails where uid = '".$user["id"]."';";
	echo '<h3>'.$query.'</h3>';
	$result = pwg_query($query);
	list($mail, $passwd, $imapserver, $imapport) = pwg_db_fetch_row($result);
	// $passwd 有加密的话，需要解密
	
	$emfs = $_SESSION['emfs'];
	if(!isset($emfs))
	{
		//function __construct($server, $user, $password, $port = 143, $ssl = false)	
		if($port == NULL || !isset($port)) $port = 143;
		$emfs = new EMFS($imapserver, $mail, $passwd, $port);
	}




	return $image_id;
}

/*
 *	从邮箱中读取图片	
 *		
 *	@param string $image_id, 图片ID
 *	@return null|string, 返回图片数据
 *
 */
function get_photo_from_emfs($image_id)
{
	return $photo_data;
}

?>
