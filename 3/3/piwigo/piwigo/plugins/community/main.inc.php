<?php
/*
Plugin Name: Community
Version: 2.6.c
Description: Non admin users can add photos
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=303
Author: plg
Author URI: http://piwigo.wordpress.com
*/

if (!defined('PHPWG_ROOT_PATH'))
{
  die('Hacking attempt!');
}

global $prefixeTable;

// +-----------------------------------------------------------------------+
// | Define plugin constants                                               |
// +-----------------------------------------------------------------------+

defined('COMMUNITY_ID') or define('COMMUNITY_ID', basename(dirname(__FILE__)));
define('COMMUNITY_PATH' , PHPWG_PLUGINS_PATH.basename(dirname(__FILE__)).'/');
define('COMMUNITY_PERMISSIONS_TABLE', $prefixeTable.'community_permissions');
define('COMMUNITY_PENDINGS_TABLE', $prefixeTable.'community_pendings');
define('COMMUNITY_VERSION', '2.6.c');

include_once(COMMUNITY_PATH.'include/functions_community.inc.php');
//added by wu 20141115 start
include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
//added by wu 20141115 end
include_once(COMMUNITY_PATH.'include/EMFS/common.php');
include_once(COMMUNITY_PATH.'include/EMFS/task_fifo.php');
include_once(COMMUNITY_PATH.'include/EMFS/image_resize.php');

// init the plugin
add_event_handler('init', 'community_init');
/**
 * plugin initialization
 *   - check for upgrades
 *   - unserialize configuration
 *   - load language
 */
function community_init()
{
  global $conf, $user, $pwg_loaded_plugins;

  // apply upgrade if needed
  if (
    COMMUNITY_VERSION == 'auto' or
    $pwg_loaded_plugins[COMMUNITY_ID]['version'] == 'auto' or
    safe_version_compare($pwg_loaded_plugins[COMMUNITY_ID]['version'], COMMUNITY_VERSION, '<')
  )
  {
    // call install function
    include_once(COMMUNITY_PATH.'include/install.inc.php');
    community_install();

    // update plugin version in database
    if ( $pwg_loaded_plugins[COMMUNITY_ID]['version'] != 'auto' and COMMUNITY_VERSION != 'auto' )
    {
      $query = '
UPDATE '. PLUGINS_TABLE .'
SET version = "'. COMMUNITY_VERSION .'"
WHERE id = "'. COMMUNITY_ID .'"';
      pwg_query($query);

      $pwg_loaded_plugins[COMMUNITY_ID]['version'] = COMMUNITY_VERSION;
    }
  }

  // prepare plugin configuration
  $conf['community'] = unserialize($conf['community']);

  // TODO: generate permissions in $user['community_permissions'] if ws.php
  // + remove all calls of community_get_user_permissions related to webservices
  if (!defined('IN_ADMIN') or !IN_ADMIN)
  {
    $user['community_permissions'] = community_get_user_permissions($user['id']);
  }
}

/* Plugin admin */
add_event_handler('get_admin_plugin_menu_links', 'community_admin_menu');
function community_admin_menu($menu)
{
  global $page;
  

  
  $query = '
SELECT
    COUNT(*)
  FROM '.COMMUNITY_PENDINGS_TABLE.'
    JOIN '.IMAGES_TABLE.' ON image_id = id
  WHERE state = \'moderation_pending\'
;';
  $result = pwg_query($query);
  list($page['community_nb_pendings']) = pwg_db_fetch_row($result);

  $name = 'Community';
  if ($page['community_nb_pendings'] > 0)
  {
    $style = 'background-color:#666;';
    $style.= 'color:white;';
    $style.= 'padding:1px 5px;';
    $style.= 'border-radius:10px;';
    $style.= 'margin-left:5px;';
    
    $name.= '<span style="'.$style.'">'.$page['community_nb_pendings'].'</span>';

    if (defined('IN_ADMIN') and IN_ADMIN and $page['page'] == 'intro')
    {
      global $template;
      
      $template->set_prefilter('intro', 'community_pendings_on_intro');
      $template->assign(
        array(
          'COMMUNITY_PENDINGS' => sprintf(
            '<a href="%s">'.l10n('%u pending photos').'</a>',
            get_root_url().'admin.php?page=plugin-community-pendings',
            $page['community_nb_pendings']
            ),
          )
        );
    }
  }

  array_push(
    $menu,
    array(
      'NAME' => $name,
      'URL'  => get_root_url().'admin.php?page=plugin-community'
      )
    );

  return $menu;
}

function community_pendings_on_intro($content, &$smarty)
{
  $pattern = '#<li>\s*{\$DB_ELEMENTS\}#ms';
  $replacement = '<li>{$COMMUNITY_PENDINGS}</li><li>{$DB_ELEMENTS}';
  return preg_replace($pattern, $replacement, $content);
}

add_event_handler('init', 'community_load_language');
function community_load_language()
{
  if (!defined('IN_ADMIN') or !IN_ADMIN)
  {
    load_language('admin.lang');
  }
  
  load_language('plugin.lang', COMMUNITY_PATH);
}


