<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:36:19
         compiled from "./themes/default/template/mail/text/html/notification_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153432070554671083c926c4-50815950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db87cf5683850b2b24b36ce11794582d267c04bb' => 
    array (
      0 => './themes/default/template/mail/text/html/notification_admin.tpl',
      1 => 1383760673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153432070554671083c926c4-50815950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CONTENT' => 0,
    'TECHNICAL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54671083cbe918_19923097',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54671083cbe918_19923097')) {function content_54671083cbe918_19923097($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['TECHNICAL']->value)){?>
<p style="padding-top:10px;font-size:11px;">
<?php echo l10n('Connected user: %s',$_smarty_tpl->tpl_vars['TECHNICAL']->value['username']);?>
<br>
<?php echo l10n('IP: %s',$_smarty_tpl->tpl_vars['TECHNICAL']->value['ip']);?>
<br>
<?php echo l10n('Browser: %s',$_smarty_tpl->tpl_vars['TECHNICAL']->value['user_agent']);?>

</p>
<?php }?><?php }} ?>