<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 17:17:10
         compiled from "./themes/becktu/template/menubar_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11096261125466c8c7c8bc49-81873831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c259cdfdd8973c78bc5ef30e9834e6fe30818241' => 
    array (
      0 => './themes/becktu/template/menubar_categories.tpl',
      1 => 1416043029,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11096261125466c8c7c8bc49-81873831',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c7cbefa3_47167622',
  'variables' => 
  array (
    'block' => 0,
    'cat' => 0,
    'ref_level' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c7cbefa3_47167622')) {function content_5466c8c7cbefa3_47167622($_smarty_tpl) {?><div class="dropdown show-on-hover">
	 <button type="button" class="btn btn-default dropdown-toggle" id="dropdownMenu1" 
      data-toggle="dropdown">
     <?php echo l10n('Albums');?>

      <span class="caret"></span>
    </button>

<?php if (isset($_smarty_tpl->tpl_vars['ref_level'])) {$_smarty_tpl->tpl_vars['ref_level'] = clone $_smarty_tpl->tpl_vars['ref_level'];
$_smarty_tpl->tpl_vars['ref_level']->value = 0; $_smarty_tpl->tpl_vars['ref_level']->nocache = null; $_smarty_tpl->tpl_vars['ref_level']->scope = 0;
} else $_smarty_tpl->tpl_vars['ref_level'] = new Smarty_variable(0, null, 0);?>
<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value->data['MENU_CATEGORIES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['cat']->value['LEVEL']>$_smarty_tpl->tpl_vars['ref_level']->value){?>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
<?php }else{ ?>
    </li>
    <?php echo str_repeat('</ul></li>',($_smarty_tpl->tpl_vars['ref_level']->value-$_smarty_tpl->tpl_vars['cat']->value['LEVEL']));?>

<?php }?>
    <li <?php if ($_smarty_tpl->tpl_vars['cat']->value['SELECTED']){?>class="selected"<?php }?>>
      <a href="<?php echo $_smarty_tpl->tpl_vars['cat']->value['URL'];?>
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['IS_UPPERCAT']){?>rel="up"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['cat']->value['TITLE'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['NAME'];?>
</a>
<?php if ($_smarty_tpl->tpl_vars['cat']->value['count_images']>0){?>
      <span class="<?php if ($_smarty_tpl->tpl_vars['cat']->value['nb_images']>0){?>menuInfoCat<?php }else{ ?>menuInfoCatByChild<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['cat']->value['TITLE'];?>
">[<?php echo $_smarty_tpl->tpl_vars['cat']->value['count_images'];?>
]</span>
<?php }?>
      <!--
<?php if (!empty($_smarty_tpl->tpl_vars['cat']->value['icon_ts'])){?>
      <img title="<?php echo $_smarty_tpl->tpl_vars['cat']->value['icon_ts']['TITLE'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/recent<?php if ($_smarty_tpl->tpl_vars['cat']->value['icon_ts']['IS_CHILD_DATE']){?>_by_child<?php }?>.png" class="icon" alt="(!)">
      <?php }?>-->
  <?php if (isset($_smarty_tpl->tpl_vars['ref_level'])) {$_smarty_tpl->tpl_vars['ref_level'] = clone $_smarty_tpl->tpl_vars['ref_level'];
$_smarty_tpl->tpl_vars['ref_level']->value = $_smarty_tpl->tpl_vars['cat']->value['LEVEL']; $_smarty_tpl->tpl_vars['ref_level']->nocache = null; $_smarty_tpl->tpl_vars['ref_level']->scope = 0;
} else $_smarty_tpl->tpl_vars['ref_level'] = new Smarty_variable($_smarty_tpl->tpl_vars['cat']->value['LEVEL'], null, 0);?>
<?php } ?>
<?php echo str_repeat('</li></ul>',$_smarty_tpl->tpl_vars['ref_level']->value);?>


</div>
<?php }} ?>