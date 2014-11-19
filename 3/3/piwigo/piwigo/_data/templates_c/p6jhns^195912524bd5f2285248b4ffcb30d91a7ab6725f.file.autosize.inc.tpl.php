<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 15:18:03
         compiled from "./admin/themes/default/template/include/autosize.inc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116946225054684fab44c104-35264938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '195912524bd5f2285248b4ffcb30d91a7ab6725f' => 
    array (
      0 => './admin/themes/default/template/include/autosize.inc.tpl',
      1 => 1299680568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116946225054684fab44c104-35264938',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54684fab452766_65570917',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54684fab452766_65570917')) {function content_54684fab452766_65570917($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.autogrow','load'=>'async','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.autogrow-textarea.js'),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.autogrow')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.autogrow'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
	jQuery('textarea').css('overflow-y', 'hidden');
	// Auto size and auto grow for all text area
	jQuery('textarea').autogrow();
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.autogrow'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>