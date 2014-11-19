<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:15
         compiled from "./themes/becktu/template/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19933186355466c8c7e17160-45014360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44332a09abd86606fb7e6100646217ea58546aa6' => 
    array (
      0 => './themes/becktu/template/index.tpl',
      1 => 1414654768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19933186355466c8c7e17160-45014360',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'errors' => 0,
    'infos' => 0,
    'PLUGIN_INDEX_CONTENT_BEFORE' => 0,
    'chronology' => 0,
    'ishome_page' => 0,
    'image_orders' => 0,
    'image_order' => 0,
    'image_derivatives' => 0,
    'image_derivative' => 0,
    'favorite' => 0,
    'U_CADDIE' => 0,
    'U_EDIT' => 0,
    'U_SEARCH_RULES' => 0,
    'U_SLIDESHOW' => 0,
    'U_MODE_FLAT' => 0,
    'U_MODE_NORMAL' => 0,
    'U_MODE_POSTED' => 0,
    'U_MODE_CREATED' => 0,
    'PLUGIN_INDEX_BUTTONS' => 0,
    'button' => 0,
    'PLUGIN_INDEX_ACTIONS' => 0,
    'TITLE' => 0,
    'chronology_views' => 0,
    'view' => 0,
    'PLUGIN_INDEX_CONTENT_BEGIN' => 0,
    'category_search_results' => 0,
    'QUERY_SEARCH' => 0,
    'res' => 0,
    'tag_search_results' => 0,
    'tag' => 0,
    'FILE_CHRONOLOGY_VIEW' => 0,
    'CONTENT_DESCRIPTION' => 0,
    'CONTENT' => 0,
    'CATEGORIES' => 0,
    'cats_navbar' => 0,
    'THUMBNAILS' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
    'thumb_navbar' => 0,
    'PLUGIN_INDEX_CONTENT_END' => 0,
    'PLUGIN_INDEX_CONTENT_AFTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c7f2e233_70985232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c7f2e233_70985232')) {function content_5466c8c7f2e233_70985232($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.switchbox','load'=>'async','require'=>'jquery','path'=>'themes/default/js/switchbox.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>



<?php if (isset($_smarty_tpl->tpl_vars['errors']->value)||isset($_smarty_tpl->tpl_vars['infos']->value)){?>
<div class="content messages<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">
<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_BEFORE']->value)){?><?php echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_BEFORE']->value;?>
<?php }?>
<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">
<div class="titrePage<?php if (isset($_smarty_tpl->tpl_vars['chronology']->value['TITLE'])){?> calendarTitleBar<?php }?>" style="<?php if (isset($_smarty_tpl->tpl_vars['ishome_page']->value)){?> display:none<?php }?>">
	<ul class="categoryActions">
<?php if (!empty($_smarty_tpl->tpl_vars['image_orders']->value)){?>
		<li><a  href="./" title="返回主页" class="glyphicon glyphicon-home" rel="nofollow"> </a></li>
		<li><a id="sortOrderLink" title="<?php echo l10n('Sort order');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-sort-by-alphabet"></span><span class="pwg-button-text"><?php echo l10n('Sort order');?>
</span> </a> <div id="sortOrderBox" class="switchBox"> <div class="switchBoxTitle"><?php echo l10n('Sort order');?>
</div> <?php  $_smarty_tpl->tpl_vars['image_order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image_order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['image_orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image_order']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image_order']->key => $_smarty_tpl->tpl_vars['image_order']->value){
$_smarty_tpl->tpl_vars['image_order']->_loop = true;
 $_smarty_tpl->tpl_vars['image_order']->index++;
 $_smarty_tpl->tpl_vars['image_order']->first = $_smarty_tpl->tpl_vars['image_order']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['first'] = $_smarty_tpl->tpl_vars['image_order']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['first']){?><br><?php }?> <?php if ($_smarty_tpl->tpl_vars['image_order']->value['SELECTED']){?> <span>&#x2714; </span><?php echo $_smarty_tpl->tpl_vars['image_order']->value['DISPLAY'];?>
 <?php }else{ ?> <span style="visibility:hidden">&#x2714; </span><a href="<?php echo $_smarty_tpl->tpl_vars['image_order']->value['URL'];?>
" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['image_order']->value['DISPLAY'];?>
</a> <?php }?> <?php } ?> </div> <?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
(SwitchBox=window.SwitchBox||[]).push("#sortOrderLink", "#sortOrderBox");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 </li>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['image_derivatives']->value)){?>
		<li><a id="derivativeSwitchLink" title="<?php echo l10n('Photo sizes');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-resize-small"></span><span class="pwg-button-text"><?php echo l10n('Photo sizes');?>
</span> </a> <div id="derivativeSwitchBox" class="switchBox"> <div class="switchBoxTitle"><?php echo l10n('Photo sizes');?>
</div> <?php  $_smarty_tpl->tpl_vars['image_derivative'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image_derivative']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['image_derivatives']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image_derivative']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image_derivative']->key => $_smarty_tpl->tpl_vars['image_derivative']->value){
$_smarty_tpl->tpl_vars['image_derivative']->_loop = true;
 $_smarty_tpl->tpl_vars['image_derivative']->index++;
 $_smarty_tpl->tpl_vars['image_derivative']->first = $_smarty_tpl->tpl_vars['image_derivative']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['first'] = $_smarty_tpl->tpl_vars['image_derivative']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['first']){?><br><?php }?> <?php if ($_smarty_tpl->tpl_vars['image_derivative']->value['SELECTED']){?> <span>&#x2714; </span><?php echo $_smarty_tpl->tpl_vars['image_derivative']->value['DISPLAY'];?>
 <?php }else{ ?> <span style="visibility:hidden">&#x2714; </span><a href="<?php echo $_smarty_tpl->tpl_vars['image_derivative']->value['URL'];?>
" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['image_derivative']->value['DISPLAY'];?>
</a> <?php }?> <?php } ?> </div> <?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
(SwitchBox=window.SwitchBox||[]).push("#derivativeSwitchLink", "#derivativeSwitchBox");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 </li>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['favorite']->value)){?>
		<li id="cmdFavorite"><a href="<?php echo $_smarty_tpl->tpl_vars['favorite']->value['U_FAVORITE'];?>
" title="<?php echo l10n('delete all photos from your favorites');?>
" class="pwg-state-default pwg-button" rel="nofollow">
			<span class="pwg-icon pwg-icon-favorite-del"></span><span class="pwg-button-text"><?php echo l10n('delete all photos from your favorites');?>
</span>
		</a></li>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_CADDIE']->value)){?>
		<li id="cmdCaddie"><a href="<?php echo $_smarty_tpl->tpl_vars['U_CADDIE']->value;?>
" title="<?php echo l10n('Add to caddie');?>
" class="pwg-state-default pwg-button">
			<span class="glyphicon glyphicon-plus-sign"></span><span class="pwg-button-text"><?php echo l10n('Caddie');?>
</span>
		</a></li>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_EDIT']->value)){?>
		<li id="cmdEditAlbum"><a href="<?php echo $_smarty_tpl->tpl_vars['U_EDIT']->value;?>
" title="<?php echo l10n('Edit album');?>
" class="pwg-state-default pwg-button">
			<span class="glyphicon glyphicon-cog"></span><span class="pwg-button-text"><?php echo l10n('Edit');?>
</span>
		</a></li>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_SEARCH_RULES']->value)){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>

		<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_SEARCH_RULES']->value;?>
" onclick="popuphelp(this.href); return false;" title="<?php echo l10n('Search rules');?>
" class="pwg-state-default pwg-button" rel="nofollow">
			<span class="pwg-icon pwg-icon-help"></span><span class="pwg-button-text">(?)</span>
		</a></li>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_SLIDESHOW']->value)){?>
		<li id="cmdSlideshow"><a href="<?php echo $_smarty_tpl->tpl_vars['U_SLIDESHOW']->value;?>
" title="<?php echo l10n('slideshow');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-facetime-video"></span><span class="pwg-button-text"><?php echo l10n('slideshow');?>
</span> </a></li>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_MODE_FLAT']->value)){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MODE_FLAT']->value;?>
" title="<?php echo l10n('display all photos in all sub-albums');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="pwg-icon pwg-icon-category-view-flat"></span><span class="pwg-button-text"><?php echo l10n('display all photos in all sub-albums');?>
</span> </a></li>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_MODE_NORMAL']->value)){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MODE_NORMAL']->value;?>
" title="<?php echo l10n('return to normal view mode');?>
" class="pwg-state-default pwg-button"> <span class="glyphicon glyphicon-collapse-up"></span><span class="pwg-button-text"><?php echo l10n('return to normal view mode');?>
</span> </a></li>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_MODE_POSTED']->value)){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MODE_POSTED']->value;?>
" title="<?php echo l10n('display a calendar by posted date');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-calendar"></span><span class="pwg-button-text"><?php echo l10n('Calendar');?>
</span> </a></li>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_MODE_CREATED']->value)){?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_MODE_CREATED']->value;?>
" title="<?php echo l10n('display a calendar by creation date');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-camera"></span><span class="pwg-button-text"><?php echo l10n('Calendar');?>
</span> </a></li>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_BUTTONS']->value)){?><?php  $_smarty_tpl->tpl_vars['button'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['button']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PLUGIN_INDEX_BUTTONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['button']->key => $_smarty_tpl->tpl_vars['button']->value){
$_smarty_tpl->tpl_vars['button']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['button']->value;?>
</li><?php } ?><?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_ACTIONS']->value)){?><?php echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_ACTIONS']->value;?>
<?php }?>
	</ul>
