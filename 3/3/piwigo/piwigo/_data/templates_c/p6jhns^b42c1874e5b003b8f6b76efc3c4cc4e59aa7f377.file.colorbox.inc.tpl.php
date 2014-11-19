<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:39:46
         compiled from "./admin/themes/default/template/include/colorbox.inc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3134744345466cb024a8b16-87359495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b42c1874e5b003b8f6b76efc3c4cc4e59aa7f377' => 
    array (
      0 => './admin/themes/default/template/include/colorbox.inc.tpl',
      1 => 1313610967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3134744345466cb024a8b16-87359495',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cb024af322_96731834',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cb024af322_96731834')) {function content_5466cb024af322_96731834($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.colorbox','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.colorbox.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/plugins/colorbox/style2/colorbox.css"),$_smarty_tpl);?>

<?php }} ?>