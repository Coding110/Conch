<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:08
         compiled from "./admin/themes/default/template/tabsheet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4447373175466c8c066f679-82042800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9a224014fd5c12c88b8a1e6a05b263459e021aa' => 
    array (
      0 => './admin/themes/default/template/tabsheet.tpl',
      1 => 1308231339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4447373175466c8c066f679-82042800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tabsheet' => 0,
    'name' => 0,
    'tabsheet_selected' => 0,
    'sheet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c06a1709_92120339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c06a1709_92120339')) {function content_5466c8c06a1709_92120339($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['tabsheet']->value)&&count($_smarty_tpl->tpl_vars['tabsheet']->value)){?>
<div id="tabsheet">
<ul class="tabsheet">
<?php  $_smarty_tpl->tpl_vars['sheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sheet']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tabsheet']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sheet']->key => $_smarty_tpl->tpl_vars['sheet']->value){
$_smarty_tpl->tpl_vars['sheet']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['sheet']->key;
?>
  <li class="<?php if (($_smarty_tpl->tpl_vars['name']->value==$_smarty_tpl->tpl_vars['tabsheet_selected']->value)){?>selected_tab<?php }else{ ?>normal_tab<?php }?>">
    <a href="<?php echo $_smarty_tpl->tpl_vars['sheet']->value['url'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['sheet']->value['caption'];?>
</span></a>
  </li>
<?php } ?>
</ul>
</div>
<?php }?><?php }} ?>