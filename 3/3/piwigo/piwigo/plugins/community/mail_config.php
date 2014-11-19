<?php

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $template, $conf, $user;

include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
define('MAIL_CONFIG_BASE_URL', make_index_url(array('section' => 'mail_config')));

$template->set_filenames(array('mail_config' => dirname(__FILE__).'/mail_config.tpl'));


if(isset($_POST["username"]) or isset($_POST["password"]))
{
	$mc_submit = "1";
	$mc_result = l10n('mail config OK');
	$mc_mail = $_POST["username"];
	$mc_passwd = $_POST["password"];

	$query = "INSERT INTO ".HUATEST_TABLE." (uid, mail, password) VALUES ('".$user["id"]."','".$mc_mail."','".$mc_passwd."');";
	//echo "<h3>".$query."</div>";
	$query_ret = pwg_query( $query );
	$mc_mail = "mail: ".$mc_mail.", result: ".$query_ret;

	$template->assign("mc_result", $mc_result);
	$template->assign("mc_mail", $mc_mail);
	$template->assign("mc_submit", $mc_submit);
}else{
	$mc_action_url = make_index_url(array('section' => 'mail_config'));
	$template->assign("mc_action_url", $mc_action_url);
}


$template->assign_var_from_handle('PLUGIN_INDEX_CONTENT_BEGIN', 'mail_config');

$template->assign(
  array(
    'TITLE' => '<a href="'.get_gallery_home_url().'">'.l10n('Home').'</a>'.$conf['level_separator'].l10n('mail config'),
    )
  );

?>