<!--
<?php ob_start();?><?php echo strpos(strip_tags($_smarty_tpl->tpl_vars['TITLE']->value),"/");?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
     <h2><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</h2>
<?php }else{ ?>
     <div style="width:1343px;height:43px;"></div>
<?php }?>
-->
  <div style="width:1343px;height:43px;"></div>
<?php if (isset($_smarty_tpl->tpl_vars['chronology_views']->value)){?>
<div class="calendarViews"><?php echo l10n('View');?>
:
	<a id="calendarViewSwitchLink" href="#">
	<?php  $_smarty_tpl->tpl_vars['view'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['view']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chronology_views']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['view']->key => $_smarty_tpl->tpl_vars['view']->value){
$_smarty_tpl->tpl_vars['view']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['view']->value['SELECTED']){?><?php echo $_smarty_tpl->tpl_vars['view']->value['CONTENT'];?>
<?php }?><?php } ?>
	</a>
	<div id="calendarViewSwitchBox" class="switchBox">
		<?php  $_smarty_tpl->tpl_vars['view'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['view']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chronology_views']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['view']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['view']->key => $_smarty_tpl->tpl_vars['view']->value){
$_smarty_tpl->tpl_vars['view']->_loop = true;
 $_smarty_tpl->tpl_vars['view']->index++;
 $_smarty_tpl->tpl_vars['view']->first = $_smarty_tpl->tpl_vars['view']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['first'] = $_smarty_tpl->tpl_vars['view']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['first']){?><br><?php }?>
		<span<?php if (!$_smarty_tpl->tpl_vars['view']->value['SELECTED']){?> style="visibility:hidden"<?php }?>>&#x2714; </span><a href="<?php echo $_smarty_tpl->tpl_vars['view']->value['VALUE'];?>
