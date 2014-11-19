<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:44:24
         compiled from "./themes/becktu/template/redirect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6499935555466cc18e39724-33412372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8182739a858f83f77e6e97d2aee62e697aa004a3' => 
    array (
      0 => './themes/becktu/template/redirect.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6499935555466cc18e39724-33412372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'REDIRECT_MSG' => 0,
    'page_refresh' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cc18e5d360_76543436',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cc18e5d360_76543436')) {function content_5466cc18e5d360_76543436($_smarty_tpl) {?><div style="margin:2em;text-align:center;font-size:larger">
	<?php echo $_smarty_tpl->tpl_vars['REDIRECT_MSG']->value;?>

</div>

<p style="margin:2em;text-align:center">
	<a href="<?php echo $_smarty_tpl->tpl_vars['page_refresh']->value['U_REFRESH'];?>
">
		<?php echo l10n('Click here if your browser does not automatically forward you');?>

	</a>
</p>
<?php }} ?>