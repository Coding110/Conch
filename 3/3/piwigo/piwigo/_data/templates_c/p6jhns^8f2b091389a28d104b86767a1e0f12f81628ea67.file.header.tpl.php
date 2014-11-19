<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:08
         compiled from "./admin/themes/default/template/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4002066205466c8c0782255-11829603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f2b091389a28d104b86767a1e0f12f81628ea67' => 
    array (
      0 => './admin/themes/default/template/header.tpl',
      1 => 1385719985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4002066205466c8c0782255-11829603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_info' => 0,
    'CONTENT_ENCODING' => 0,
    'GALLERY_TITLE' => 0,
    'PAGE_TITLE' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
    'themes' => 0,
    'theme' => 0,
    'head_elements' => 0,
    'elt' => 0,
    'BODY_ID' => 0,
    'header_msgs' => 0,
    'U_RETURN' => 0,
    'USERNAME' => 0,
    'U_CHANGE_THEME' => 0,
    'U_FAQ' => 0,
    'U_LOGOUT' => 0,
    'header_notes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c07cd966_16354077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c07cd966_16354077')) {function content_5466c8c07cd966_16354077($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang_info']->value['code'];?>
" dir="<?php echo $_smarty_tpl->tpl_vars['lang_info']->value['direction'];?>
">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['CONTENT_ENCODING']->value;?>
">
<meta name="generator" content="Piwigo (aka PWG), see piwigo.org">
<title><?php echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>
 :: <?php echo $_smarty_tpl->tpl_vars['PAGE_TITLE']->value;?>
</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/favicon.ico">

<!-- COMBINED_CSS -->
<?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['themes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value){
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['theme']->value['load_css']){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"admin/themes/".((string)$_smarty_tpl->tpl_vars['theme']->value['id'])."/theme.css",'order'=>-10),$_smarty_tpl);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['theme']->value['local_head'])){?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['theme']->value['local_head'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('load_css'=>$_smarty_tpl->tpl_vars['theme']->value['load_css']), 0);?>
<?php }?>
<?php } ?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"admin/themes/default/fontello/css/fontello.css"),$_smarty_tpl);?>


<!-- BEGIN get_combined_scripts -->
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load'=>'header'),$_smarty_tpl);?>

<!-- END get_combined_scripts -->

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery','path'=>'themes/default/js/jquery.min.js'),$_smarty_tpl);?>


<!--[if lt IE 7]>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
themes/default/js/pngfix.js"></script>
<![endif]-->

<?php if (!empty($_smarty_tpl->tpl_vars['head_elements']->value)){?>
<?php  $_smarty_tpl->tpl_vars['elt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['head_elements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elt']->key => $_smarty_tpl->tpl_vars['elt']->value){
$_smarty_tpl->tpl_vars['elt']->_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['elt']->value;?>

<?php } ?>
<?php }?>

</head>

<body id="<?php echo $_smarty_tpl->tpl_vars['BODY_ID']->value;?>
">

<div id="the_page">

<?php if (!empty($_smarty_tpl->tpl_vars['header_msgs']->value)){?>
<div class="header_msgs">
<?php  $_smarty_tpl->tpl_vars['elt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['header_msgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elt']->key => $_smarty_tpl->tpl_vars['elt']->value){
$_smarty_tpl->tpl_vars['elt']->_loop = true;
?>
  <?php echo $_smarty_tpl->tpl_vars['elt']->value;?>

<?php } ?>
</div>
<?php }?>

<div id="pwgHead">
  <h1>
    <a href="<?php echo $_smarty_tpl->tpl_vars['U_RETURN']->value;?>
" title="<?php echo l10n('Visit Gallery');?>
">
			<span class="icon-home" style="font-size:larger"></span>
			<?php echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>

    </a>
  </h1>

  <div id="headActions">
    <?php echo l10n('Hello');?>
 <?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
 |
    <a class="icon-eye" href="<?php echo $_smarty_tpl->tpl_vars['U_RETURN']->value;?>
"><?php echo l10n('Visit Gallery');?>
</a> |
    <a class="icon-brush" href="<?php echo $_smarty_tpl->tpl_vars['U_CHANGE_THEME']->value;?>
" title="<?php echo l10n('Switch to clear or dark colors for administration');?>
"><?php echo l10n('Change Admin Colors');?>
</a> |
    <a class="icon-help-circled" href="<?php echo $_smarty_tpl->tpl_vars['U_FAQ']->value;?>
" title="<?php echo l10n('Instructions to use Piwigo');?>
"><?php echo l10n('Help Me');?>
</a> |
    <a class="icon-logout" href="<?php echo $_smarty_tpl->tpl_vars['U_LOGOUT']->value;?>
"><?php echo l10n('Logout');?>
</a>
  </div>
</div>

<div style="clear:both;"></div>

<?php if (!empty($_smarty_tpl->tpl_vars['header_notes']->value)){?>
<div class="header_notes">
<?php  $_smarty_tpl->tpl_vars['elt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['header_notes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elt']->key => $_smarty_tpl->tpl_vars['elt']->value){
$_smarty_tpl->tpl_vars['elt']->_loop = true;
?>
  <?php echo $_smarty_tpl->tpl_vars['elt']->value;?>

<?php } ?>
</div>
<?php }?>

<div id="pwgMain"><?php }} ?>