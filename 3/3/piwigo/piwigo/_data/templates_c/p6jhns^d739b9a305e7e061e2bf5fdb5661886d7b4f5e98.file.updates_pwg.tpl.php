<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 20:32:06
         compiled from "./admin/themes/default/template/updates_pwg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42621777854689946d60186-40528362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd739b9a305e7e061e2bf5fdb5661886d7b4f5e98' => 
    array (
      0 => './admin/themes/default/template/updates_pwg.tpl',
      1 => 1382180651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42621777854689946d60186-40528362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'STEP' => 0,
    'CHECK_VERSION' => 0,
    'DEV_VERSION' => 0,
    'MINOR_VERSION' => 0,
    'MAJOR_VERSION' => 0,
    'RELEASE_URL' => 0,
    'UPGRADE_TO' => 0,
    'missing' => 0,
    'plugin' => 0,
    'theme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54689946e0bfa6_67676702',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54689946e0bfa6_67676702')) {function content_54689946e0bfa6_67676702($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.counter.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function() {
	jQuery('input[name="submit"]').click(function() {
    if(!confirm('<?php echo l10n('Are you sure?');?>
'))
      return false;
    jQuery(this).hide();
    jQuery('.autoupdate_bar').show();
	});
  jQuery('[name="understand"]').click(function() {
    jQuery('[name="submit"]').attr('disabled', !this.checked);
  });
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('html_head', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


<style type="text/css">
form { width: 750px; }
fieldset { padding-bottom: 30px; }
p, form p { text-align: left; margin-left:20px; }
li { margin: 5px; }
</style>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="titrePage">
<h2><?php echo l10n('Updates');?>
</h2>
</div>

<?php if ($_smarty_tpl->tpl_vars['STEP']->value==0){?>
<?php if ($_smarty_tpl->tpl_vars['CHECK_VERSION']->value){?>
    <p><?php echo l10n('You are running the latest version of Piwigo.');?>
</p>
<?php }elseif($_smarty_tpl->tpl_vars['DEV_VERSION']->value){?>
    <p><?php echo l10n('You are running on development sources, no check possible.');?>
</p>
<?php }else{ ?>
    <p><?php echo l10n('Check for update failed for unknown reasons.');?>
</p>
<?php }?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['STEP']->value==1){?>
<h4><?php echo l10n('Two updates are available');?>
:</h4>
<p>
<ul>
  <li><a href="admin.php?page=updates&amp;step=2&amp;to=<?php echo $_smarty_tpl->tpl_vars['MINOR_VERSION']->value;?>
"><strong><?php echo l10n('Update to Piwigo %s',$_smarty_tpl->tpl_vars['MINOR_VERSION']->value);?>
</strong></a>: <?php echo l10n('This is a minor update, with only bug corrections.');?>
</li>
  <li><a href="admin.php?page=updates&amp;step=3&amp;to=<?php echo $_smarty_tpl->tpl_vars['MAJOR_VERSION']->value;?>
"><strong><?php echo l10n('Update to Piwigo %s',$_smarty_tpl->tpl_vars['MAJOR_VERSION']->value);?>
</strong></a>: <?php echo l10n('This is a major update, with <a href="%s">new exciting features</a>.',$_smarty_tpl->tpl_vars['RELEASE_URL']->value);?>
 <?php echo l10n('Some themes and plugins may be not available yet.');?>
</li>
</ul>
</p>
<p><?php echo l10n('You can update to Piwigo %s directly, without upgrading to Piwigo %s (recommended).',$_smarty_tpl->tpl_vars['MAJOR_VERSION']->value,$_smarty_tpl->tpl_vars['MINOR_VERSION']->value);?>
</p>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['STEP']->value==2){?>
<p>
  <?php echo l10n('A new version of Piwigo is available.');?>
<br>
  <?php echo l10n('This is a minor update, with only bug corrections.');?>

</p>
<form action="" method="post">
<p><input type="submit" name="submit" value="<?php echo l10n('Update to Piwigo %s',$_smarty_tpl->tpl_vars['UPGRADE_TO']->value);?>
"></p>
<p class="autoupdate_bar" style="display:none;">&nbsp; <?php echo l10n('Update in progress...');?>
<br><img src="admin/themes/default/images/ajax-loader-bar.gif"></p>
<p><input type="hidden" name="upgrade_to" value="<?php echo $_smarty_tpl->tpl_vars['UPGRADE_TO']->value;?>
"></p>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['STEP']->value==3){?>
<p>
  <?php echo l10n('A new version of Piwigo is available.');?>
<br>
  <?php echo l10n('This is a major update, with <a href="%s">new exciting features</a>.',$_smarty_tpl->tpl_vars['RELEASE_URL']->value);?>
 <?php echo l10n('Some themes and plugins may be not available yet.');?>

</p>
<form action="" method="post">

<?php echo smarty_function_counter(array('assign'=>'i'),$_smarty_tpl);?>

<fieldset>
  <legend><?php echo l10n('Dump Database');?>
</legend>
  <p><input type="checkbox" name="includeHistory"> &nbsp; <?php echo l10n('Include history data (Warning: server memory limit may be exceeded)');?>
</p>
  <p><input type="submit" name="dumpDatabase" value="<?php echo l10n('Dump Database');?>
"></p>
</fieldset>

<?php echo smarty_function_counter(array('assign'=>'i'),$_smarty_tpl);?>

<fieldset>
  <legend><?php echo l10n('Update to Piwigo %s',$_smarty_tpl->tpl_vars['UPGRADE_TO']->value);?>
</legend>
<?php if (!empty($_smarty_tpl->tpl_vars['missing']->value['plugins'])){?>
  <p><i><?php echo l10n('Following plugins may not be compatible with the new version of Piwigo:');?>
</i></p>
  <p><ul><?php  $_smarty_tpl->tpl_vars['plugin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plugin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['missing']->value['plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plugin']->key => $_smarty_tpl->tpl_vars['plugin']->value){
$_smarty_tpl->tpl_vars['plugin']->_loop = true;
?><li><a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['uri'];?>
" class="externalLink"><?php echo $_smarty_tpl->tpl_vars['plugin']->value['name'];?>
</a></li><?php } ?></ul><br></p>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['missing']->value['themes'])){?>
  <p><i><?php echo l10n('Following themes may not be compatible with the new version of Piwigo:');?>
</i></p>
  <p><ul><?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['missing']->value['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value){
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?><li><a href="<?php echo $_smarty_tpl->tpl_vars['theme']->value['uri'];?>
" class="externalLink"><?php echo $_smarty_tpl->tpl_vars['theme']->value['name'];?>
</a></li><?php } ?></ul><br></p>
<?php }?>
  <p>
<?php if (!empty($_smarty_tpl->tpl_vars['missing']->value['plugins'])||!empty($_smarty_tpl->tpl_vars['missing']->value['themes'])){?>
  <p><label><input type="checkbox" name="understand"> &nbsp;<?php echo l10n('I decide to update anyway');?>
</label></p>
<?php }?>
  <p><input type="submit" name="submit" value="<?php echo l10n('Update to Piwigo %s',$_smarty_tpl->tpl_vars['UPGRADE_TO']->value);?>
" <?php if (!empty($_smarty_tpl->tpl_vars['missing']->value['plugins'])||!empty($_smarty_tpl->tpl_vars['missing']->value['themes'])){?>disabled="disabled"<?php }?>>
  </p>
  <p class="autoupdate_bar" style="display:none;">&nbsp; <?php echo l10n('Update in progress...');?>
<br><img src="admin/themes/default/images/ajax-loader-bar.gif"></p>
</fieldset>

<p><input type="hidden" name="upgrade_to" value="<?php echo $_smarty_tpl->tpl_vars['UPGRADE_TO']->value;?>
"></p>
</form>
<?php }?><?php }} ?>