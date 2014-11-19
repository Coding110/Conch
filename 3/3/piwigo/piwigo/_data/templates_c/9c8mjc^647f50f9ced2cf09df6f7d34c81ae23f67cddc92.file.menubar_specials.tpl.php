<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:15
         compiled from "./themes/becktu/template/menubar_specials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17947355025466c8c7cc1738-35269446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '647f50f9ced2cf09df6f7d34c81ae23f67cddc92' => 
    array (
      0 => './themes/becktu/template/menubar_specials.tpl',
      1 => 1414466061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17947355025466c8c7cc1738-35269446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'block' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c7cd1df3_47600070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c7cd1df3_47600070')) {function content_5466c8c7cd1df3_47600070($_smarty_tpl) {?><div class="dropdown show-on-hover">
   <button type="button" class="btn btn-default dropdown-toggle" id="dropdownMenu1" 
      data-toggle="dropdown">
     <?php echo l10n('Specials');?>

      <span class="caret"></span>
    </button>
   <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">      
       <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value->data; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?> <li role="presentation"><a role="menuitem" href="<?php echo $_smarty_tpl->tpl_vars['link']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['TITLE'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['link']->value['REL'])){?> <?php echo $_smarty_tpl->tpl_vars['link']->value['REL'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['link']->value['NAME'];?>
</a></li> <?php } ?> 
   </ul>	
</div><?php }} ?>