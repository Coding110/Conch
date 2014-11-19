<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:25:37
         compiled from "./admin/themes/default/template/rating.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39186632654670e0101e257-57800311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '209329c30ae622dd51e04f2722d2f879490774b4' => 
    array (
      0 => './admin/themes/default/template/rating.tpl',
      1 => 1389997256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39186632654670e0101e257-57800311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'NB_ELEMENTS' => 0,
    'F_ACTION' => 0,
    'order_by_options' => 0,
    'order_by_options_selected' => 0,
    'user_options' => 0,
    'user_options_selected' => 0,
    'DISPLAY' => 0,
    'navbar' => 0,
    'images' => 0,
    'image' => 0,
    'rate' => 0,
    'ROOT_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670e010dea60_33012559',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670e010dea60_33012559')) {function content_54670e010dea60_33012559($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><h2><?php echo $_smarty_tpl->tpl_vars['NB_ELEMENTS']->value;?>
 <?php echo l10n('Photos');?>
</h2>

<form action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="GET" class="filter">
  <fieldset>
    <legend><?php echo l10n('Filter');?>
</legend>

    <label>
      <?php echo l10n('Sort by');?>

      <select name="order_by">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['order_by_options']->value,'selected'=>$_smarty_tpl->tpl_vars['order_by_options_selected']->value),$_smarty_tpl);?>

      </select>
    </label>

    <label>
      <?php echo l10n('Users');?>

      <select name="users">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['user_options']->value,'selected'=>$_smarty_tpl->tpl_vars['user_options_selected']->value),$_smarty_tpl);?>

      </select>
    </label>

    <label>
      <?php echo l10n('Number of items');?>

      <input type="text" name="display" size="2" value="<?php echo $_smarty_tpl->tpl_vars['DISPLAY']->value;?>
">
    </label>

    <label>
      &nbsp;
    <input class="submit" type="submit" value="<?php echo l10n('Submit');?>
">
    </label>
    <input type="hidden" name="page" value="rating">
  </fieldset>
</form>

<?php if (!empty($_smarty_tpl->tpl_vars['navbar']->value)){?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>

<table width="99%">
<tr class="throw">
  <td><?php echo l10n('File');?>
</td>
  <td><?php echo l10n('Number of rates');?>
</td>
	<td><?php echo l10n('Rating score');?>
</td>
  <td><?php echo l10n('Average rate');?>
</td>
  <td><?php echo l10n('Sum of rates');?>
</td>
  <td><?php echo l10n('Rate');?>
/<?php echo l10n('Username');?>
/<?php echo l10n('Rate date');?>
</td>
  <td></td>
</tr>
<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['image']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['image']['index']++;
?>
<tr valign="top" class="<?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['foreach']['image']['index'])){?>row1<?php }else{ ?>row2<?php }?>">
	<td><a href="<?php echo $_smarty_tpl->tpl_vars['image']->value['U_URL'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value['U_THUMB'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['image']->value['FILE'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['image']->value['FILE'];?>
"></a></td>
	<td><strong><?php echo $_smarty_tpl->tpl_vars['image']->value['NB_RATES'];?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['NB_RATES_TOTAL'];?>
</strong></td>
	<td><strong><?php echo $_smarty_tpl->tpl_vars['image']->value['SCORE_RATE'];?>
</strong></td>
	<td><strong><?php echo $_smarty_tpl->tpl_vars['image']->value['AVG_RATE'];?>
</strong></td>
	<td style="border-right:1px solid" ><strong><?php echo $_smarty_tpl->tpl_vars['image']->value['SUM_RATE'];?>
</strong></td>
	<td>
		<table style="width:100%">
<?php  $_smarty_tpl->tpl_vars['rate'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rate']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['image']->value['rates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rate']->key => $_smarty_tpl->tpl_vars['rate']->value){
$_smarty_tpl->tpl_vars['rate']->_loop = true;
?>
<tr>
	<td><?php echo $_smarty_tpl->tpl_vars['rate']->value['rate'];?>
</td>
	<td><b><?php echo $_smarty_tpl->tpl_vars['rate']->value['USER'];?>
</b></td>
	<td><?php echo $_smarty_tpl->tpl_vars['rate']->value['date'];?>
</td>
	<td><a onclick="return del(this,<?php echo $_smarty_tpl->tpl_vars['image']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['rate']->value['user_id'];?>
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['rate']->value['anonymous_id'];?>
<?php $_tmp1=ob_get_clean();?><?php if (!empty($_tmp1)){?>,'<?php echo $_smarty_tpl->tpl_vars['rate']->value['anonymous_id'];?>
'<?php }?>)" class="icon-trash"> </a></td>
</tr>
<?php } ?>
		</table>
	</td>
</tr>
<?php } ?>
</table>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

function del(node,id,uid,aid){
	var tr = jQuery(node).parents("tr").first().fadeTo(1000, 0.4),
		data = {
			image_id: id,
			user_id: uid
		};
	if (aid)
		data.anonymous_id = aid;

	(new PwgWS('<?php echo strtr($_smarty_tpl->tpl_vars['ROOT_URL']->value, array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
')).callService(
		'pwg.rates.delete', data,
		{
			method: 'POST',
			onFailure: function(num, text) { tr.stop(); tr.fadeTo(0,1); alert(num + " " + text); },
			onSuccess: function(result){
				if (result)
					tr.remove();
				else 
					alert(result); 
			}
		}
	);
	return false;
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php if (!empty($_smarty_tpl->tpl_vars['navbar']->value)){?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<?php }} ?>