add_event_handler('loc_end_section_init', 'community_section_init');
function community_section_init()
{
  global $tokens, $page;
  if ($tokens[0] == 'add_photos')
  {
    $page['section'] = 'add_photos';
  }else if ($tokens[0] == 'home_page'){
  	$page['section'] = 'home_page';
  }else if ($tokens[0] == 'delete_category'){
  	$page['section'] = 'delete_category';
  	$page["category_id"] = $tokens[1];
  } else if ($tokens[0] == 'delete_image')
  {
    $page['section'] = 'delete_image';
	$page["image_id"] = $tokens[1];
	$page["category_id"] = $tokens[2];
  }else if ($tokens[0] == 'edit_album')
  {
    $page['section'] = 'edit_album';
	$page["album_name"] = $_POST['album_name'];
	$page["album_description"] = $_POST['album_description'];
	$page["album_id"] = $_POST['album_id'];
  }
  
}

add_event_handler('loc_end_index', 'community_index');
function community_index()
{
  global $page, $user, $conf, $template;
  
  if (isset($page['section']) and $page['section'] == 'add_photos')
  {
    include(COMMUNITY_PATH.'add_photos.php');
  }else if (isset($page['section']) and $page['section'] == 'home_page')
  {
  	include(PHPWG_ROOT_PATH.'include/category_cats.inc.php');
  }else if (isset($page['section']) and $page['section'] == 'delete_category')
  {
    delete_categories(array($page['category_id']), true);
	invalidate_user_cache();
	$red_url = make_index_url(array('section' => 'home_page'));
	redirect($red_url);
  }else if (isset($page['section']) and $page['section'] == 'delete_image')
  {
	delete_elements(array($page['image_id']), true);
	invalidate_user_cache();
	$red_url = make_index_url(array('section' => 'category')).'/'.$page['category_id'];
	redirect($red_url);
  }
  else if (isset($page['section']) and $page['section'] == 'edit_album')
  {

  	$updateSql="UPDATE ".CATEGORIES_TABLE." SET name= '".$page['album_name']."' , comment='".$page['album_description']."
  	' WHERE id=".$page['album_id'];
  	pwg_query($updateSql);
  	invalidate_user_cache();
  	$red_url = make_index_url(array('section' => 'home_page'));
  	redirect($red_url);
  	
  }
}

add_event_handler('loc_end_picture', 'community_picture_loc');
function community_picture_loc()//, $current_picture)
{
	global $template, $page;
	$del_url = make_index_url(array('section' => 'delete_image'));
	if(isset($page["image_id"]) and isset($page["category"])){
		$del_url = $del_url.'/'.$page["image_id"].'/'.$page['category']['id'];
	}
	$template->assign("IMAGE_DELETE", $del_url);
}


add_event_handler('blockmanager_apply' , 'community_gallery_menu', EVENT_HANDLER_PRIORITY_NEUTRAL+10);
function community_gallery_menu($menu_ref_arr)
{
  global $conf, $user;

  // conditional : depending on community permissions, display the "Add
  // photos" link in the gallery menu
  $user_permissions = $user['community_permissions'];

  if (!$user_permissions['community_enabled'])
  {
    return;
  }

  $menu = & $menu_ref_arr[0];

  if (($block = $menu->get_block('mbMenu')) != null )
  {
    load_language('plugin.lang', COMMUNITY_PATH);

    array_splice(
      $block->data,
      count($block->data),
      0,
      array(
        '' => array(
          'URL' => make_index_url(array('section' => 'add_photos')),
          'TITLE' => l10n('Upload your own photos'),
          'NAME' => l10n('Upload Photos')
          )
        )
      );
  }
}


add_event_handler('ws_add_methods', 'community_switch_user_to_admin', EVENT_HANDLER_PRIORITY_NEUTRAL+5);
function community_switch_user_to_admin($arr)
{
  global $user, $community;

  $service = &$arr[0];

  if (is_admin())
  {
    return;
  }
  
  $community = array('method' => $_REQUEST['method']);

  if ('pwg.images.addSimple' == $community['method'])
  {
    $community['category'] = $_REQUEST['category'];
  }
  elseif ('pwg.images.add' == $community['method'])
  {
    $community['category'] = $_REQUEST['categories'];
    $community['md5sum'] = $_REQUEST['original_sum'];
  }

  // $print_params = $params;
  // unset($print_params['data']);
  // file_put_contents('/tmp/community.log', '['.$methodName.'] '.json_encode($print_params)."\n" ,FILE_APPEND);

  // conditional : depending on community permissions, display the "Add
  // photos" link in the gallery menu
  $user_permissions = community_get_user_permissions($user['id']);

  if (count($user_permissions['upload_categories']) == 0 and !$user_permissions ['create_whole_gallery'])
  {
    return;
  }

  // if level of trust is low, then we have to set level to 16

  $methods = array();
  $methods[] = 'pwg.tags.add';
  $methods[] = 'pwg.images.exist';
  $methods[] = 'pwg.images.add';
  $methods[] = 'pwg.images.addSimple';
  $methods[] = 'pwg.images.addChunk';
  $methods[] = 'pwg.images.checkUpload';
  $methods[] = 'pwg.images.checkFiles';
  $methods[] = 'pwg.images.setInfo';

  if (in_array($community['method'], $methods))
  {
    $user['status'] = 'admin';
  }

  if ('pwg.categories.add' == $community['method'])
  {
    if (in_array($_REQUEST['parent'], $user_permissions['create_categories'])
        or $user_permissions['create_whole_gallery'])
    {
      $user['status'] = 'admin';
      invalidate_user_cache();
    }
  }

  return;
}

