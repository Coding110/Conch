<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:15
         compiled from "/var/www/html/piwigo/themes/becktu/local_head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17348827275466c8c7e0c7a0-09472773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3cea699f198e7d90603a3c2affb15769237a5b8' => 
    array (
      0 => '/var/www/html/piwigo/themes/becktu/local_head.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17348827275466c8c7e0c7a0-09472773',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'load_css' => 0,
    'ROOT_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c7e14c77_50721068',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c7e14c77_50721068')) {function content_5466c8c7e14c77_50721068($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['load_css']->value){?> 
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
themes/becktu/fix-ie5-ie6.css">
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
themes/becktu/fix-ie7.css">
	<![endif]-->
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/becktu/print.css",'order'=>-10),$_smarty_tpl);?>

<?php }?>
<?php }} ?>