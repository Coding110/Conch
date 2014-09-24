<?php
/*
Plugin Name: HuaTest
Version: 1.0
Description: Test basic functions of Piwigo plugin
Plugin URI: http://www.becktu.com/plugins/HuaTest
Author: Donghua.Lau
Author URI: http://www.becktu.com/Donghua.Lau
*/

global $prefixeTable;

if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

defined('HUATEST_ID') or define('HUATEST_ID', basename(dirname(__FILE__)));
define('HUATEST_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');
define('HUATEST_TABLE', $prefixeTable.'huatest_mails');
define('HUATEST_VERSION', '1.0');
include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');

add_event_handler('init', 'huatest_init');
function huatest_init()
{
	global $conf, $user, $pwg_loaded_plugins;
	
	if (
		HUATEST_VERSION == 'auto' or
		$pwg_loaded_plugins[HUATEST_ID]['version'] == 'auto' or
		safe_version_compare($pwg_loaded_plugins[HUATEST_ID]['version'], HUATEST_VERSION, '<')
	)
	{
	  // call install function
	  huatest_install();
	
	  // update plugin version in database
	  if ( $pwg_loaded_plugins[HUATEST_ID]['version'] == 'auto' and HUATEST_VERSION != 'auto' )
	  {
	    $query = '
		UPDATE '. PLUGINS_TABLE .'
		SET version = "'. HUATEST_VERSION .'"
		WHERE id = "'. HUATEST_ID.'"';
	    pwg_query($query);
	
	    $pwg_loaded_plugins[HUATEST_ID]['version'] = HUATEST_VERSION ;
	  }
	}
	
	// prepare plugin configuration
	//$conf['huatest'] = unserialize($conf['huatest']);
	
}

