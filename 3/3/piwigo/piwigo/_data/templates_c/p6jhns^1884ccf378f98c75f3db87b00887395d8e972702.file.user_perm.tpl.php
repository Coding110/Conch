<?php /* Smarty version Smarty-3.1.13, created on 2014-11-18 13:55:41
         compiled from "./admin/themes/default/template/user_perm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1012308803546adf5d1f28b5-32469090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1884ccf378f98c75f3db87b00887395d8e972702' => 
    array (
      0 => './admin/themes/default/template/user_perm.tpl',
      1 => 1285103694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1012308803546adf5d1f28b5-32469090',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
    'categories_because_of_groups' => 0,
    'cat' => 0,
    'F_ACTION' => 0,
    'DOUBLE_SELECT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_546adf5d245c21_96953486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546adf5d245c21_96953486')) {function content_546adf5d245c21_96953486($_smarty_tpl) {?><h2><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</h2>

<?php if (isset($_smarty_tpl->tpl_vars['categories_because_of_groups']->value)){?>
<fieldset>
  <legend><?php echo l10n('Albums authorized thanks to group associations');?>
</legend>

  <ul>
<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories_because_of_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
</li>
<?php } ?>
  </ul>
</fieldset>
<?php }?>


<fieldset>
  <legend><?php echo l10n('Other private albums');?>
</legend>

  <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
">
    <?php echo $_smarty_tpl->tpl_vars['DOUBLE_SELECT']->value;?>

  </form>
</fieldset>
<?php }} ?>