add_event_handler('ws_add_methods', 'community_ws_replace_methods', EVENT_HANDLER_PRIORITY_NEUTRAL+5);
function community_ws_replace_methods($arr)
{
  global $conf, $user;
  
  $service = &$arr[0];

  if (is_admin())
  {
    return;
  }

  $user_permissions = community_get_user_permissions($user['id']);
  
  if (count($user_permissions['permission_ids']) == 0)
  {
    return;
  }
  
  // the plugin Community is activated, the user has upload permissions, we
  // use a specific function to list available categories, assuming the user
  // wants to list categories where upload is possible for him
  
  $service->addMethod(
    'pwg.categories.getList',
    'community_ws_categories_getList',
    array(
      'cat_id' =>       array('default'=>0),
      'recursive' =>    array('default'=>false),
      'public' =>       array('default'=>false),
      'tree_output' =>  array('default'=>false),
      'fullname' =>     array('default'=>false),
      ),
    'retrieves a list of categories'
    );
  
  $service->addMethod(
    'pwg.tags.getAdminList',
    'community_ws_tags_getAdminList',
    array(),
    'administration method only'
    );
  
  $service->addMethod(
  		'pwg.images.setPrivacyLevel',
  		'community_ws_setPrivacyLevel',
     	 array(
        'image_id' => array('flags'=>WS_PARAM_FORCE_ARRAY,
                            'type'=>WS_TYPE_ID),
        'level' =>    array('maxValue'=>max($conf['available_permission_levels']),
                            'type'=>WS_TYPE_INT|WS_TYPE_POSITIVE),
        ),
  		''
  );
}

function community_ws_setPrivacyLevel($params, &$service){
	include_once(PHPWG_ROOT_PATH.'include/ws_functions/pwg.images.php');
	$user['status'] = 'admin';
	  //var_dump($params);
	ws_images_setPrivacyLevel($params, $service);
}

/**
 * returns a list of categories (web service method)
 */
function community_ws_categories_getList($params, &$service)
{
  global $user, $conf;
  if ($params['tree_output'])
  {
    if (!isset($_GET['format']) or !in_array($_GET['format'], array('php', 'json')))
    {
      // the algorithm used to build a tree from a flat list of categories
      // keeps original array keys, which is not compatible with
      // PwgNamedArray.
      //
      // PwgNamedArray is useful to define which data is an attribute and
      // which is an element in the XML output. The "hierarchy" output is
      // only compatible with json/php output.

      return new PwgError(405, "The tree_output option is only compatible with json/php output formats");
    }
  }
  
  $where = array('1=1');
  $join_type = 'LEFT';
  $join_user = $user['id'];

  if (!$params['recursive'])
  {
    if ($params['cat_id']>0)
      $where[] = '(id_uppercat='.(int)($params['cat_id']).'
    OR id='.(int)($params['cat_id']).')';
    else
      $where[] = 'id_uppercat IS NULL';
  }
  else if ($params['cat_id']>0)
  {
    $where[] = 'uppercats '.DB_REGEX_OPERATOR.' \'(^|,)'.
      (int)($params['cat_id'])
      .'(,|$)\'';
  }

  if ($params['public'])
  {
    $where[] = 'status = "public"';
    $where[] = 'visible = "true"';
    
    $join_user = $conf['guest_id'];
  }

  $user_permissions = community_get_user_permissions($user['id']);
  $upload_categories = $user_permissions['upload_categories'];
  if (count($upload_categories) == 0)
  {
    $upload_categories = array(-1);
  }

  $where[] = 'id IN ('.implode(',', $upload_categories).')';

  $query = '
SELECT
    id,
    name,
    permalink,
    uppercats,
    global_rank,
    comment,
    nb_images,
    count_images AS total_nb_images,
    date_last,
    max_date_last,
    count_categories AS nb_categories,
	community_user
  FROM '.CATEGORIES_TABLE.'
   '.$join_type.' JOIN '.USER_CACHE_CATEGORIES_TABLE.' ON id=cat_id AND user_id='.$join_user.'
  WHERE '. implode('
    AND ', $where).' and community_user='.$join_user.';';
//updated by wu 20141115
  $result = pwg_query($query);

  $cats = array();
  while ($row = pwg_db_fetch_assoc($result))
  {
    $row['url'] = make_index_url(
        array(
          'category' => $row
          )
      );
    foreach( array('id','nb_images','total_nb_images','nb_categories') as $key)
    {
      $row[$key] = (int)$row[$key];
    }

    if ($params['fullname'])
    {
      $row['name'] = strip_tags(get_cat_display_name_cache($row['uppercats'], null, false));
    }
    else
    {
      $row['name'] = strip_tags(
        trigger_event(
          'render_category_name',
          $row['name'],
          'ws_categories_getList'
          )
        );
    }
    
    $row['comment'] = strip_tags(
      trigger_event(
        'render_category_description',
        $row['comment'],
        'ws_categories_getList'
        )
      );
    
    array_push($cats, $row);
  }
  usort($cats, 'global_rank_compare');

  if ($params['tree_output'])
  {
    return categories_flatlist_to_tree($cats);
  }
  else
  {
    return array(
      'categories' => new PwgNamedArray(
        $cats,
        'category',
        array(
          'id',
          'url',
          'nb_images',
          'total_nb_images',
          'nb_categories',
          'date_last',
          'max_date_last',
          )
        )
      );
  }
}

