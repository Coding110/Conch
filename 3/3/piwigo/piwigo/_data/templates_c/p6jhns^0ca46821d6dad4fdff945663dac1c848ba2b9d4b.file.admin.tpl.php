<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:08
         compiled from "./admin/themes/default/template/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14992782015466c8c07d8561-17119395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ca46821d6dad4fdff945663dac1c848ba2b9d4b' => 
    array (
      0 => './admin/themes/default/template/admin.tpl',
      1 => 1385720654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14992782015466c8c07d8561-17119395',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ACTIVE_MENU' => 0,
    'U_ADMIN' => 0,
    'U_ADD_PHOTOS' => 0,
    'U_RATING' => 0,
    'U_TAGS' => 0,
    'U_RECENT_SET' => 0,
    'U_BATCH' => 0,
    'NB_PHOTOS_IN_CADDIE' => 0,
    'U_CADDIE' => 0,
    'U_CATEGORIES' => 0,
    'U_CAT_OPTIONS' => 0,
    'U_USERS' => 0,
    'U_GROUPS' => 0,
    'U_NOTIFICATION_BY_MAIL' => 0,
    'U_PLUGINS' => 0,
    'plugin_menu_items' => 0,
    'menu_item' => 0,
    'ENABLE_SYNCHRONIZATION' => 0,
    'U_CAT_UPDATE' => 0,
    'U_SITE_MANAGER' => 0,
    'U_HISTORY_STAT' => 0,
    'U_MAINTENANCE' => 0,
    'U_COMMENTS' => 0,
    'NB_PENDING_COMMENTS' => 0,
    'U_UPDATES' => 0,
    'U_CONFIG_GENERAL' => 0,
    'U_CONFIG_MENUBAR' => 0,
    'U_CONFIG_EXTENTS' => 0,
    'U_CONFIG_LANGUAGES' => 0,
    'U_CONFIG_THEMES' => 0,
    'TABSHEET' => 0,
    'U_HELP' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
    'errors' => 0,
    'error' => 0,
    'infos' => 0,
    'info' => 0,
    'warnings' => 0,
    'warning' => 0,
    'ADMIN_CONTENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c085fc46_25393380',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c085fc46_25393380')) {function content_5466c8c085fc46_25393380($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ui.accordion','load'=>'header'),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.ui.accordion')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.accordion'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
	jQuery('#menubar').accordion({
		header: "dt.rdion",
		event: "click",
		heightStyle: "content",
		active: <?php echo $_smarty_tpl->tpl_vars['ACTIVE_MENU']->value;?>

	});
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.accordion'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div id="menubar">
  <div id="adminHome"><a href="<?php echo $_smarty_tpl->tpl_vars['U_ADMIN']->value;?>
"><?php echo l10n('Administration Home');?>
</a></div>
	<dl class="first">
		<dt class="rdion"><span class="icon-picture"> </span><span><?php echo l10n('Photos');?>
&nbsp;</span></dt>
		<dd>
			<ul>
				<li><a class="icon-plus-circled" href="<?php echo $_smarty_tpl->tpl_vars['U_ADD_PHOTOS']->value;?>
"><?php echo l10n('Add');?>
</a></li>
				<li><a class="icon-star" href="<?php echo $_smarty_tpl->tpl_vars['U_RATING']->value;?>
"><?php echo l10n('Rating');?>
</a></li>
				<li><a class="icon-tags" href="<?php echo $_smarty_tpl->tpl_vars['U_TAGS']->value;?>
"><?php echo l10n('Tags');?>
</a></li>
				<li><a class="icon-clock" href="<?php echo $_smarty_tpl->tpl_vars['U_RECENT_SET']->value;?>
"><?php echo l10n('Recent photos');?>
</a></li>
				<li><a class="icon-pencil" href="<?php echo $_smarty_tpl->tpl_vars['U_BATCH']->value;?>
"><?php echo l10n('Batch Manager');?>
</a></li>
<?php if ($_smarty_tpl->tpl_vars['NB_PHOTOS_IN_CADDIE']->value>0){?>
				<li><a class="icon-flag" href="<?php echo $_smarty_tpl->tpl_vars['U_CADDIE']->value;?>
"><?php echo l10n('Caddie');?>
<span class="adminMenubarCounter"><?php echo $_smarty_tpl->tpl_vars['NB_PHOTOS_IN_CADDIE']->value;?>
</span></a></li>
<?php }?>
			</ul>
		</dd>
	</dl>
	<dl>
		<dt class="rdion"><span class="icon-sitemap"> </span><span><?php echo l10n('Albums');?>
&nbsp;</span></dt>
    <dd>
      <ul>
        <li><a class="icon-folder-open" href="<?php echo $_smarty_tpl->tpl_vars['U_CATEGORIES']->value;?>
"><?php echo l10n('Manage');?>
</a></li>
        <li><a class="icon-pencil" href="<?php echo $_smarty_tpl->tpl_vars['U_CAT_OPTIONS']->value;?>
"><?php echo l10n('Properties');?>
</a></li>
      </ul>
    </dd>
	</dl>
	<dl>
		<dt class="rdion"><span class="icon-users"> </span><span><?php echo l10n('Users');?>
&nbsp;</span></dt>
		<dd>
      <ul>
        <li><a class="icon-user-add" href="<?php echo $_smarty_tpl->tpl_vars['U_USERS']->value;?>
"><?php echo l10n('Manage');?>
</a></li>
        <li><a class="icon-group" href="<?php echo $_smarty_tpl->tpl_vars['U_GROUPS']->value;?>
