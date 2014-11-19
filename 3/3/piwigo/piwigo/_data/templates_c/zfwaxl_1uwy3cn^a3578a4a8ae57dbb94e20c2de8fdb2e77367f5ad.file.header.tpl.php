<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "./themes/smartpocket/template/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12879194525467fa1661f8f4-65799625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3578a4a8ae57dbb94e20c2de8fdb2e77367f5ad' => 
    array (
      0 => './themes/smartpocket/template/header.tpl',
      1 => 1372602282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12879194525467fa1661f8f4-65799625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_info' => 0,
    'CONTENT_ENCODING' => 0,
    'meta_ref' => 0,
    'INFO_AUTHOR' => 0,
    'related_tags' => 0,
    'tag' => 0,
    'COMMENT_IMG' => 0,
    'INFO_FILE' => 0,
    'PAGE_TITLE' => 0,
    'REVERSE' => 0,
    'GALLERY_TITLE' => 0,
    'U_HOME' => 0,
    'themes' => 0,
    'theme' => 0,
    'U_CANONICAL' => 0,
    'page_refresh' => 0,
    'MENUBAR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa1668bf65_64691084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa1668bf65_64691084')) {function content_5467fa1668bf65_64691084($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/piwigo/include/smarty/libs/plugins/modifier.replace.php';
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang_info']->value['code'];?>
" dir="<?php echo $_smarty_tpl->tpl_vars['lang_info']->value['direction'];?>
">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['CONTENT_ENCODING']->value;?>
">
<meta name="generator" content="Piwigo (aka PWG), see piwigo.org">
<?php if (isset($_smarty_tpl->tpl_vars['meta_ref']->value)){?> 
<?php if (isset($_smarty_tpl->tpl_vars['INFO_AUTHOR']->value)){?>
<meta name="author" content="<?php echo smarty_modifier_replace(strip_tags($_smarty_tpl->tpl_vars['INFO_AUTHOR']->value),'"',' ');?>
">
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['related_tags']->value)){?>
<meta name="keywords" content="<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->index++;
 $_smarty_tpl->tpl_vars['tag']->first = $_smarty_tpl->tpl_vars['tag']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tag_loop']['first'] = $_smarty_tpl->tpl_vars['tag']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['tag_loop']['first']){?>, <?php }?><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
<?php } ?>">
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['COMMENT_IMG']->value)){?>
<meta name="description" content="<?php echo smarty_modifier_replace(strip_tags($_smarty_tpl->tpl_vars['COMMENT_IMG']->value),'"',' ');?>
<?php if (isset($_smarty_tpl->tpl_vars['INFO_FILE']->value)){?> - <?php echo $_smarty_tpl->tpl_vars['INFO_FILE']->value;?>
<?php }?>">
<?php }else{ ?>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['INFO_FILE']->value)){?> - <?php echo $_smarty_tpl->tpl_vars['INFO_FILE']->value;?>
<?php }?>">
<?php }?>
<?php }?>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<meta name="apple-mobile-web-app-capable" content="yes" />

<?php if ((isset($_smarty_tpl->tpl_vars['REVERSE']->value)&&$_smarty_tpl->tpl_vars['REVERSE']->value&&$_smarty_tpl->tpl_vars['PAGE_TITLE']->value==l10n('Home'))){?>
<title><?php echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;?>
</title><?php }else{ ?>
<title><?php echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>
</title><?php }?>
<link rel="start" title="<?php echo l10n('Home');?>
" href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
" >

<!-- COMBINED_CSS -->
<?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['themes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value){
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['theme']->value['load_css']){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/".((string)$_smarty_tpl->tpl_vars['theme']->value['id'])."/theme.css",'order'=>-10),$_smarty_tpl);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['theme']->value['local_head'])){?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['theme']->value['local_head'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('load_css'=>$_smarty_tpl->tpl_vars['theme']->value['load_css']), 0);?>
<?php }?>
<?php } ?>

<?php if (isset($_smarty_tpl->tpl_vars['U_CANONICAL']->value)){?><link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['U_CANONICAL']->value;?>
"><?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['page_refresh']->value)){?><meta http-equiv="refresh" content="<?php echo $_smarty_tpl->tpl_vars['page_refresh']->value['TIME'];?>
;url=<?php echo $_smarty_tpl->tpl_vars['page_refresh']->value['U_REFRESH'];?>
"><?php }?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load'=>'header'),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'config','path'=>'themes/smartpocket/js/config.js','require'=>'jquery'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.mobile','path'=>'themes/smartpocket/js/jquery.mobile.min.js','require'=>'jquery,config'),$_smarty_tpl);?>


</head>

<body>
<div data-role="page" data-theme="a">
<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><div data-role="panel" id="menubar" data-position="right" data-display="overlay">
  <?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>

</div><?php }?>
<div data-role="header">
  <div class="title">
    <a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
" class="home_button" data-icon="home" data-iconpos="notext" data-role="button"></a>
    <?php echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>

    <a href="#menubar" data-icon="grid" data-iconpos="notext" data-role="button" style="float: right" >Menu</a>
  </div>
</div>

<?php }} ?>