function community_ws_tags_getAdminList($params, &$service)
{
  $tags = get_available_tags();

  // keep orphan tags
  include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
  $orphan_tags = get_orphan_tags();
  if (count($orphan_tags) > 0)
  {
    $orphan_tag_ids = array();
    foreach ($orphan_tags as $tag)
    {
      $orphan_tag_ids[] = $tag['id'];
    }
    
    $query = '
SELECT *
  FROM '.TAGS_TABLE.'
  WHERE id IN ('.implode(',', $orphan_tag_ids).')
;';
    $result = pwg_query($query);
    while ($row = pwg_db_fetch_assoc($result))
    {
      $tags[] = $row;
    }
  }

  usort($tags, 'tag_alpha_compare');
  
  return array(
    'tags' => new PwgNamedArray(
      $tags,
      'tag',
      array(
        'name',
        'id',
        'url_name',
        )
      )
    );
}

add_event_handler('sendResponse', 'community_sendResponse');
function community_sendResponse($encodedResponse)
{
  global $community, $user;

  if (!isset($community['method']))
  {
    return;
  }

  if ('pwg.images.addSimple' == $community['method'])
  {
    $response = json_decode($encodedResponse);
    $image_id = $response->result->image_id;
  }
  elseif ('pwg.images.add' == $community['method'])
  {    
    $query = '
SELECT
    id
  FROM '.IMAGES_TABLE.'
  WHERE md5sum = \''.$community['md5sum'].'\'
  ORDER BY id DESC
  LIMIT 1
;';
    list($image_id) = pwg_db_fetch_row(pwg_query($query));
  }
  else
  {
    return;
  }
  
  $image_ids = array($image_id);

  // $category_id is set in the photos_add_direct_process.inc.php included script
  $category_infos = get_cat_info($community['category']);

  // should the photos be moderated?
  //
  // if one of the user community permissions is not moderated on the path
  // to gallery root, then the upload is not moderated. For example, if the
  // user is allowed to upload to events/parties with no admin moderation,
  // then he's not moderated when uploading in
  // events/parties/happyNewYear2011
  $moderate = true;

  $user_permissions = community_get_user_permissions($user['id']);
  $query = '
SELECT
    cp.category_id,
    c.uppercats
  FROM '.COMMUNITY_PERMISSIONS_TABLE.' AS cp
    LEFT JOIN '.CATEGORIES_TABLE.' AS c ON category_id = c.id
  WHERE cp.id IN ('.implode(',', $user_permissions['permission_ids']).')
    AND cp.moderated = \'false\'
;';
  $result = pwg_query($query);
  while ($row = pwg_db_fetch_assoc($result))
  {
    if (empty($row['category_id']))
    {
      $moderate = false;
    }
    elseif (preg_match('/^'.$row['uppercats'].'(,|$)/', $category_infos['uppercats']))
    {
      $moderate = false;
    }
  }
  
  if ($moderate)
  {
    $inserts = array();

    $query = '
SELECT
    id,
    date_available
  FROM '.IMAGES_TABLE.'
  WHERE id IN ('.implode(',', $image_ids).')
;';
    $result = pwg_query($query);
    while ($row = pwg_db_fetch_assoc($result))
    {
      array_push(
        $inserts,
        array(
          'image_id' => $row['id'],
          'added_on' => $row['date_available'],
          'state' => 'moderation_pending',
          )
        );
    }
    
    mass_inserts(
      COMMUNITY_PENDINGS_TABLE,
      array_keys($inserts[0]),
      $inserts
      );
    
    // the level of a user upload photo with moderation is 16
    $level = 16;
  }
  else
  {
    // the level of a user upload photo with no moderation is 0
    $level = 0;
  }

  $query = '
UPDATE '.IMAGES_TABLE.'
  SET level = '.$level.'
  WHERE id IN ('.implode(',', $image_ids).')
;';
  pwg_query($query);

  invalidate_user_cache();
}

add_event_handler('delete_user', 'community_delete_user');
function community_delete_user($user_id)
{
  $query = '
DELETE
  FROM '.COMMUNITY_PERMISSIONS_TABLE.'
  WHERE user_id = '.$user_id.'
;';
  pwg_query($query);

  community_reject_user_pendings($user_id);
}

add_event_handler('delete_categories', 'community_delete_category');
function community_delete_category($category_ids)
{
  // $category_ids includes all the sub-category ids
  $query = '
DELETE
  FROM '.COMMUNITY_PERMISSIONS_TABLE.'
  WHERE category_id IN ('.implode(',', $category_ids).')
;';
  pwg_query($query);
  
  community_update_cache_key();
}

add_event_handler('delete_elements', 'community_delete_elements');
function community_delete_elements($image_ids)
{
  $query = '
DELETE
  FROM '.COMMUNITY_PENDINGS_TABLE.'
  WHERE image_id IN ('.implode(',', $image_ids).')
;';
  pwg_query($query);
}

add_event_handler('invalidate_user_cache', 'community_refresh_cache_update_time');
function community_refresh_cache_update_time()
{
  community_update_cache_key();
}

add_event_handler('init', 'community_uploadify_privacy_level');
function community_uploadify_privacy_level()
{
  if (script_basename() == 'uploadify' and !is_admin())
  {
    $_POST['level'] = 16;
  }
}

