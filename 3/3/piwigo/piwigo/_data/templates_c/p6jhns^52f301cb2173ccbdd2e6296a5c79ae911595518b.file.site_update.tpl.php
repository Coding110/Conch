<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:24:53
         compiled from "./admin/themes/default/template/site_update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121699913654670dd5a24700-46395131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52f301cb2173ccbdd2e6296a5c79ae911595518b' => 
    array (
      0 => './admin/themes/default/template/site_update.tpl',
      1 => 1323027714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121699913654670dd5a24700-46395131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_URL' => 0,
    'update_result' => 0,
    'L_RESULT_UPDATE' => 0,
    'metadata_result' => 0,
    'L_RESULT_METADATA' => 0,
    'METADATA_LIST' => 0,
    'sync_errors' => 0,
    'error' => 0,
    'sync_error_captions' => 0,
    'caption' => 0,
    'sync_infos' => 0,
    'info' => 0,
    'introduction' => 0,
    'category_options' => 0,
    'category_options_selected' => 0,
    'U_SITE_MANAGER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670dd5af2b87_90649877',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670dd5af2b87_90649877')) {function content_54670dd5af2b87_90649877($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?>
<?php echo $_smarty_tpl->getSubTemplate ('include/resize.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="titrePage">
  <h2><?php echo l10n('Database synchronization with files');?>
: <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
</a></h2>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['update_result']->value)){?>
<h3><?php echo $_smarty_tpl->tpl_vars['L_RESULT_UPDATE']->value;?>
</h3>
<ul>
  <li class="update_summary_new"><?php echo $_smarty_tpl->tpl_vars['update_result']->value['NB_NEW_CATEGORIES'];?>
 <?php echo l10n('albums added in the database');?>
</li>
  <li class="update_summary_new"><?php echo $_smarty_tpl->tpl_vars['update_result']->value['NB_NEW_ELEMENTS'];?>
 <?php echo l10n('photos added in the database');?>
</li>
  <li class="update_summary_del"><?php echo $_smarty_tpl->tpl_vars['update_result']->value['NB_DEL_CATEGORIES'];?>
 <?php echo l10n('albums deleted in the database');?>
</li>
  <li class="update_summary_del"><?php echo $_smarty_tpl->tpl_vars['update_result']->value['NB_DEL_ELEMENTS'];?>
 <?php echo l10n('photos deleted from the database');?>
</li>
  <li><?php echo $_smarty_tpl->tpl_vars['update_result']->value['NB_UPD_ELEMENTS'];?>
 <?php echo l10n('photos updated in the database');?>
</li>
  <li class="update_summary_err"><?php echo $_smarty_tpl->tpl_vars['update_result']->value['NB_ERRORS'];?>
 <?php echo l10n('errors during synchronization');?>
</li>
</ul>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['metadata_result']->value)){?>
<h3><?php echo $_smarty_tpl->tpl_vars['L_RESULT_METADATA']->value;?>
</h3>
<ul>
  <li><?php echo $_smarty_tpl->tpl_vars['metadata_result']->value['NB_ELEMENTS_DONE'];?>
 <?php echo l10n('photos informations synchronized with files metadata');?>
</li>
  <li><?php echo $_smarty_tpl->tpl_vars['metadata_result']->value['NB_ELEMENTS_CANDIDATES'];?>
 <?php echo l10n('photos candidates for metadata synchronization');?>
</li>
  <li><?php echo l10n('Used metadata');?>
 : <?php echo $_smarty_tpl->tpl_vars['METADATA_LIST']->value;?>
</li>
</ul>
<?php }?>


