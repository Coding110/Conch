<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "./themes/smartpocket/template/menubar_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11028110085467fa16536a63-51759534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21aaf857177ebed934201836b88158d91fb5adf4' => 
    array (
      0 => './themes/smartpocket/template/menubar_categories.tpl',
      1 => 1372602282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11028110085467fa16536a63-51759534',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'block' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa1656b911_08982289',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa1656b911_08982289')) {function content_5467fa1656b911_08982289($_smarty_tpl) {?><h3><?php echo l10n('Albums');?>
</h3>
<ul data-role="listview">
<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value->data['MENU_CATEGORIES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['cat']->value['URL'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['IS_UPPERCAT']){?>rel="up"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['cat']->value['TITLE'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['NAME'];?>
</a>
  <?php if ($_smarty_tpl->tpl_vars['cat']->value['count_images']>0){?><span class="ui-li-count"><?php echo $_smarty_tpl->tpl_vars['cat']->value['count_images'];?>
</span><?php }?>
  </li>
<?php } ?>
</ul>
<?php }} ?>