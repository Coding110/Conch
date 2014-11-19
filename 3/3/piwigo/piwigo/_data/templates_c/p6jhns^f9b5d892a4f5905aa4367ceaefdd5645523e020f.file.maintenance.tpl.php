<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 20:32:02
         compiled from "./admin/themes/default/template/maintenance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1847575891546899426c3fd2-83985025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9b5d892a4f5905aa4367ceaefdd5645523e020f' => 
    array (
      0 => './admin/themes/default/template/maintenance.tpl',
      1 => 1359977283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1847575891546899426c3fd2-83985025',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'U_MAINT_LOCK_GALLERY' => 0,
    'U_MAINT_UNLOCK_GALLERY' => 0,
    'advanced_features' => 0,
    'feature' => 0,
    'U_MAINT_CATEGORIES' => 0,
    'U_MAINT_IMAGES' => 0,
    'U_MAINT_DATABASE' => 0,
    'U_MAINT_C13Y' => 0,
    'U_MAINT_USER_CACHE' => 0,
    'U_MAINT_ORPHAN_TAGS' => 0,
    'U_MAINT_HISTORY_DETAIL' => 0,
    'U_MAINT_HISTORY_SUMMARY' => 0,
    'U_MAINT_SESSIONS' => 0,
    'U_MAINT_FEEDS' => 0,
    'U_MAINT_SEARCH' => 0,
    'U_MAINT_COMPILED_TEMPLATES' => 0,
    'purge_derivatives' => 0,
    'url' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5468994277d954_89165942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5468994277d954_89165942')) {function content_5468994277d954_89165942($_smarty_tpl) {?><div class="titrePage">
  <h2><?php echo l10n('Maintenance');?>
</h2>
</div>

<ul>
<?php if ((isset($_smarty_tpl->tpl_vars['U_MAINT_LOCK_GALLERY']->value))){?>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_LOCK_GALLERY']->value;?>
" onclick="return confirm('<?php echo strtr(l10n('A locked gallery is only visible to administrators'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');"><?php echo l10n('Lock gallery');?>
</a></li>
<?php }else{ ?>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_UNLOCK_GALLERY']->value;?>
"><?php echo l10n('Unlock gallery');?>
</a></li>
<?php }?>
</ul>

<ul>
<?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['advanced_features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value){
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['feature']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['feature']->value['CAPTION'];?>
</a></li>
<?php } ?>
</ul>

<ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_CATEGORIES']->value;?>
"><?php echo l10n('Update albums informations');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_IMAGES']->value;?>
"><?php echo l10n('Update photos information');?>
</a></li>
</ul>

<ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_DATABASE']->value;?>
"><?php echo l10n('Repair and optimize database');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_C13Y']->value;?>
"><?php echo l10n('Reinitialize check integrity');?>
</a></li>
</ul>

<ul>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_USER_CACHE']->value;?>
"><?php echo l10n('Purge user cache');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_ORPHAN_TAGS']->value;?>
"><?php echo l10n('Delete orphan tags');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_HISTORY_DETAIL']->value;?>
" onclick="return confirm('<?php echo strtr(l10n('Purge history detail'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');"><?php echo l10n('Purge history detail');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_HISTORY_SUMMARY']->value;?>
" onclick="return confirm('<?php echo strtr(l10n('Purge history summary'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');"><?php echo l10n('Purge history summary');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_SESSIONS']->value;?>
"><?php echo l10n('Purge sessions');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_FEEDS']->value;?>
"><?php echo l10n('Purge never used notification feeds');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_SEARCH']->value;?>
"onclick="return confirm('<?php echo strtr(l10n('Purge search history'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');"><?php echo l10n('Purge search history');?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MAINT_COMPILED_TEMPLATES']->value;?>
"><?php echo l10n('Purge compiled templates');?>
</a></li>
	<li><?php echo l10n('Delete multiple size images');?>
: 
	<?php  $_smarty_tpl->tpl_vars['url'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['url']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['purge_derivatives']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['url']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['url']->key => $_smarty_tpl->tpl_vars['url']->value){
$_smarty_tpl->tpl_vars['url']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['url']->key;
 $_smarty_tpl->tpl_vars['url']->index++;
 $_smarty_tpl->tpl_vars['url']->first = $_smarty_tpl->tpl_vars['url']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['first'] = $_smarty_tpl->tpl_vars['url']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['first']){?>, <?php }?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['first']){?> onclick="return confirm('<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');"<?php }?>><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a><?php } ?>
	</li>
</ul>
<?php }} ?>