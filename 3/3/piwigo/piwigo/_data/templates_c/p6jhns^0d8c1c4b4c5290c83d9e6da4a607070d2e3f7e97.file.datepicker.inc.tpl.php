<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:30:19
         compiled from "./admin/themes/default/template/include/datepicker.inc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13776066185466f2fb8b00e5-57841704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d8c1c4b4c5290c83d9e6da4a607070d2e3f7e97' => 
    array (
      0 => './admin/themes/default/template/include/datepicker.inc.tpl',
      1 => 1299680568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13776066185466f2fb8b00e5-57841704',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_info' => 0,
    'datepicker_language' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f2fb8ca544_01421192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f2fb8ca544_01421192')) {function content_5466f2fb8ca544_01421192($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'datepicker.js','load'=>'footer','require'=>'jquery.ui.datepicker','path'=>'themes/default/js/datepicker.js'),$_smarty_tpl);?>


<?php if (isset($_smarty_tpl->tpl_vars["datepicker_language"])) {$_smarty_tpl->tpl_vars["datepicker_language"] = clone $_smarty_tpl->tpl_vars["datepicker_language"];
$_smarty_tpl->tpl_vars["datepicker_language"]->value = "themes/default/js/ui/i18n/jquery.ui.datepicker-".((string)$_smarty_tpl->tpl_vars['lang_info']->value['code']).".js"; $_smarty_tpl->tpl_vars["datepicker_language"]->nocache = null; $_smarty_tpl->tpl_vars["datepicker_language"]->scope = 0;
} else $_smarty_tpl->tpl_vars["datepicker_language"] = new Smarty_variable("themes/default/js/ui/i18n/jquery.ui.datepicker-".((string)$_smarty_tpl->tpl_vars['lang_info']->value['code']).".js", null, 0);?>

<?php if (file_exists((constant("PHPWG_ROOT_PATH")).($_smarty_tpl->tpl_vars['datepicker_language']->value))){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>"jquery.ui.datepicker-".((string)$_smarty_tpl->tpl_vars['lang_info']->value).".code",'load'=>'footer','path'=>$_smarty_tpl->tpl_vars['datepicker_language']->value),$_smarty_tpl);?>

<?php }?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/ui/theme/jquery.ui.datepicker.css"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.ui.datepicker,datepicker.js')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.datepicker,datepicker.js'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

function pwg_initialization_datepicker(day, month, year, linked_date, checked_on_change, min_linked_date, max_linked_date)
{
  return pwg_common_initialization_datepicker(
    "<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['admin_icon_dir'];?>
/datepicker.png",
    day, month, year, linked_date, checked_on_change, min_linked_date, max_linked_date);
};
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.datepicker,datepicker.js'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>