"><?php echo $_smarty_tpl->tpl_vars['view']->value['CONTENT'];?>
</a>
<?php } ?>
	</div>
	<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
(SwitchBox=window.SwitchBox||[]).push("#calendarViewSwitchLink", "#calendarViewSwitchBox");<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['chronology']->value['TITLE'])){?>
<h2 class="calendarTitle"><?php echo $_smarty_tpl->tpl_vars['chronology']->value['TITLE'];?>
</h2>
<?php }?>

</div>

<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_BEGIN']->value)){?><?php echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_BEGIN']->value;?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['category_search_results']->value)){?>
<div class="category_search_results"><?php echo l10n('Album results for');?>
 <strong><?php echo $_smarty_tpl->tpl_vars['QUERY_SEARCH']->value;?>
</strong> :
	<em><strong>
<?php  $_smarty_tpl->tpl_vars['res'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['res']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_search_results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['res']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->key => $_smarty_tpl->tpl_vars['res']->value){
$_smarty_tpl->tpl_vars['res']->_loop = true;
 $_smarty_tpl->tpl_vars['res']->index++;
 $_smarty_tpl->tpl_vars['res']->first = $_smarty_tpl->tpl_vars['res']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['res_loop']['first'] = $_smarty_tpl->tpl_vars['res']->first;
?>
	<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['res_loop']['first']){?> &mdash; <?php }?>
	<?php echo $_smarty_tpl->tpl_vars['res']->value;?>

<?php } ?>
	</strong></em>
</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['tag_search_results']->value)){?>
<div class="tag_search_results"><?php echo l10n('Tag results for');?>
 <strong><?php echo $_smarty_tpl->tpl_vars['QUERY_SEARCH']->value;?>
</strong> :
	<em><strong>
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tag_search_results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->index++;
 $_smarty_tpl->tpl_vars['tag']->first = $_smarty_tpl->tpl_vars['tag']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['res_loop']['first'] = $_smarty_tpl->tpl_vars['tag']->first;
?>
	<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['res_loop']['first']){?> &mdash; <?php }?> <a href="<?php echo $_smarty_tpl->tpl_vars['tag']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a>
<?php } ?>
	</strong></em>
</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['FILE_CHRONOLOGY_VIEW']->value)){?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['FILE_CHRONOLOGY_VIEW']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['CONTENT_DESCRIPTION']->value)){?>
<div class="additional_info">
	<?php echo $_smarty_tpl->tpl_vars['CONTENT_DESCRIPTION']->value;?>

</div>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['CONTENT']->value)){?><?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['CATEGORIES']->value)){?><?php echo $_smarty_tpl->tpl_vars['CATEGORIES']->value;?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['cats_navbar']->value)){?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('navbar'=>$_smarty_tpl->tpl_vars['cats_navbar']->value), 0);?>

<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['THUMBNAILS']->value)){?>
<div class="loader"><img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['img_dir'];?>
/ajax_loader.gif"></div>
<ul class="thumbnails" id="thumbnails">
  <?php echo $_smarty_tpl->tpl_vars['THUMBNAILS']->value;?>

</ul>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['thumb_navbar']->value)){?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('navbar'=>$_smarty_tpl->tpl_vars['thumb_navbar']->value), 0);?>

<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_END']->value)){?><?php echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_END']->value;?>
<?php }?>
</div>
<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_AFTER']->value)){?><?php echo $_smarty_tpl->tpl_vars['PLUGIN_INDEX_CONTENT_AFTER']->value;?>
<?php }?>
<?php }} ?>