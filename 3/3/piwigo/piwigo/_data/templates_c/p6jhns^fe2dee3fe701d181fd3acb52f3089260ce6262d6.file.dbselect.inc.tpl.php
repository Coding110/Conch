<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:31:12
         compiled from "./admin/themes/default/template/include/dbselect.inc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18142026255466f330daf5a0-75392484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe2dee3fe701d181fd3acb52f3089260ce6262d6' => 
    array (
      0 => './admin/themes/default/template/include/dbselect.inc.tpl',
      1 => 1299680568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18142026255466f330daf5a0-75392484',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f330db43e3_22138746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f330db43e3_22138746')) {function content_5466f330db43e3_22138746($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.ui.resizable')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.resizable'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
	// Resize possible for double select list
	jQuery(".doubleSelect select.categoryList").resizable({
		handles: "w,e",
		animate: true,
		animateDuration: "slow",
		animateEasing: "swing",
		preventDefault: true,
		preserveCursor: true,
		autoHide: true,
		ghost: true
	});
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.resizable'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>