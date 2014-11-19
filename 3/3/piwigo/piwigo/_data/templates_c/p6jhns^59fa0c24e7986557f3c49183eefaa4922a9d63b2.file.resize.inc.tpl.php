<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:24:53
         compiled from "./admin/themes/default/template/include/resize.inc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2320596054670dd5af7780-31104595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59fa0c24e7986557f3c49183eefaa4922a9d63b2' => 
    array (
      0 => './admin/themes/default/template/include/resize.inc.tpl',
      1 => 1299680568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2320596054670dd5af7780-31104595',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670dd5afcb91_76038609',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670dd5afcb91_76038609')) {function content_54670dd5afcb91_76038609($_smarty_tpl) {?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.ui.resizable')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.resizable'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

  jQuery().ready(function(){
    // Resize possible for list
    jQuery(".categoryList").resizable({
      handles: "all",
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