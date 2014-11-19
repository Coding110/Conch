<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "./themes/smartpocket/template/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1229092005467fa16690974-40808870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '359422fae46c6bcb53c8a6cf5c8a25862dcaa456' => 
    array (
      0 => './themes/smartpocket/template/index.tpl',
      1 => 1372602282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1229092005467fa16690974-40808870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CATEGORIES' => 0,
    'THUMBNAILS' => 0,
    'CONTENT_DESCRIPTION' => 0,
    'CONTENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa166a5c46_71252323',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa166a5c46_71252323')) {function content_5467fa166a5c46_71252323($_smarty_tpl) {?><div data-role="content">
<?php if (!empty($_smarty_tpl->tpl_vars['CATEGORIES']->value)){?><?php echo $_smarty_tpl->tpl_vars['CATEGORIES']->value;?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['THUMBNAILS']->value)){?><?php echo $_smarty_tpl->tpl_vars['THUMBNAILS']->value;?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['CONTENT_DESCRIPTION']->value)){?>
<div class="additional_info">
	<?php echo $_smarty_tpl->tpl_vars['CONTENT_DESCRIPTION']->value;?>

</div>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['CONTENT']->value)){?><?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>
<?php }?>
</div>

<?php }} ?>