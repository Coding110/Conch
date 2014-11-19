<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 15:44:05
         compiled from "./themes/default/template/mail/text/plain/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17804892605467044561e2f0-97985063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba5ea3da781137d97740a7a38a8922c028ede432' => 
    array (
      0 => './themes/default/template/mail/text/plain/header.tpl',
      1 => 1383679409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17804892605467044561e2f0-97985063',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MAIL_TITLE' => 0,
    'MAIL_SUBTITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670445625e36_68398346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670445625e36_68398346')) {function content_54670445625e36_68398346($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['MAIL_TITLE']->value;?>

<?php if (!empty($_smarty_tpl->tpl_vars['MAIL_SUBTITLE']->value)){?><?php echo $_smarty_tpl->tpl_vars['MAIL_SUBTITLE']->value;?>

<?php }?>
----

<?php }} ?>