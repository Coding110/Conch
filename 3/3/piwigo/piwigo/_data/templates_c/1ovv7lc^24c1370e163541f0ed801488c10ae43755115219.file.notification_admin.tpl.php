<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:36:19
         compiled from "./themes/default/template/mail/text/plain/notification_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:202982352354671083cc4ad3-57621786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24c1370e163541f0ed801488c10ae43755115219' => 
    array (
      0 => './themes/default/template/mail/text/plain/notification_admin.tpl',
      1 => 1383760673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202982352354671083cc4ad3-57621786',
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
  'unifunc' => 'content_54671083cd4db4_03015115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54671083cd4db4_03015115')) {function content_54671083cd4db4_03015115($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['TECHNICAL']->value)){?>
-----------------------------
<?php echo l10n('Connected user: %s',$_smarty_tpl->tpl_vars['TECHNICAL']->value['username']);?>

<?php echo l10n('IP: %s',$_smarty_tpl->tpl_vars['TECHNICAL']->value['ip']);?>

<?php echo l10n('Browser: %s',$_smarty_tpl->tpl_vars['TECHNICAL']->value['user_agent']);?>

<?php }?><?php }} ?>