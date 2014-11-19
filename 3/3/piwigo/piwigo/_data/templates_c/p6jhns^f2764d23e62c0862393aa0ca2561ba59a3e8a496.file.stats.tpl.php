<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:24:55
         compiled from "./admin/themes/default/template/stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129248974854670dd7560ed0-24820869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2764d23e62c0862393aa0ca2561ba59a3e8a496' => 
    array (
      0 => './admin/themes/default/template/stats.tpl',
      1 => 1274831749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129248974854670dd7560ed0-24820869',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TABSHEET_TITLE' => 0,
    'L_STAT_TITLE' => 0,
    'PERIOD_LABEL' => 0,
    'statrows' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670dd759d5d8_23424856',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670dd759d5d8_23424856')) {function content_54670dd759d5d8_23424856($_smarty_tpl) {?>
<div class="titrePage">
  <h2><?php echo l10n('History');?>
 <?php echo $_smarty_tpl->tpl_vars['TABSHEET_TITLE']->value;?>
</h2>
</div>

<h3><?php echo $_smarty_tpl->tpl_vars['L_STAT_TITLE']->value;?>
</h3>

<table class="table2" id="dailyStats">
	<tr class="throw">
		<th><?php echo $_smarty_tpl->tpl_vars['PERIOD_LABEL']->value;?>
</th>
		<th><?php echo l10n('Pages seen');?>
</th>
		<th></th>
	</tr>

<?php if (!empty($_smarty_tpl->tpl_vars['statrows']->value)){?>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['statrows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
	<tr>
		<td style="white-space: nowrap"><?php echo $_smarty_tpl->tpl_vars['row']->value['VALUE'];?>
</td>
		<td class="number"><?php echo $_smarty_tpl->tpl_vars['row']->value['PAGES'];?>
</td>
		<td><div class="statBar" style="width:<?php echo $_smarty_tpl->tpl_vars['row']->value['WIDTH'];?>
px"></div></td>
	</tr>
<?php } ?>
<?php }?>

</table>
<?php }} ?>