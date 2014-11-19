<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:31:12
         compiled from "./admin/themes/default/template/cat_options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7754816005466f330db7c28-56280842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdcddc30ed1de50b7914fa5a0271c4cb126b1a7d' => 
    array (
      0 => './admin/themes/default/template/cat_options.tpl',
      1 => 1274831749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7754816005466f330db7c28-56280842',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TABSHEET_TITLE' => 0,
    'F_ACTION' => 0,
    'L_SECTION' => 0,
    'DOUBLE_SELECT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f330dc0d99_73555226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f330dc0d99_73555226')) {function content_5466f330dc0d99_73555226($_smarty_tpl) {?><div class="titrePage">
  <h2><?php echo l10n('Properties');?>
 <?php echo $_smarty_tpl->tpl_vars['TABSHEET_TITLE']->value;?>
</h2>
</div>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" id="cat_options">
  <fieldset>
    <legend><?php echo $_smarty_tpl->tpl_vars['L_SECTION']->value;?>
</legend>
    <?php echo $_smarty_tpl->tpl_vars['DOUBLE_SELECT']->value;?>

  </fieldset>
</form>

<?php }} ?>