<?php if (!empty($_smarty_tpl->tpl_vars['sync_errors']->value)){?>
<h3><?php echo l10n('Error list');?>
</h3>
<div class="errors">
<ul>
<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sync_errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
  <li>[<?php echo $_smarty_tpl->tpl_vars['error']->value['ELEMENT'];?>
] <?php echo $_smarty_tpl->tpl_vars['error']->value['LABEL'];?>
</li>
<?php } ?>
</ul>
</div>
<h3><?php echo l10n('Errors caption');?>
</h3>
<ul>
<?php  $_smarty_tpl->tpl_vars['caption'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['caption']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sync_error_captions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['caption']->key => $_smarty_tpl->tpl_vars['caption']->value){
$_smarty_tpl->tpl_vars['caption']->_loop = true;
?>
  <li><strong><?php echo $_smarty_tpl->tpl_vars['caption']->value['TYPE'];?>
</strong>: <?php echo $_smarty_tpl->tpl_vars['caption']->value['LABEL'];?>
</li>
<?php } ?>
</ul>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['sync_infos']->value)){?>
<h3><?php echo l10n('Detailed informations');?>
</h3>
<div class="infos">
<ul>
<?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sync_infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value){
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
  <li>[<?php echo $_smarty_tpl->tpl_vars['info']->value['ELEMENT'];?>
] <?php echo $_smarty_tpl->tpl_vars['info']->value['LABEL'];?>
</li>
<?php } ?>
</ul>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['introduction']->value)){?>
<h4><?php echo l10n('Choose an option');?>
</h4>
<form action="" method="post" id="update">

	<fieldset id="syncFiles">
		<legend><?php echo l10n('synchronize files structure with database');?>
</legend>
		<ul>
			<li><label><input type="radio" name="sync" value="" <?php if (empty($_smarty_tpl->tpl_vars['introduction']->value['sync'])){?>checked="checked"<?php }?>> <?php echo l10n('nothing');?>
</label></li>
			<li><label><input type="radio" name="sync" value="dirs" <?php if ('dirs'==$_smarty_tpl->tpl_vars['introduction']->value['sync']){?>checked="checked"<?php }?>> <?php echo l10n('only directories');?>
</label></li>

			<li><label><input type="radio" name="sync" value="files" <?php if ('files'==$_smarty_tpl->tpl_vars['introduction']->value['sync']){?>checked="checked"<?php }?>> <?php echo l10n('directories + files');?>
</label>
				<ul style="padding-left:3em">
					<li><label><input type="checkbox" name="display_info" value="1" <?php if ($_smarty_tpl->tpl_vars['introduction']->value['display_info']){?>checked="checked"<?php }?>> <?php echo l10n('display maximum informations (added albums and photos, deleted albums and photos)');?>
</label></li>
					<li><label><input type="checkbox" name="add_to_caddie" value="1" <?php if ($_smarty_tpl->tpl_vars['introduction']->value['add_to_caddie']){?>checked="checked"<?php }?>> <?php echo l10n('add new photos to caddie');?>
</label></li>
					<li><label><?php echo l10n('Who can see these photos?');?>
 <select name="privacy_level"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['introduction']->value['privacy_level_options'],'selected'=>$_smarty_tpl->tpl_vars['introduction']->value['privacy_level_selected']),$_smarty_tpl);?>
</select></label></li>
				</ul>
			</li>
		</ul>
	</fieldset>

	<fieldset id="syncMetadata">
		<legend><?php echo l10n('synchronize files metadata with database photos informations');?>
</legend>
		<label><input type="checkbox" name="sync_meta" <?php if ($_smarty_tpl->tpl_vars['introduction']->value['sync_meta']){?>checked="checked"<?php }?>> <?php echo l10n('Synchronize metadata');?>
 (<?php echo $_smarty_tpl->tpl_vars['METADATA_LIST']->value;?>
)</label>
		<ul style="padding-left:3em">
	  		<li>
	  			<label><input type="checkbox" name="meta_all" <?php if ($_smarty_tpl->tpl_vars['introduction']->value['meta_all']){?>checked="checked"<?php }?>> <?php echo l10n('even already synchronized photos');?>
</label>
	  		</li>
	  		<li>
	  			<label><input type="checkbox" name="meta_empty_overrides" <?php if ($_smarty_tpl->tpl_vars['introduction']->value['meta_empty_overrides']){?>checked="checked"<?php }?>> <?php echo l10n('overrides existing values with empty ones');?>
</label>
	  		</li>
		</ul>
	</fieldset>

  <fieldset id="syncSimulate">
    <legend><?php echo l10n('Simulation');?>
</legend>
    <ul><li><label><input type="checkbox" name="simulate" value="1" checked="checked"> <?php echo l10n('only perform a simulation (no change in database will be made)');?>
</label></li></ul>
  </fieldset>

  <fieldset id="catSubset">
    <legend><?php echo l10n('reduce to single existing albums');?>
</legend>
    <ul>
    <li>
    <select class="categoryList" name="cat" size="10">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_options']->value,'selected'=>$_smarty_tpl->tpl_vars['category_options_selected']->value),$_smarty_tpl);?>

    </select>
    </li>

    <li><label><input type="checkbox" name="subcats-included" value="1" <?php if ($_smarty_tpl->tpl_vars['introduction']->value['subcats_included']){?>checked="checked"<?php }?>> <?php echo l10n('Search in sub-albums');?>
</label></li>
    </ul>
  </fieldset>

  <p class="bottomButtons">
    <input class="submit" type="submit" value="<?php echo l10n('Submit');?>
" name="submit">
    <input class="submit" type="reset"  value="<?php echo l10n('Reset');?>
"  name="reset">
  </p>
</form>
<?php }?>

<p><a href="<?php echo $_smarty_tpl->tpl_vars['U_SITE_MANAGER']->value;?>
"><?php echo l10n('Site manager');?>
</a></p>
<?php }} ?>