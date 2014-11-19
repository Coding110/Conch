<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:25
         compiled from "./themes/becktu/template/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12004726475466c8d1ebed52-03670909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cb6dac8e3168b270a591f073016cfcd184f441b' => 
    array (
      0 => './themes/becktu/template/profile.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12004726475466c8d1ebed52-03670909',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'U_HOME' => 0,
    'LEVEL_SEPARATOR' => 0,
    'PROFILE_CONTENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8d1ecef67_28567760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8d1ecef67_28567760')) {function content_5466c8d1ecef67_28567760($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">

<div class="titrePage">
	<ul class="categoryActions">
	</ul>
	<!--<h2><a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><?php echo l10n('Home');?>
</a><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
<?php echo l10n('Profile');?>
</h2>-->
</div>

<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->tpl_vars['PROFILE_CONTENT']->value;?>

</div> <!-- content -->
<?php }} ?>