<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 10:36:11
         compiled from "./themes/becktu/template/month_calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128436080354680d9b3f6164-27139963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2b11131b3e6612483e5cefcf69c74d2e08cbb18' => 
    array (
      0 => './themes/becktu/template/month_calendar.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128436080354680d9b3f6164-27139963',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'chronology_navigation_bars' => 0,
    'bar' => 0,
    'item' => 0,
    'chronology_calendar' => 0,
    'wday' => 0,
    'week' => 0,
    'day' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54680d9b4e1263_81606215',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54680d9b4e1263_81606215')) {function content_54680d9b4e1263_81606215($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['chronology_navigation_bars']->value)){?>
<?php  $_smarty_tpl->tpl_vars['bar'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bar']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chronology_navigation_bars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bar']->key => $_smarty_tpl->tpl_vars['bar']->value){
$_smarty_tpl->tpl_vars['bar']->_loop = true;
?>
<div class="calendarBar">
<?php if (isset($_smarty_tpl->tpl_vars['bar']->value['previous'])){?>
		<div style="float:left;margin-right:5px">&laquo; <a href="<?php echo $_smarty_tpl->tpl_vars['bar']->value['previous']['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['bar']->value['previous']['LABEL'];?>
</a></div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['bar']->value['next'])){?>
		<div style="float:right;margin-left:5px"><a href="<?php echo $_smarty_tpl->tpl_vars['bar']->value['next']['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['bar']->value['next']['LABEL'];?>
</a> &raquo;</div>
<?php }?>
<?php if (empty($_smarty_tpl->tpl_vars['bar']->value['items'])){?>
		&nbsp;
<?php }else{ ?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bar']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<?php if (!isset($_smarty_tpl->tpl_vars['item']->value['URL'])){?>
		<span class="calItem"><?php echo $_smarty_tpl->tpl_vars['item']->value['LABEL'];?>
</span>
<?php }else{ ?>
		<a class="calItem"<?php if (isset($_smarty_tpl->tpl_vars['item']->value['NB_IMAGES'])){?> title="<?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['item']->value['NB_IMAGES']);?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['item']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['LABEL'];?>
</a>
<?php }?>
<?php } ?>
<?php }?>
</div>
<?php } ?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['chronology_calendar']->value['calendar_bars'])){?>
<?php  $_smarty_tpl->tpl_vars['bar'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bar']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chronology_calendar']->value['calendar_bars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bar']->key => $_smarty_tpl->tpl_vars['bar']->value){
$_smarty_tpl->tpl_vars['bar']->_loop = true;
?>
<div class="calendarCalBar">
	<span class="calCalHead"><a href="<?php echo $_smarty_tpl->tpl_vars['bar']->value['U_HEAD'];?>
"><?php echo $_smarty_tpl->tpl_vars['bar']->value['HEAD_LABEL'];?>
</a>  (<?php echo $_smarty_tpl->tpl_vars['bar']->value['NB_IMAGES'];?>
)</span><br>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bar']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
	<span class="calCal<?php if (!isset($_smarty_tpl->tpl_vars['item']->value['URL'])){?>Empty<?php }?>">
<?php if (isset($_smarty_tpl->tpl_vars['item']->value['URL'])){?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['LABEL'];?>
</a>
<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['item']->value['LABEL'];?>

<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['item']->value['NB_IMAGES'])){?>(<?php echo $_smarty_tpl->tpl_vars['item']->value['NB_IMAGES'];?>
)<?php }?>
	</span>
<?php } ?>
</div>
<?php } ?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view'])){?>
<table class="calMonth">
 <thead>
 <tr>
<?php  $_smarty_tpl->tpl_vars['wday'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wday']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view']['wday_labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wday']->key => $_smarty_tpl->tpl_vars['wday']->value){
$_smarty_tpl->tpl_vars['wday']->_loop = true;
?>
	<th><?php echo $_smarty_tpl->tpl_vars['wday']->value;?>
</th>
<?php } ?>
 </tr>
 </thead>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('html_style', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.calMonth TD, .calMonth .calImg{
	width:<?php echo $_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view']['CELL_WIDTH'];?>
px;height:<?php echo $_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view']['CELL_HEIGHT'];?>
px
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php  $_smarty_tpl->tpl_vars['week'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['week']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chronology_calendar']->value['month_view']['weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['week']->key => $_smarty_tpl->tpl_vars['week']->value){
$_smarty_tpl->tpl_vars['week']->_loop = true;
?>
 <tr>
<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['week']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value){
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
<?php if (!empty($_smarty_tpl->tpl_vars['day']->value)){?>
<?php if (isset($_smarty_tpl->tpl_vars['day']->value['IMAGE'])){?>
 			<td class="calDayCellFull">
	 			<div class="calBackDate"><?php echo $_smarty_tpl->tpl_vars['day']->value['DAY'];?>
</div><div class="calForeDate"><?php echo $_smarty_tpl->tpl_vars['day']->value['DAY'];?>
</div>
	 			<div class="calImg">
					<a href="<?php echo $_smarty_tpl->tpl_vars['day']->value['U_IMG_LINK'];?>
">
 						<img src="<?php echo $_smarty_tpl->tpl_vars['day']->value['IMAGE'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['day']->value['IMAGE_ALT'];?>
" title="<?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['day']->value['NB_ELEMENTS']);?>
">
					</a>
				</div>
<?php }else{ ?>
 			<td class="calDayCellEmpty"><?php echo $_smarty_tpl->tpl_vars['day']->value['DAY'];?>

<?php }?>
 	<?php }else{ ?>
 		<td>
<?php }?>
 	</td>
 	<?php } ?>
 </tr>
 <?php } ?>
</table>
<?php }?>

<?php }} ?>