<?php /* Smarty version Smarty-3.1.13, created on 2014-11-18 14:00:27
         compiled from "./admin/themes/default/template/group_perm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:395255008546ae07ba827d4-70609196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f831864463df17dc89cfb29231b27a1c310d0f7' => 
    array (
      0 => './admin/themes/default/template/group_perm.tpl',
      1 => 1285103694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '395255008546ae07ba827d4-70609196',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
    'F_ACTION' => 0,
    'DOUBLE_SELECT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_546ae07baa7a52_97308664',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546ae07baa7a52_97308664')) {function content_546ae07baa7a52_97308664($_smarty_tpl) {?>
<h2><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</h2>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
">
  <?php echo $_smarty_tpl->tpl_vars['DOUBLE_SELECT']->value;?>

</form>

<p><?php echo l10n('Only private albums are listed');?>
</p>
<?php }} ?>