function huatest_install()
{
	global $conf, $prefixeTable;
    
	$query = 
		'CREATE TABLE IF NOT EXISTS '.HUATEST_TABLE.'
		(id int(11) NOT NULL AUTO_INCREMENT,
		uid mediumint(8),
		mail varchar(255),
		password varchar(255),
		PRIMARY KEY (id)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8
		;';
	pwg_query($query);
}

add_event_handler('blockmanager_apply' , 'huatest_menu_apply', EVENT_HANDLER_PRIORITY_NEUTRAL+10);
function huatest_menu_apply($menu_ref_arr)
{

  global $conf, $user;

  $menu = & $menu_ref_arr[0];

  if (($block = $menu->get_block('mbMenu')) != null )
  {
    load_language('plugin.lang', HUATEST_PATH);

    array_splice(
      $block->data,
      count($block->data),
      0,
      array(
        '' => array(
          'URL' => make_index_url(array('section' => 'mail_config')),
          'TITLE' => l10n('storage mail configuration'),
          'NAME' => l10n('mail config')
          )
        )
      );
  }
}

//add_event_handler('init', 'huatest_load_language');
function huatest_load_language()
{
  load_language('plugin.lang', HUATEST_PATH);
}

add_event_handler('loc_end_section_init', 'huatest_section_init');
function huatest_section_init()
{
  global $tokens, $page;
  
  if ($tokens[0] == 'mail_config')
  {
    $page['section'] = 'mail_config';
  }
  else if ($tokens[0] == 'delete_image')
  {
    $page['section'] = 'delete_image';
	$page["image_id"] = $tokens[1];
	$page["category_id"] = $tokens[2];
  }

  //echo "<div>".var_dump($tokens)."</div><br>";
}

add_event_handler('loc_end_index', 'huatest_index');
function huatest_index()
{
  global $page;
  
  if (isset($page['section']) and $page['section'] == 'mail_config')
  {
    include(HUATEST_PATH.'mail_config.php');
  }
  else if (isset($page['section']) and $page['section'] == 'delete_image')
  {
	//echo "<div>--image id: ".var_dump($page["image_id"])."</div><br>";
	delete_elements(array($page['image_id']), true);
	invalidate_user_cache();
	$red_url = make_index_url(array('section' => 'category')).'/'.$page['category_id'];
	//echo "<div>--redirect url: ".$red_url."</div><br>";
	redirect($red_url);
  }

}

add_event_handler('loc_end_picture', 'huatest_picture_loc');
function huatest_picture_loc()//, $current_picture)
{
	global $template, $page;
    load_language('plugin.lang', HUATEST_PATH);
	$del_url = make_index_url(array('section' => 'delete_image'));
	$del_url = $del_url.'/'.$page["image_id"].'/'.$page['category']['id'];
	$template->assign("U_PHOTO_DELETE", $del_url);
	//echo "<div>page: ".var_dump($page)."</div><br>";
	//echo "<div>image id: ".var_dump($page["image_id"])."</div><br>";
}

//add_event_handler('loc_end_cat_modify', 'huatest_cat_modify');
//add_event_handler('loc_begin_cat_modify', 'huatest_cat_modify');
//function huatest_cat_modify()//, $current_picture)
//{
//	global $template, $page;
//	$msg = '<script>alert("category modify");</script>';
//	echo $msg;
//	echo "aaaaaaaa00000000000000aaaaaaaaaaaa";
//	//echo "<div>page: ".var_dump($page)."</div><br>";
//	//echo "<div>image id: ".var_dump($page["image_id"])."</div><br>";
//}

add_event_handler('ws_add_methods', 'huatest_add_methods', EVENT_HANDLER_PRIORITY_NEUTRAL+5);
function huatest_add_methods($arr){
	global $user, $conf;
	if('pwg.categories.add' == $_REQUEST['method']){
		$conf["huatest"] = array('cat_add_end' => 1, 'category_name' => $_REQUEST['name']);
	}
	return ;
}

add_event_handler('sendResponse', 'huatest_sendResponse');
function huatest_sendResponse($encodedResponse){
	global $conf, $user, $category;
	$res = json_decode($encodedResponse);
	//echo "<div>huatest_sendResponse, ".var_dump($encodedResponse)."</div><br>";
	if(isset($conf["huatest"]) and $conf["huatest"]["cat_add_end"] == 1){
		single_update(
			CATEGORIES_TABLE,
			array('community_user' => $user['id']),
			array('id' => $res->{"result"}->{"id"})
		);
		invalidate_user_cache();
	}
}

// menubar里的相册
add_event_handler('get_categories_menu_sql_where', 'huatest_get_categories_menu_sql_where');
//function huatest_get_categories_menu_sql_where($where, $user_expand, $filter){
function huatest_get_categories_menu_sql_where($where){
	global $user;
	$where = "community_user = '".$user["id"]."'";
	return $where;
}

add_event_handler('loc_begin_index_category_thumbnails', 'huatest_loc_begin_index_category_thumbnails');
function huatest_loc_begin_index_category_thumbnails($categories){
	return ;
	global $user;
	$categories_1 = array();
	for($i=0; $i<count($categories); $i++){
		if($categories[$i]["community_user"] == $user["id"]){
			echo "<h3>cat: ".var_dump($categories[$i])."</h3>";
			echo "<h2>user id: ".$categories[$i]["community_user"].",".$user["id"]."</h2>";
			//unset($categories[$i]);
			$categories_1[] = $categories[$i];
		}
	}
	$categories = $categories_1;
	echo "<h3>cat all: ".var_dump($categories)."</h3>";
}

add_event_handler('loc_end_index_category_thumbnails', 'huatest_loc_end_index_category_thumbnails');
function huatest_loc_end_index_category_thumbnails($tpl_thumbnails_var){
	global $user;
	//echo "<h3>tpl all: ".var_dump($tpl_thumbnails_var)."</h3>";
	$subtpl = array();
	for($i=0; $i<count($tpl_thumbnails_var); $i++){
		if($tpl_thumbnails_var[$i]["community_user"] == $user["id"]){
			//echo "<h3>cat: ".var_dump($tpl_thumbnails_var[$i])."</h3>";
			//echo "<h2>user id: ".$tpl_thumbnails_var[$i]["community_user"].",".$user["id"]."</h2>";
			//unset($categories[$i]);
			$subtpl[] = $tpl_thumbnails_var[$i];
		}
	}
	$tpl_thumbnails_var = $subtpl;
	//echo "<h3>cat all: ".var_dump($tpl_thumbnails_var)."</h3>";
	return $tpl_thumbnails_var;
}

add_event_handler('register_user', 'reg_user');
function reg_user($user){
	$msg = var_dump($user);
	//echo '<script>alert("'.$msg.'");</script>';
	error_log($msg);
	//file_put_contents("/home/admin/php.log", $msg."\n", FILE_APPEND);
	//return $pictures;
}
?>

