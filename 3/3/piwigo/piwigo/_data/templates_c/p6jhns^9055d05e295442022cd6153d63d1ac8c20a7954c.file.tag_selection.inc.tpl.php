<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:30:19
         compiled from "./admin/themes/default/template/include/tag_selection.inc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7259155985466f2fb8a9986-99451658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9055d05e295442022cd6153d63d1ac8c20a7954c' => 
    array (
      0 => './admin/themes/default/template/include/tag_selection.inc.tpl',
      1 => 1299680568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7259155985466f2fb8a9986-99451658',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f2fb8ad844_01875878',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f2fb8ad844_01875878')) {function content_5466f2fb8ad844_01875878($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
  jQuery(".tagSelection label").click(function () {
    var parent = jQuery(this).parent('li');
    var checkbox = jQuery(this).children("input[type=checkbox]");

    if (jQuery(checkbox).is(':checked')) {
      jQuery(parent).addClass("tagSelected"); 
    }
    else {
      jQuery(parent).removeClass('tagSelected'); 
    }
  });
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>