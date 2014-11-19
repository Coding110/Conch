<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:25
         compiled from "./themes/becktu/template/infos_errors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13686276875466c8d1ed1134-52006582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8689ba9b1dd0bf73e99c71248026ccac1c48b1e9' => 
    array (
      0 => './themes/becktu/template/infos_errors.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13686276875466c8d1ed1134-52006582',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'error' => 0,
    'infos' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8d1ee0da6_87138437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8d1ee0da6_87138437')) {function content_5466c8d1ee0da6_87138437($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>
<div class="errors">
  <ul>
<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
<?php } ?>
  </ul>
</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['infos']->value)){?>
<div style="width:80%;text-align:right;">
<div class="infos" style="width:66%;text-align:center;float:right;">
  <ul>
<?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value){
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</li>
<?php } ?>
  </ul>
</div>
</div>
<?php }?><?php }} ?>