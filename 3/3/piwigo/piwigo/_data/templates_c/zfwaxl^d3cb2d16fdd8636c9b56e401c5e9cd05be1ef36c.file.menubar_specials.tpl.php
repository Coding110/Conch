<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "./themes/smartpocket/template/menubar_specials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5748923725467fa1656ff73-64156018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3cb2d16fdd8636c9b56e401c5e9cd05be1ef36c' => 
    array (
      0 => './themes/smartpocket/template/menubar_specials.tpl',
      1 => 1372602282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5748923725467fa1656ff73-64156018',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'block' => 0,
    'key' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa1658b1f6_54926771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa1658b1f6_54926771')) {function content_5467fa1658b1f6_54926771($_smarty_tpl) {?><h3><?php echo l10n('Specials');?>
</h3>
<ul data-role="listview">
<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['block']->value->data; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['link']->key;
?>
<?php if (in_array($_smarty_tpl->tpl_vars['key']->value,array("favorites","most_visited","best_rated","recent_pics","recent_cats","random"))){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['TITLE'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['link']->value['REL'])){?> <?php echo $_smarty_tpl->tpl_vars['link']->value['REL'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['link']->value['NAME'];?>
</a></li>
<?php }?>
<?php } ?>
</ul>
<?php }} ?>