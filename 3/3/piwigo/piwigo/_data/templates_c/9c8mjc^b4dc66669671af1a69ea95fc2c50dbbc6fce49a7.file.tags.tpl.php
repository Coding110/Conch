<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:38:44
         compiled from "./themes/becktu/template/tags.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14475460715466cac494eb18-35880071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4dc66669671af1a69ea95fc2c50dbbc6fce49a7' => 
    array (
      0 => './themes/becktu/template/tags.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14475460715466cac494eb18-35880071',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'display_mode' => 0,
    'U_CLOUD' => 0,
    'U_LETTERS' => 0,
    'U_HOME' => 0,
    'LEVEL_SEPARATOR' => 0,
    'tags' => 0,
    'tag' => 0,
    'letters' => 0,
    'letter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cac49b8a73_85695104',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cac49b8a73_85695104')) {function content_5466cac49b8a73_85695104($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">

<div class="titrePage">
	<ul class="categoryActions">
<?php if ($_smarty_tpl->tpl_vars['display_mode']->value=='letters'){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CLOUD']->value;?>
" title="<?php echo l10n('show tag cloud');?>
" class="pwg-state-default pwg-button">
			<span class="pwg-icon pwg-icon-cloud"></span><span class="pwg-button-text"><?php echo l10n('cloud');?>
</span>
		</a></li>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['display_mode']->value=='cloud'){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_LETTERS']->value;?>
" title="<?php echo l10n('group by letters');?>
" class="pwg-state-default pwg-button" rel="nofollow">
			<span class="pwg-icon pwg-icon-letters"></span><span class="pwg-button-text"><?php echo l10n('letters');?>
</span>
		</a></li>
<?php }?>
	</ul>
	<h2><a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><?php echo l10n('Home');?>
</a><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
<?php echo l10n('Tags');?>
</h2>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php if ($_smarty_tpl->tpl_vars['display_mode']->value=='cloud'&&isset($_smarty_tpl->tpl_vars['tags']->value)){?>
<div id="fullTagCloud">
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
	<span><a href="<?php echo $_smarty_tpl->tpl_vars['tag']->value['URL'];?>
" class="tagLevel<?php echo $_smarty_tpl->tpl_vars['tag']->value['level'];?>
" title="<?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['tag']->value['counter']);?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a></span>
<?php } ?>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['display_mode']->value=='letters'&&isset($_smarty_tpl->tpl_vars['letters']->value)){?>
<table>
	<tr>
		<td valign="top">
<?php  $_smarty_tpl->tpl_vars['letter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['letter']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['letters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['letter']->key => $_smarty_tpl->tpl_vars['letter']->value){
$_smarty_tpl->tpl_vars['letter']->_loop = true;
?>
<fieldset class="tagLetter">
	<legend class="tagLetterLegend"><?php echo $_smarty_tpl->tpl_vars['letter']->value['TITLE'];?>
</legend>
	<table class="tagLetterContent">
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['letter']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
		<tr class="tagLine">
			<td><a href="<?php echo $_smarty_tpl->tpl_vars['tag']->value['URL'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a></td>
			<td class="nbEntries"><?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['tag']->value['counter']);?>
</td>
		</tr>
<?php } ?>
	</table>
</fieldset>
<?php if (isset($_smarty_tpl->tpl_vars['letter']->value['CHANGE_COLUMN'])){?>
		</td>
		<td valign="top">
<?php }?>
<?php } ?>
		</td>
	</tr>
</table>
<?php }?>

</div> <!-- content -->
<?php }} ?>