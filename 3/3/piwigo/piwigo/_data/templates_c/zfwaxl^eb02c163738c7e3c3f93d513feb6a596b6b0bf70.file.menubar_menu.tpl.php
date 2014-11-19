<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "./themes/smartpocket/template/menubar_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12614616325467fa1658e715-52266144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb02c163738c7e3c3f93d513feb6a596b6b0bf70' => 
    array (
      0 => './themes/smartpocket/template/menubar_menu.tpl',
      1 => 1372602282,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12614616325467fa1658e715-52266144',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'block' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa165ab510_69204816',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa165ab510_69204816')) {function content_5467fa165ab510_69204816($_smarty_tpl) {?><h3><?php echo l10n('Menu');?>
</h3>
<ul data-role="listview">
<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value->data; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
<?php if (is_array($_smarty_tpl->tpl_vars['link']->value)){?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['TITLE'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['link']->value['REL'])){?> <?php echo $_smarty_tpl->tpl_vars['link']->value['REL'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['link']->value['NAME'];?>
</a><?php if (isset($_smarty_tpl->tpl_vars['link']->value['COUNTER'])){?><span class="ui-li-count"><?php echo $_smarty_tpl->tpl_vars['link']->value['COUNTER'];?>
</span><?php }?></li>
<?php }?>
<?php } ?>
</ul><?php }} ?>