"><?php echo l10n('Groups');?>
</a></li>
				<li><a class="icon-mail-1" href="<?php echo $_smarty_tpl->tpl_vars['U_NOTIFICATION_BY_MAIL']->value;?>
"><?php echo l10n('Notification');?>
</a></li>
      </ul>
		</dd>
	</dl>
	<dl>
		<dt class="rdion"><span class="icon-puzzle"> </span><span><?php echo l10n('Plugins');?>
&nbsp;</span></dt>
		<dd>
      <ul>
        <li><a class="icon-equalizer" href="<?php echo $_smarty_tpl->tpl_vars['U_PLUGINS']->value;?>
"><?php echo l10n('Manage');?>
</a></li>
      </ul>
      <div id="pluginsMenuSeparator"></div>
<?php if (!empty($_smarty_tpl->tpl_vars['plugin_menu_items']->value)){?>
      <ul class="scroll">
<?php  $_smarty_tpl->tpl_vars['menu_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plugin_menu_items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu_item']->key => $_smarty_tpl->tpl_vars['menu_item']->value){
$_smarty_tpl->tpl_vars['menu_item']->_loop = true;
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu_item']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu_item']->value['NAME'];?>
</a></li>
<?php } ?>
      </ul>
<?php }?>
		</dd>
	</dl>
	<dl>
		<dt class="rdion"><span class="icon-wrench"> </span><span><?php echo l10n('Tools');?>
&nbsp;</span></dt>
		<dd>
      <ul>
<?php if ($_smarty_tpl->tpl_vars['ENABLE_SYNCHRONIZATION']->value){?>
        <li><a class="icon-exchange" href="<?php echo $_smarty_tpl->tpl_vars['U_CAT_UPDATE']->value;?>
"><?php echo l10n('Synchronize');?>
</a></li>
        <li><a class="icon-flow-branch" href="<?php echo $_smarty_tpl->tpl_vars['U_SITE_MANAGER']->value;?>
"><?php echo l10n('Site manager');?>
</a></li>
<?php }?>
				<li><a class="icon-signal" href="<?php echo $_smarty_tpl->tpl_vars['U_HISTORY_STAT']->value;?>
"><?php echo l10n('History');?>
</a></li>
				<li><a class="icon-tools" href="<?php echo $_smarty_tpl->tpl_vars['U_MAINTENANCE']->value;?>
"><?php echo l10n('Maintenance');?>
</a></li>
<?php if (isset($_smarty_tpl->tpl_vars['U_COMMENTS']->value)){?>
				<li><a class="icon-chat" href="<?php echo $_smarty_tpl->tpl_vars['U_COMMENTS']->value;?>
"><?php echo l10n('Comments');?>
<?php if ($_smarty_tpl->tpl_vars['NB_PENDING_COMMENTS']->value>0){?><span class="adminMenubarCounter" title="<?php echo l10n('%d waiting for validation',$_smarty_tpl->tpl_vars['NB_PENDING_COMMENTS']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['NB_PENDING_COMMENTS']->value;?>
</span><?php }?></a></li>
<?php }?>
        <li><a class="icon-arrows-cw" href="<?php echo $_smarty_tpl->tpl_vars['U_UPDATES']->value;?>
"><?php echo l10n('Updates');?>
</a></li>
      </ul>
		</dd>
	</dl>
	<dl class="last">
		<dt class="rdion"><span class="icon-cog"> </span><span><?php echo l10n('Configuration');?>
&nbsp;</span></dt>
		<dd>
      <ul>
        <li><a class="icon-cog-alt" href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_GENERAL']->value;?>
"><?php echo l10n('Options');?>
</a></li>
        <li><a class="icon-menu" href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_MENUBAR']->value;?>
"><?php echo l10n('Menu Management');?>
</a></li>
        <li><a class="icon-code" href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_EXTENTS']->value;?>
"><?php echo l10n('Templates');?>
</a></li>
				<li><a class="icon-language" href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_LANGUAGES']->value;?>
"><?php echo l10n('Languages');?>
</a></li>
        <li><a class="icon-brush" href="<?php echo $_smarty_tpl->tpl_vars['U_CONFIG_THEMES']->value;?>
"><?php echo l10n('Themes');?>
</a></li>
      </ul>
    </dd>
  </dl>
</div> <!-- menubar -->

<div id="content" class="content">

<?php if (isset($_smarty_tpl->tpl_vars['TABSHEET']->value)){?>
  <?php echo $_smarty_tpl->tpl_vars['TABSHEET']->value;?>

<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_HELP']->value)){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>

  <ul class="HelpActions">
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_HELP']->value;?>
" onclick="popuphelp(this.href); return false;" title="<?php echo l10n('Help');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['admin_icon_dir'];?>
/help.png" alt="(?)"></a></li>
  </ul>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['errors']->value)){?>
  <div class="errors">
    <ul>
<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
      <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
<?php } ?>
    </ul>
  </div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['infos']->value)){?>
  <div class="infos">
    <ul>
<?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value){
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
      <li><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</li>
<?php } ?>
    </ul>
  </div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['warnings']->value)){?>
  <div class="warnings">
    <ul>
<?php  $_smarty_tpl->tpl_vars['warning'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['warning']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['warnings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->key => $_smarty_tpl->tpl_vars['warning']->value){
$_smarty_tpl->tpl_vars['warning']->_loop = true;
?>
      <li><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
</li>
<?php } ?>
    </ul>
  </div>
<?php }?>
  <?php echo $_smarty_tpl->tpl_vars['ADMIN_CONTENT']->value;?>

</div>
<?php }} ?>