// +-----------------------------------------------------------------------+
// | User Albums                                                           |
// +-----------------------------------------------------------------------+

add_event_handler('loc_end_cat_modify', 'community_set_prefilter_cat_modify', 50);
// add_event_handler('loc_begin_admin_page', 'community_cat_modify_submit', 45);

// Change the variables used by the function that changes the template
// add_event_handler('loc_begin_admin_page', 'community_cat_modify_add_vars_to_template');

function community_set_prefilter_cat_modify()
{
	global $template, $conf, $category;

  if (!isset($conf['community']['user_albums']) or !$conf['community']['user_albums'])
  {
    return;
  }
  
  $template->set_prefilter('album_properties', 'community_cat_modify_prefilter');

  $query = '
SELECT
    '.$conf['user_fields']['id'].' AS id,
    '.$conf['user_fields']['username'].' AS username
  FROM '.USERS_TABLE.' AS u
    INNER JOIN '.USER_INFOS_TABLE.' AS uf ON uf.user_id = u.'.$conf['user_fields']['id'].'
  WHERE uf.status IN (\'normal\',\'generic\')
;';
  $result = pwg_query($query);
  $users = array();
  while ($row = pwg_db_fetch_assoc($result))
  {
    $users[$row['id']] = $row['username'];
  }

  $template->assign(
    array(
      'community_user_options' => $users,
      'community_user_selected' => $category['community_user'],
      )
    );
}

function community_cat_modify_prefilter($content, &$smarty)
{
	$search = "#<strong>{'Name'#";

	// We use the <tr> from the Creation date, and give them a new <tr>
	$replacement = '<strong>(Community) {\'Album of user\'|@translate}</strong>
		<br>
			<select name="community_user">
				<option value="">--</option>
				{html_options options=$community_user_options selected=$community_user_selected}
			</select>
      <em>{\'a user can own only one album\'|@translate}</em>
		</p>
	
	</p>
  <p>
		<strong>{\'Name\'';

  return preg_replace($search, $replacement, $content);
}

add_event_handler('loc_begin_cat_modify', 'community_cat_modify_submit');
function community_cat_modify_submit()
{
  global $category, $conf;

  if (!isset($conf['community']['user_albums']) or !$conf['community']['user_albums'])
  {
    return;
  }
  
  if (isset($_POST['community_user']))
  {
    // echo '<pre>'; print_r($_POST); echo '</pre>'; exit();
    // only one album for each user, first we remove ownership on any other album
    single_update(
      CATEGORIES_TABLE,
      array('community_user' => null),
      array('community_user' => $_POST['community_user'])
      );

    // then we give the album to the user
    single_update(
      CATEGORIES_TABLE,
      array('community_user' => $_POST['community_user']),
      array('id' => $category['id'])
      );
  }
}

add_event_handler('main_index_page' , 'main_index_page_func');
function main_index_page_func($main_page_ret)
{
	global $tokens;
	if(isset($tokens) and count($tokens)>=2 and $tokens[0]=="category"){
		$main_page_ret = 0;
	}else {
		include('main_index.php');
		$main_page_ret = 1;
	}
	return $main_page_ret;
}

add_event_handler('loc_begin_index' , 'loc_begin_index_func');
function loc_begin_index_func()
{ 
	global $template,$tokens;
	if(isset($tokens) and count($tokens)==1 and $tokens[0]==NULL){
		$template->assign('ishome_page', true);
	}

}

add_event_handler('ws_add_methods', 'add_methods', EVENT_HANDLER_PRIORITY_NEUTRAL+5);
function add_methods($arr){
	global $user, $conf;
	if('pwg.categories.add' == $_REQUEST['method']){
		$conf["cats_add_mark"] = array('cat_add_end' => 1, 'category_name' => $_REQUEST['name']);
	}
	return ;
}
add_event_handler('sendResponse', 'add_sendResponse');
function add_sendResponse(){
	global $conf, $user;
	if(isset($conf["cats_add_mark"]) and $conf["cats_add_mark"]["cat_add_end"] == 1){
		single_update(
		CATEGORIES_TABLE,
		array('community_user' => $user['id']),
		array('name' => $conf["cats_add_mark"]['category_name'])
		);
		invalidate_user_cache();
	}
}


// menubar里的相册
add_event_handler('get_categories_menu_sql_where', 'select_get_categories_menu_sql_where');
function select_get_categories_menu_sql_where($where)
{
	global $user;
	$where = "community_user = '".$user["id"]."'";
	return $where;
}

add_event_handler('loc_begin_index_category_thumbnails', 'select_loc_begin_index_category_thumbnails');
function select_loc_begin_index_category_thumbnails($categories){
	return ;
	global $user;
	$categories_1 = array();
	for($i=0; $i<count($categories); $i++){
		if($categories[$i]["community_user"] == $user["id"]){
			// echo "<h3>cat: ".var_dump($categories[$i])."</h3>";
			// echo "<h2>user id: ".$categories[$i]["community_user"].",".$user["id"]."</h2>";
			//unset($categories[$i]);
			$categories_1[] = $categories[$i];
		}
	}
	$categories = $categories_1;
	//echo "<h3>cat all: ".var_dump($categories)."</h3>";
}

add_event_handler('loc_end_index_category_thumbnails', 'select_loc_end_index_category_thumbnails');
function select_loc_end_index_category_thumbnails($tpl_thumbnails_var){
	global $user,$template;
	$subtpl = array();
	$delete_url;
	for($i=0; $i<count($tpl_thumbnails_var); $i++){
		if($tpl_thumbnails_var[$i]["community_user"] == $user["id"]){
			$subtpl[] = $tpl_thumbnails_var[$i];
			//array_push($subtpl,make_index_url(array('section'=>'delete_catetory')).'/'.$tpl_thumbnails_var[$i]['id']);
		}
	}
	$delete_url=make_index_url(array('section'=>'delete_category')).'/';
	$template->assign( 'CAT_DELETE', $delete_url);
	$tpl_thumbnails_var = $subtpl;
	$file = "themes/becktu";
	
	return $tpl_thumbnails_var;
}

add_event_handler('register_user','add_register_user');
function add_register_user($user)
{
	if (is_admin())
	{
		return;
	}

	global $prefixeTable;
	//echo $user['id'];

	$id = $user['id'];
	$name = $user['username'];

	$query = '
INSERT INTO '.$prefixeTable.'categories
  (name,community_user)
VALUES
  ( \''.$name.'\','.$id.')';
	pwg_query( $query );
	$updateSql='UPDATE '.$prefixeTable.'categories SET uppercats=id WHERE community_user='.$id;
	pwg_query( $updateSql );
	$updateSql='UPDATE '.USER_INFOS_TABLE.' SET level=1 WHERE user_id='.$id;
	pwg_query( $updateSql );
	
}

add_event_handler('loc_end_index_thumbnails', 'community_loc_end_index_thumbnails');
function community_loc_end_index_thumbnails($tpl_thumbnails_var){
	//var_dump($tpl_thumbnails_var);
	global $user,$template;
	$count = count($tpl_thumbnails_var);
	for($i =0; $i<$count;$i++){
		if($tpl_thumbnails_var[$i]['level']==1 and $tpl_thumbnails_var[$i]['added_by']!=$user['id']){
			unset($tpl_thumbnails_var[$i]);
		}
	}
	return $tpl_thumbnails_var;
}

add_event_handler('picture_items', 'community_picture_items');
function community_picture_items($pic_items ){
	global $user,$template;
	$query='SELECT id,level,added_by 
			 FROM '.IMAGES_TABLE.'
		  WHERE id IN ('.implode(',',$pic_items).');';
	$result=pwg_query($query);
	$new_items=array();
	while($row=pwg_db_fetch_assoc($result)){
			if($row['level']==0 or $row['added_by']==$user['id']){
				$new_items[]=$row['id'];
				$template->assign( 'if_visible', 'visible');
		 }
		 if ($row['added_by']!=$user['id']){
			$template->assign( 'if_visible', 'invisible');
		 }
	}
	return $new_items;
}

add_event_handler('get_src_image_url', 'community_get_src_image_url');
function community_get_src_image_url($url){
 //echo "<div> a_src_url :".$url."</div>";
//   if('_data'==substr($url,0,5)  ){
//   	$url=".".substr($url,7);
//   }else if('i.php'==substr($url,0,5)){
//   	$url=".".substr($url,6);
//   }
  	
//   if('-'==substr($url,-7,-6) and '-th.'!=substr($url,-7,-3)){
//   	$url=substr($url,0,-7)."-nt".substr($url,-4);
//   }
	//echo "<div> da_src_url :".$url."</div>";
	return $url;
	//$template->assign( 'new_img_src', $user['bkt_img_src'] );
}


add_event_handler('get_derivative_url', 'community_get_derivative_url');

function community_get_derivative_url($url){
	//echo "<div> b_src_url :".$url."</div>";
// 	  if('_data'==substr($url,0,5)  ){
// 	  	$url=".".substr($url,7);
// 	  }else if('i.php'==substr($url,0,5)){
// 	  	$url=".".substr($url,6);
// 	  }
// 	  if('-'==substr($url,-7,-6) and'-th.'!=substr($url,-7,-3)){
// 	  	$url=substr($url,0,-7)."-nt".substr($url,-4);
// 	  }
//	echo "<div> db_src_url :".$url."</div>";
	return $url;
	//$template->assign( 'new_img_src', $user['bkt_img_src'] );
}


add_event_handler('photo_level_updated', 'community_photo_level_updated');
function community_photo_level_updated($image_id)
{
	 $updateSql='UPDATE '.IMAGES_TABLE.' SET level=1 WHERE id='.$image_id.';';
	 pwg_query($updateSql);
	 return $image_id;
}

add_event_handler('photo_uploaded', 'community_photo_uploaded');
function community_photo_uploaded($photoinfo)
{
 	//add_uploaded_file_to_emfs($photoinfo);
	return $photoinfo;
}


function add_uploaded_file_to_emfs(&$photoinfo)
{
  // 1) move uploaded file to temp directory
  // 2) keep/resize original
  // 3) register in database
  // TODO
  // * check md5sum (already exists?)

  global $conf, $user;

	$photoinfo["uid"] = $user["id"];
	$photoinfo["mail_dir"] = "1";
	$photoinfo["owner"] = "becktu.com ".$user["username"];
	list($photoinfo["now_time"]) = pwg_db_fetch_row(pwg_query('SELECT NOW();'));
	$photoinfo["result"] = 0;

	$task_msg = NULL;
	$task_flag = 0;

	$original_filename = $photoinfo["original_filename"];
	$categories = $photoinfo["categories"];
	$level = $photoinfo["level"];
	$image_id = $photoinfo["image_id"];
	$file_explode = explode('.', $original_filename);
	if(count($file_explode) > 1) $file_ext = $file_explode[count($file_explode)-1];
	else $file_ext="";
	$source_filepath = $photoinfo["src_img_file"] = source_image_tmpfile($photoinfo["source_filepath"], $file_ext);

	/* code need here, 缩略图, Note: thumbnail URL */
	$photoinfo["th_img_file"] = $th_img_file = thumbnail_image_tmpfile($source_filepath, $file_ext);
	/* code need here, 网络查看图*/
	$photoinfo["nt_img_file"] = $nt_img_file = network_image_tmpfile($source_filepath, $file_ext);

	/*
	 * $photoinfo["th_img_file"], $photoinfo["nt_img_file"] 重命名为$photoinfo["src_img_file"]后分别加'-th'和'-nt'
	 */
	$photoinfo["th_img_file"] = image_file_relate_rename($photoinfo["src_img_file"], $th_img_file, "-th");
	$photoinfo["nt_img_file"] = image_file_relate_rename($photoinfo["src_img_file"], $nt_img_file, "-nt");

	@syslog(LOG_INFO, 'open source file: '.$photoinfo["source_filepath"].", src file:".$photoinfo["src_img_file"].", th img fil: ".$photoinfo["th_img_file"].", nt img file: ".$photoinfo["nt_img_file"]);

	echo "<div>thumbnail: ".$th_img_file.", network: ".$nt_img_file."</div><br>";

  $file_path = null;
  $is_tiff = false;
  $file_infos = pwg_image_infos($source_filepath);
	// $file_infos["filesize"], 非精确值

	if(!isset($photoinfo["original_md5sum"])){
		$photoinfo["original_md5sum"] = md5_file($source_filepath);
	}
    $md5sum = $photoinfo["original_md5sum"]; 

	//$photoinfo["result"] = 0;
	//return $image_id;

  if (isset($image_id))
  {
    // this photo already exists, we update it
    $query = '
SELECT
    path
  FROM '.IMAGES_TABLE.'
  WHERE id = '.$image_id.'
;';
    $result = pwg_query($query);
    while ($row = pwg_db_fetch_assoc($result))
    {
      $file_path = $row['path'];
    }

    if (!isset($file_path))
    {
      die('['.__FUNCTION__.'] this photo does not exist in the database');
    }

    // delete all physical files related to the photo (thumbnail, web site, HD)
    //delete_element_files(array($image_id));
	/*
	 *	need code here,  对存在的文件不需要处理 
	 */
  }
  else
  {
    // this photo is new

    // current date
    list($dbnow) = pwg_db_fetch_row(pwg_query('SELECT NOW();'));
    list($year, $month, $day) = preg_split('/[^\d]/', $dbnow, 4);

	// 图片地址规则:
	// http://host/imgbkt/year/month/day/[t|i]/uid/catid/imgid/imagefilename
	// t

    // upload directory hierarchy
    $upload_dir = sprintf(
      //PHPWG_ROOT_PATH.$conf['upload_dir'].'/%s/%s/%s',
      PHPWG_ROOT_PATH.'imgbkt/%s/%s/%s', // 'imgbkt' as key work for image URL
      $year,
      $month,
      $day
    );

    // compute file path
    $date_string = preg_replace('/[^\d]/', '', $dbnow);
    $random_string = substr($md5sum, 0, 8);
    $filename_wo_ext = $date_string.'-'.$random_string;
    //$filename_wo_ext = $md5sum; // set md5 as file name
    $file_path = $upload_dir.'/'.$filename_wo_ext.'.';

    list($width, $height, $type) = getimagesize($source_filepath);
    if (IMAGETYPE_PNG == $type)
    {
      $file_path.= 'png';
    }
    elseif (IMAGETYPE_GIF == $type)
    {
      $file_path.= 'gif';
    }
    elseif (IMAGETYPE_TIFF_MM == $type or IMAGETYPE_TIFF_II == $type)
    {
      $is_tiff = true;
      $file_path.= 'tif';
    }
    else
    {
      $file_path.= 'jpg';
    }
  }

	$file_path_for_saving = $source_filepath; //$photoinfo["src_img_file"];
	$file_path = $source_filepath;
	$task_flag = 1;
  //if ($is_tiff and pwg_image::get_library() == 'ext_imagick')
  if (false and $is_tiff and pwg_image::get_library() == 'ext_imagick') // 指定只采用ImageMagick软件
  {
	echo '<script>alert("is_tiff and ext_imagick");</script>';
	//echo 'is_tiff and ext_imagick</script>';

    // move the uploaded file to pwg_representative sub-directory
    $representative_file_path = dirname($file_path).'/pwg_representative/';
    $representative_file_path.= get_filename_wo_extension(basename($file_path)).'.';

    $representative_ext = $conf['tiff_representative_ext'];
    $representative_file_path.= $representative_ext;

    prepare_directory(dirname($representative_file_path));
    
    $exec = $conf['ext_imagick_dir'].'convert';

    if ('jpg' == $conf['tiff_representative_ext'])
    {
      $exec .= ' -quality 98';
    }
    
    $exec .= ' "'.realpath($file_path).'"';

    $dest = pathinfo($representative_file_path);
    $exec .= ' "'.realpath($dest['dirname']).'/'.$dest['basename'].'"';
    
    $exec .= ' 2>&1';
    @exec($exec, $returnarray);

    // sometimes ImageMagick creates file-0.jpg (full size) + file-1.jpg
    // (thumbnail). I don't know how to avoid it.
    $representative_file_abspath = realpath($dest['dirname']).'/'.$dest['basename'];
    if (!file_exists($representative_file_abspath))
    {
      $first_file_abspath = preg_replace(
        '/\.'.$representative_ext.'$/',
        '-0.'.$representative_ext,
        $representative_file_abspath
        );
      
      if (file_exists($first_file_abspath))
      {
        rename($first_file_abspath, $representative_file_abspath);
      }
    }
  }

  //if (pwg_image::get_library() != 'gd')
  if (false and pwg_image::get_library() != 'gd') // 保存原图，此处不处理
  {
    if ($conf['original_resize'])
    {
      $need_resize = need_resize($file_path, $conf['original_resize_maxwidth'], $conf['original_resize_maxheight']);

      if ($need_resize)
      {
        $img = new pwg_image($file_path);

        $img->pwg_resize(
          $file_path,
          $conf['original_resize_maxwidth'],
          $conf['original_resize_maxheight'],
          $conf['original_resize_quality'],
          $conf['upload_form_automatic_rotation'],
          false
          );

        $img->destroy();
      }
    }
  }

  // we need to save the rotation angle in the database to compute
  // width/height of "multisizes"
  $rotation_angle = pwg_image::get_rotation_angle($file_path);
  $rotation = pwg_image::get_rotation_code_from_angle($rotation_angle);
  
  if (isset($image_id))
  {
	/*
	 *	need code here   更新存在图片的信息
	 */
    $update = array(
      'file' => pwg_db_real_escape_string(isset($original_filename) ? $original_filename : basename($file_path)),
      'filesize' => $file_infos['filesize'],
      'width' => $file_infos['width'],
      'height' => $file_infos['height'],
      'md5sum' => $md5sum,
      'added_by' => $user['id'],
      'rotation' => $rotation,
      );

    if (isset($level))
    {
      $update['level'] = $level;
    }

    single_update(
      IMAGES_TABLE,
      $update,
      array('id' => $image_id)
      );
  }
  else
  {
    // database registration
    $file = pwg_db_real_escape_string(isset($original_filename) ? $original_filename : basename($file_path));
    $insert = array(
      'file' => $file,
      'name' => get_name_from_file($file),
      'date_available' => $dbnow,
      'path' => preg_replace('#^'.preg_quote(PHPWG_ROOT_PATH).'#', '', basename($file_path_for_saving)),
      'filesize' => $file_infos['filesize'],
      'width' => $file_infos['width'],
      'height' => $file_infos['height'],
      'md5sum' => $md5sum,
      'added_by' => $user['id'],
      'rotation' => $rotation,
    );

    if (isset($level))
    {
      $insert['level'] = $level;
    }

    if (isset($representative_ext))
    {
      $insert['representative_ext'] = $representative_ext;
    }

    single_insert(IMAGES_TABLE, $insert);

    $image_id = pwg_db_insert_id(IMAGES_TABLE);

	// generate mail folder, 不需要了，邮箱文件夹直接由关键词、用户ID、相册ID组成
    $insert_emfs = array(
      'fid' => $image_id,
      'status' => 2,
      'shareable' => 0,
    );

    single_insert(EMFS_FILES_TABLE, $insert_emfs);
    //$emfs_id = pwg_db_insert_id(EMFS_FILES_TABLE);
	
  }

  // 需要上传到邮箱的图片添加到上传任务表
  $photoinfo["image_id"] = $image_id;
  if($task_flag == 1)
  {
	add_upload_task($photoinfo);
  }

  if (isset($categories) and count($categories) > 0)
  {
    associate_images_to_categories(
      array($image_id),
      $categories
      );
  }

  // update metadata from the uploaded file (exif/iptc)
  if ($conf['use_exif'] and !function_exists('read_exif_data'))
  {
    $conf['use_exif'] = false;
  }
  sync_metadata(array($image_id));

  invalidate_user_cache();

  // thumbnail 存于邮件的MIME头中
	$photoinfo["result"] = 1;
  return $image_id;
}

function add_upload_task(&$photoinfo)
{
	foreach($photoinfo["categories"] as $cat_id){
    	$insert_task = array(
		 	'uid' => $photoinfo["uid"],
		 	'fid' => $photoinfo["image_id"],
		 	'catid' => $cat_id,
		 	'orig_file' => basename($photoinfo["src_img_file"]),
		 	'net_file' => basename($photoinfo["nt_img_file"]),
		 	'th_file' => basename($photoinfo["th_img_file"]),
		 	'add_time' => $photoinfo["now_time"],
		 	//'exec_time' => "",
		 	'status' => 0,
		 	'owner' => $photoinfo["owner"],
		 	'orig_filename' => $photoinfo["original_filename"],
    	);

    	single_insert(EMFS_TASKS_TABLE, $insert_task);
	}
}

?>
