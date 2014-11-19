<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:15
         compiled from "./themes/becktu/template/menubar_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8516796245466c8c7cd44f2-55029999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb4a108ecc906e740578c492fec54d1c621d88a0' => 
    array (
      0 => './themes/becktu/template/menubar_menu.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8516796245466c8c7cd44f2-55029999',
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
  'unifunc' => 'content_5466c8c7cf48c0_52731978',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c7cf48c0_52731978')) {function content_5466c8c7cf48c0_52731978($_smarty_tpl) {?><div class="dropdown show-on-hover" style="text-align: right;">
   <button type="button" class="btn btn-default dropdown-toggle" id="dropdownMenu1" 
      data-toggle="dropdown">
     <?php echo l10n('Menu');?>

      <span class="caret"></span>
    </button>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
<?php if (isset($_smarty_tpl->tpl_vars['block']->value->data['qsearch'])&&$_smarty_tpl->tpl_vars['block']->value->data['qsearch']==true){?>

	<script type="text/javascript">var qsearch_prompt="<?php echo strtr(l10n('Quick search'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
"; document.getElementById('qsearchInput').value=qsearch_prompt;</script>
<?php }?>
	 <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value->data; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?> <?php if (is_array($_smarty_tpl->tpl_vars['link']->value)){?> <li role="presentation"><a role="menuitem" href="<?php echo $_smarty_tpl->tpl_vars['link']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['link']->value['TITLE'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['link']->value['REL'])){?> <?php echo $_smarty_tpl->tpl_vars['link']->value['REL'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['link']->value['NAME'];?>
<?php if (isset($_smarty_tpl->tpl_vars['link']->value['COUNTER'])){?> (<?php echo $_smarty_tpl->tpl_vars['link']->value['COUNTER'];?>
)<?php }?></a></li> <?php }?> <?php } ?> 
</ul>
</div>
<?php }} ?>