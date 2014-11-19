<?php /* Smarty version Smarty-3.1.13, created on 2014-11-17 09:45:18
         compiled from "./themes/becktu/template/picture.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20039352205466c8dbad74c9-99983175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'baebf0482d82de48f5c90aa2dcf2ed0ba77da4e2' => 
    array (
      0 => './themes/becktu/template/picture.tpl',
      1 => 1416188634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20039352205466c8dbad74c9-99983175',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8dbc9ee74_26190835',
  'variables' => 
  array (
    'MENUBAR' => 0,
    'errors' => 0,
    'infos' => 0,
    'PLUGIN_PICTURE_BEFORE' => 0,
    'SECTION_TITLE' => 0,
    'LEVEL_SEPARATOR' => 0,
    'current' => 0,
    'COOKIE_PATH' => 0,
    'derivative' => 0,
    'derivative_type' => 0,
    'U_ORIGINAL' => 0,
    'U_SLIDESHOW_START' => 0,
    'U_METADATA' => 0,
    'PLUGIN_PICTURE_BUTTONS' => 0,
    'button' => 0,
    'PLUGIN_PICTURE_ACTIONS' => 0,
    'favorite' => 0,
    'U_SET_AS_REPRESENTATIVE' => 0,
    'U_PHOTO_ADMIN' => 0,
    'U_CADDIE' => 0,
    'ROOT_URL' => 0,
    'ELEMENT_CONTENT' => 0,
    'COMMENT_IMG' => 0,
    'U_SLIDESHOW_STOP' => 0,
    'DISPLAY_NAV_THUMB' => 0,
    'previous' => 0,
    'U_UP' => 0,
    'next' => 0,
    'display_info' => 0,
    'INFO_AUTHOR' => 0,
    'INFO_CREATION_DATE' => 0,
    'INFO_POSTED_DATE' => 0,
    'INFO_DIMENSIONS' => 0,
    'INFO_FILE' => 0,
    'INFO_FILESIZE' => 0,
    'related_tags' => 0,
    'tag' => 0,
    'related_categories' => 0,
    'cat' => 0,
    'INFO_VISITS' => 0,
    'rate_summary' => 0,
    'rating' => 0,
    'mark' => 0,
    'available_permission_levels' => 0,
    'level' => 0,
    'label' => 0,
    'metadata' => 0,
    'meta' => 0,
    'value' => 0,
    'COMMENT_COUNT' => 0,
    'comment_add' => 0,
    'comments' => 0,
    'navbar' => 0,
    'COMMENTS_ORDER_URL' => 0,
    'COMMENTS_ORDER_TITLE' => 0,
    'PLUGIN_PICTURE_AFTER' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8dbc9ee74_26190835')) {function content_5466c8dbc9ee74_26190835($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.switchbox','load'=>'async','require'=>'jquery','path'=>'themes/default/js/switchbox.js'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="content"<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> class="contentWithMenu"<?php }?> style="padding:60px;">

<?php if (isset($_smarty_tpl->tpl_vars['errors']->value)||!empty($_smarty_tpl->tpl_vars['infos']->value)){?>
<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_PICTURE_BEFORE']->value)){?><?php echo $_smarty_tpl->tpl_vars['PLUGIN_PICTURE_BEFORE']->value;?>
<?php }?>

<!--
<div id="imageHeaderBar">
	<div class="browsePath">
		<?php echo $_smarty_tpl->tpl_vars['SECTION_TITLE']->value;?>
<span class="browsePathSeparator"><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
</span><h2><?php echo $_smarty_tpl->tpl_vars['current']->value['TITLE'];?>
</h2>
	</div>
</div>
-->

<div id="imageToolBar">

<div class="actionButtons">
<?php if (isset($_smarty_tpl->tpl_vars['current']->value['unique_derivatives'])&&count($_smarty_tpl->tpl_vars['current']->value['unique_derivatives'])>1){?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

function changeImgSrc(url,typeSave,typeMap)
{
	var theImg = document.getElementById("theMainImage");
	if (theImg)
	{
		theImg.removeAttribute("width");theImg.removeAttribute("height");
		theImg.src = url;
		theImg.useMap = "#map"+typeMap;
	}
	jQuery('#derivativeSwitchBox .switchCheck').css('visibility','hidden');
	jQuery('#derivativeChecked'+typeMap).css('visibility','visible');
	document.cookie = 'picture_deriv='+typeSave+';path=<?php echo $_smarty_tpl->tpl_vars['COOKIE_PATH']->value;?>
';
}
(SwitchBox=window.SwitchBox||[]).push("#derivativeSwitchLink", "#derivativeSwitchBox");
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<a id="derivativeSwitchLink" title="<?php echo l10n('Photo sizes');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-resize-small"></span><span class="pwg-button-text"><?php echo l10n('Photo sizes');?>
</span> </a> <div id="derivativeSwitchBox" class="switchBox"> <div class="switchBoxTitle"><?php echo l10n('Photo sizes');?>
</div> <?php  $_smarty_tpl->tpl_vars['derivative'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['derivative']->_loop = false;
 $_smarty_tpl->tpl_vars['derivative_type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['current']->value['unique_derivatives']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['derivative']->key => $_smarty_tpl->tpl_vars['derivative']->value){
$_smarty_tpl->tpl_vars['derivative']->_loop = true;
 $_smarty_tpl->tpl_vars['derivative_type']->value = $_smarty_tpl->tpl_vars['derivative']->key;
?> <span class="switchCheck" id="derivativeChecked<?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_type();?>
"<?php if ($_smarty_tpl->tpl_vars['derivative']->value->get_type()!=$_smarty_tpl->tpl_vars['current']->value['selected_derivative']->get_type()){?> style="visibility:hidden"<?php }?>>&#x2714; </span> <a href="javascript:changeImgSrc('<?php echo strtr($_smarty_tpl->tpl_vars['derivative']->value->get_url(), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
','<?php echo $_smarty_tpl->tpl_vars['derivative_type']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_type();?>
')"> <?php echo l10n($_smarty_tpl->tpl_vars['derivative']->value->get_type());?>
<span class="derivativeSizeDetails"> (<?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_size_hr();?>
)</span> </a><br> <?php } ?> <?php if (isset($_smarty_tpl->tpl_vars['U_ORIGINAL']->value)){?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>
 <a href="javascript:phpWGOpenWindow('<?php echo $_smarty_tpl->tpl_vars['U_ORIGINAL']->value;?>
','xxx','scrollbars=yes,toolbar=no,status=no,resizable=yes')" rel="nofollow"><?php echo l10n('Original');?>
</a> <?php }?> </div> 
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_SLIDESHOW_START']->value)){?> <a href="<?php echo $_smarty_tpl->tpl_vars['U_SLIDESHOW_START']->value;?>
" title="<?php echo l10n('slideshow');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-facetime-video"></span><span class="pwg-button-text"><?php echo l10n('slideshow');?>
</span> </a> <?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_METADATA']->value)){?> <a href="<?php echo $_smarty_tpl->tpl_vars['U_METADATA']->value;?>
" title="<?php echo l10n('Show file metadata');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-info-sign"></span><span class="pwg-button-text"><?php echo l10n('Show file metadata');?>
</span> </a> <?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['current']->value['U_DOWNLOAD'])){?> <a href="<?php echo $_smarty_tpl->tpl_vars['current']->value['U_DOWNLOAD'];?>
" title="<?php echo l10n('Download this file');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-arrow-down"></span><span class="pwg-button-text"><?php echo l10n('Download');?>
</span> </a> <?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['PLUGIN_PICTURE_BUTTONS']->value)){?><?php  $_smarty_tpl->tpl_vars['button'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['button']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PLUGIN_PICTURE_BUTTONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['button']->key => $_smarty_tpl->tpl_vars['button']->value){
$_smarty_tpl->tpl_vars['button']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['button']->value;?>
<?php } ?><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['PLUGIN_PICTURE_ACTIONS']->value)){?><?php echo $_smarty_tpl->tpl_vars['PLUGIN_PICTURE_ACTIONS']->value;?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['favorite']->value)){?> <a href="<?php echo $_smarty_tpl->tpl_vars['favorite']->value['U_FAVORITE'];?>
" title="<?php if ($_smarty_tpl->tpl_vars['favorite']->value['IS_FAVORITE']){?><?php echo l10n('delete this photo from your favorites');?>
<?php }else{ ?><?php echo l10n('add this photo to your favorites');?>
<?php }?>" class="pwg-state-default pwg-button" rel="nofollow"> <span class="<?php if ($_smarty_tpl->tpl_vars['favorite']->value['IS_FAVORITE']){?>glyphicon glyphicon-remove-circle<?php }else{ ?>glyphicon glyphicon-ok-circle<?php }?>"></span><span class="pwg-button-text"><?php echo l10n('Favorites');?>
</span> </a> <?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_SET_AS_REPRESENTATIVE']->value)){?> <a id="cmdSetRepresentative" href="<?php echo $_smarty_tpl->tpl_vars['U_SET_AS_REPRESENTATIVE']->value;?>
" title="<?php echo l10n('set as album representative');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-resize-small"></span><span class="pwg-button-text"><?php echo l10n('representative');?>
</span> </a> <?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_PHOTO_ADMIN']->value)){?> <a id="cmdEditPhoto" href="<?php echo $_smarty_tpl->tpl_vars['U_PHOTO_ADMIN']->value;?>
" title="<?php echo l10n('Modify information');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-cog"></span><span class="pwg-button-text"><?php echo l10n('Edit');?>
</span> </a> <?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_CADDIE']->value)){?> <?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 function addToCadie(aElement, rootUrl, id)
{
if (aElement.disabled) return;
aElement.disabled=true;
var y = new PwgWS(rootUrl);
y.callService(
	"pwg.caddie.add", {image_id: id} ,
	{
		onFailure: function(num, text) { alert(num + " " + text); document.location=aElement.href; },
		onSuccess: function(result) { aElement.disabled = false; }
	}
	);
} <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['U_CADDIE']->value;?>
" onclick="addToCadie(this, '<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
', <?php echo $_smarty_tpl->tpl_vars['current']->value['id'];?>
); return false;" title="<?php echo l10n('Add to caddie');?>
" class="pwg-state-default pwg-button" rel="nofollow"> <span class="glyphicon glyphicon-bookmark"> </span><span class="pwg-button-text"><?php echo l10n('Caddie');?>
</span> </a> <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('picture_nav_buttons.tpl','picture_nav_buttons'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<div id="theImageAndInfos">
<div id="theImage">
<?php echo $_smarty_tpl->tpl_vars['ELEMENT_CONTENT']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['COMMENT_IMG']->value)){?>
<p class="imageComment"><?php echo $_smarty_tpl->tpl_vars['COMMENT_IMG']->value;?>
</p>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_SLIDESHOW_STOP']->value)){?>
<p>
	[ <a href="<?php echo $_smarty_tpl->tpl_vars['U_SLIDESHOW_STOP']->value;?>
"><?php echo l10n('stop the slideshow');?>
</a> ]
</p>
<?php }?>

</div><div id="infoSwitcher"></div><div id="imageInfos">
<?php if ($_smarty_tpl->tpl_vars['DISPLAY_NAV_THUMB']->value){?>
	<div class="navThumbs">
<?php if (isset($_smarty_tpl->tpl_vars['previous']->value)){?>
			<a class="navThumb" id="linkPrev" href="<?php echo $_smarty_tpl->tpl_vars['previous']->value['U_IMG'];?>
" title="<?php echo l10n('Previous');?>
 : <?php echo $_smarty_tpl->tpl_vars['previous']->value['TITLE_ESC'];?>
" rel="prev">
				<span class="thumbHover prevThumbHover"></span>
				<img src="<?php echo $_smarty_tpl->tpl_vars['previous']->value['derivatives']['square']->get_url();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['previous']->value['TITLE_ESC'];?>
">
			</a>
<?php }elseif(isset($_smarty_tpl->tpl_vars['U_UP']->value)){?>
			<a class="navThumb" id="linkPrev" href="<?php echo $_smarty_tpl->tpl_vars['U_UP']->value;?>
" title="<?php echo l10n('Thumbnails');?>
">
				<div class="thumbHover"><?php echo l10n('First Page');?>
<br><br><?php echo l10n('Go back to the album');?>
</div>
			</a>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['next']->value)){?>
			<a class="navThumb" id="linkNext" href="<?php echo $_smarty_tpl->tpl_vars['next']->value['U_IMG'];?>
" title="<?php echo l10n('Next');?>
 : <?php echo $_smarty_tpl->tpl_vars['next']->value['TITLE_ESC'];?>
" rel="next">
				<span class="thumbHover nextThumbHover"></span>
				<img src="<?php echo $_smarty_tpl->tpl_vars['next']->value['derivatives']['square']->get_url();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['next']->value['TITLE_ESC'];?>
">
			</a>
<?php }elseif(isset($_smarty_tpl->tpl_vars['U_UP']->value)){?>
			<a class="navThumb" id="linkNext"  href="<?php echo $_smarty_tpl->tpl_vars['U_UP']->value;?>
"  title="<?php echo l10n('Thumbnails');?>
">
				<div class="thumbHover"><?php echo l10n('Last Page');?>
<br><br><?php echo l10n('Go back to the album');?>
</div>
			</a>
<?php }?>
	</div>
<?php }?>

<dl id="standard" class="imageInfoTable">
 <?php if ($_smarty_tpl->tpl_vars['display_info']->value['author']&&isset($_smarty_tpl->tpl_vars['INFO_AUTHOR']->value)){?> <div id="Author" class="imageInfo"> <dt><?php echo l10n('Author');?>
</dt> <dd><?php echo $_smarty_tpl->tpl_vars['INFO_AUTHOR']->value;?>
</dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['created_on']&&isset($_smarty_tpl->tpl_vars['INFO_CREATION_DATE']->value)){?> <div id="datecreate" class="imageInfo"> <dt><?php echo l10n('Created on');?>
</dt> <dd><?php echo $_smarty_tpl->tpl_vars['INFO_CREATION_DATE']->value;?>
</dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['posted_on']){?> <div id="datepost" class="imageInfo"> <dt><?php echo l10n('Posted on');?>
</dt> <dd><?php echo $_smarty_tpl->tpl_vars['INFO_POSTED_DATE']->value;?>
</dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['dimensions']&&isset($_smarty_tpl->tpl_vars['INFO_DIMENSIONS']->value)){?> <div id="Dimensions" class="imageInfo"> <dt><?php echo l10n('Dimensions');?>
</dt> <dd><?php echo $_smarty_tpl->tpl_vars['INFO_DIMENSIONS']->value;?>
</dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['file']){?> <div id="File" class="imageInfo"> <dt><?php echo l10n('File');?>
</dt> <dd><?php echo $_smarty_tpl->tpl_vars['INFO_FILE']->value;?>
</dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['filesize']&&isset($_smarty_tpl->tpl_vars['INFO_FILESIZE']->value)){?> <div id="Filesize" class="imageInfo"> <dt><?php echo l10n('Filesize');?>
</dt> <dd><?php echo $_smarty_tpl->tpl_vars['INFO_FILESIZE']->value;?>
</dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['tags']&&isset($_smarty_tpl->tpl_vars['related_tags']->value)){?> <div id="Tags" class="imageInfo"> <dt><?php echo l10n('Tags');?>
</dt> <dd> <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->index++;
 $_smarty_tpl->tpl_vars['tag']->first = $_smarty_tpl->tpl_vars['tag']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tag_loop']['first'] = $_smarty_tpl->tpl_vars['tag']->first;
?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['tag_loop']['first']){?>, <?php }?><a href="<?php echo $_smarty_tpl->tpl_vars['tag']->value['URL'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</a><?php } ?> </dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['categories']&&isset($_smarty_tpl->tpl_vars['related_categories']->value)){?> <div id="Categories" class="imageInfo"> <dt><?php echo l10n('Albums');?>
</dt> <dd> <ul> <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?> <li><?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
</li> <?php } ?> </ul> </dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['visits']){?> <div id="Visits" class="imageInfo"> <dt><?php echo l10n('Visits');?>
</dt> <dd><?php echo $_smarty_tpl->tpl_vars['INFO_VISITS']->value;?>
</dd> </div> <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_info']->value['rating_score']&&isset($_smarty_tpl->tpl_vars['rate_summary']->value)){?> <div id="Average" class="imageInfo"> <dt><?php echo l10n('Rating score');?>
</dt> <dd> <?php if ($_smarty_tpl->tpl_vars['rate_summary']->value['count']){?> <span id="ratingScore"><?php echo $_smarty_tpl->tpl_vars['rate_summary']->value['score'];?>
</span> <span id="ratingCount">(<?php echo l10n_dec('%d rate','%d rates',$_smarty_tpl->tpl_vars['rate_summary']->value['count']);?>
)</span> <?php }else{ ?> <span id="ratingScore"><?php echo l10n('no rate');?>
</span> <span id="ratingCount"></span> <?php }?> </dd> </div> <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['rating']->value)){?> <div id="rating" class="imageInfo"> <dt> <span id="updateRate"><?php if (isset($_smarty_tpl->tpl_vars['rating']->value['USER_RATE'])){?><?php echo l10n('Update your rating');?>
<?php }else{ ?><?php echo l10n('Rate this photo');?>
<?php }?></span> </dt> <dd> <form action="<?php echo $_smarty_tpl->tpl_vars['rating']->value['F_ACTION'];?>
" method="post" id="rateForm" style="margin:0;"> <div> <?php  $_smarty_tpl->tpl_vars['mark'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mark']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rating']->value['marks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mark']->key => $_smarty_tpl->tpl_vars['mark']->value){
$_smarty_tpl->tpl_vars['mark']->_loop = true;
?> <?php if (isset($_smarty_tpl->tpl_vars['rating']->value['USER_RATE'])&&$_smarty_tpl->tpl_vars['mark']->value==$_smarty_tpl->tpl_vars['rating']->value['USER_RATE']){?> <input type="button" name="rate" value="<?php echo $_smarty_tpl->tpl_vars['mark']->value;?>
" class="rateButtonSelected" title="<?php echo $_smarty_tpl->tpl_vars['mark']->value;?>
"> <?php }else{ ?> <input type="submit" name="rate" value="<?php echo $_smarty_tpl->tpl_vars['mark']->value;?>
" class="rateButton" title="<?php echo $_smarty_tpl->tpl_vars['mark']->value;?>
"> <?php }?> <?php } ?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'rating','load'=>'async','require'=>'core.scripts','path'=>'themes/default/js/rating.js'),$_smarty_tpl);?>
 <?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 var _pwgRatingAutoQueue = _pwgRatingAutoQueue||[]; _pwgRatingAutoQueue.push( {rootUrl: '<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
', image_id: <?php echo $_smarty_tpl->tpl_vars['current']->value['id'];?>
, onSuccess : function(rating) { var e = document.getElementById("updateRate"); if (e) e.innerHTML = "<?php echo strtr(l10n('Update your rating'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
"; e = document.getElementById("ratingScore"); if (e) e.innerHTML = rating.score; e = document.getElementById("ratingCount"); if (e) { if (rating.count == 1) { e.innerHTML = "(<?php echo strtr(l10n('%d rate'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
)".replace( "%d", rating.count); } else { e.innerHTML = "(<?php echo strtr(l10n('%d rates'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
)".replace( "%d", rating.count); } } }} ); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 
			</div>
			</form>
		</dd>
	</div>
<?php }?>

<div id="imageShare" class="bdsharebuttonbox imageInfo"  data-tag="share_1">
	<dt>分享到</dt>
	<!-- 此处添加展示按钮 -->
	<dd>
	<a class="bds_qzone" data-cmd="qzone"></a>
	<a class="bds_tsina" data-cmd="tsina"></a>
	<a class="bds_weixin" data-cmd="weixin"></a>
	<a class="bds_douban" data-cmd="douban"></a>
	<a class="bds_tqq" data-cmd="tqq"></a>
	</dd>
</div>

<?php if ($_smarty_tpl->tpl_vars['display_info']->value['privacy_level']&&isset($_smarty_tpl->tpl_vars['available_permission_levels']->value)){?>
	<div id="Privacy" class="imageInfo">
		<dt><?php echo l10n('Who can see this photo?');?>
</dt>
		<dd>
			<div> 
				<a id="privacyLevelLink" href><?php echo $_smarty_tpl->tpl_vars['available_permission_levels']->value[$_smarty_tpl->tpl_vars['current']->value['level']];?>
</a>
			</div>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 function setPrivacyLevel(id, level){ (new PwgWS('<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
')).callService( "pwg.images.setPrivacyLevel", { image_id:id, level:level}, { method: "POST", onFailure: function(num, text) { alert(num + " " + text); }, onSuccess: function(result) { jQuery('#privacyLevelBox .switchCheck').css('visibility','hidden'); jQuery('#switchLevel'+level).prev('.switchCheck').css('visibility','visible'); jQuery('#privacyLevelLink').text(jQuery('#switchLevel'+level).text()); } } ); } (SwitchBox=window.SwitchBox||[]).push("#privacyLevelLink", "#privacyLevelBox"); <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

			<div id="privacyLevelBox" class="switchBox" style="display:none">
<?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_smarty_tpl->tpl_vars['level'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['available_permission_levels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
$_smarty_tpl->tpl_vars['label']->_loop = true;
 $_smarty_tpl->tpl_vars['level']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
					<span class="switchCheck"<?php if ($_smarty_tpl->tpl_vars['level']->value!=$_smarty_tpl->tpl_vars['current']->value['level']){?> style="visibility:hidden"<?php }?>>&#x2714; </span>
					<a id="switchLevel<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
" href="javascript:setPrivacyLevel(<?php echo $_smarty_tpl->tpl_vars['current']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
)"><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</a><br>
<?php } ?>
			</div>
		</dd>
	</div>
<?php }?>

</dl>

<?php if (isset($_smarty_tpl->tpl_vars['metadata']->value)){?>
<dl id="Metadata" class="imageInfoTable">
<?php  $_smarty_tpl->tpl_vars['meta'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['meta']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['metadata']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['meta']->key => $_smarty_tpl->tpl_vars['meta']->value){
$_smarty_tpl->tpl_vars['meta']->_loop = true;
?>
	<h3><?php echo $_smarty_tpl->tpl_vars['meta']->value['TITLE'];?>
</h3>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['meta']->value['lines']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['label']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<div class="imageInfo">
			<dt><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</dt>
			<dd><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</dd>
		</div>
<?php } ?>
<?php } ?>
</dl>
<?php }?>
</div>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['COMMENT_COUNT']->value)){?>
<div id="comments" <?php if ((!isset($_smarty_tpl->tpl_vars['comment_add']->value)&&($_smarty_tpl->tpl_vars['COMMENT_COUNT']->value==0))){?>class="noCommentContent"<?php }else{ ?>class="commentContent"<?php }?>><div id="commentsSwitcher"></div>
	<h3><?php echo l10n_dec('%d comment','%d comments',$_smarty_tpl->tpl_vars['COMMENT_COUNT']->value);?>
</h3>

	<div id="pictureComments">
<?php if (isset($_smarty_tpl->tpl_vars['comment_add']->value)){?>
		<div id="commentAdd">
			<h4><?php echo l10n('Add a comment');?>
</h4>
			<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['comment_add']->value['F_ACTION'];?>
" id="addComment">
<?php if ($_smarty_tpl->tpl_vars['comment_add']->value['SHOW_AUTHOR']){?>
					<!--<p><label for="author"><?php echo l10n('Author');?>
<?php if ($_smarty_tpl->tpl_vars['comment_add']->value['AUTHOR_MANDATORY']){?> (<?php echo l10n('mandatory');?>
)<?php }?> :</label></p>-->
					<p><input style="display:none" type="text" name="author" id="author" value="<?php echo $_smarty_tpl->tpl_vars['comment_add']->value['AUTHOR'];?>
"></p>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['comment_add']->value['SHOW_EMAIL']){?>
					<!--<p><label for="email"><?php echo l10n('Email address');?>
<?php if ($_smarty_tpl->tpl_vars['comment_add']->value['EMAIL_MANDATORY']){?> (<?php echo l10n('mandatory');?>
)<?php }?> :</label></p>-->
					<p><input style="display:none" type="text" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['comment_add']->value['EMAIL'];?>
"></p>
<?php }?>
				<!--<p><label for="website_url"><?php echo l10n('Website');?>
 :</label></p>-->
				<p style="display:none"><input type="text" class="form-control" name="website_url" id="website_url" value="<?php echo $_smarty_tpl->tpl_vars['comment_add']->value['WEBSITE_URL'];?>
"></p>
				<p><label for="contentid"><?php echo l10n('Comment');?>
 (<?php echo l10n('mandatory');?>
) :</label></p>
				<p><textarea name="content" class="form-control" id="contentid" rows="5" cols="50"><?php echo $_smarty_tpl->tpl_vars['comment_add']->value['CONTENT'];?>
</textarea></p>
				<p><input type="hidden" name="key" value="<?php echo $_smarty_tpl->tpl_vars['comment_add']->value['KEY'];?>
">
					<input type="submit" class="btn btn-default" value="<?php echo l10n('Submit');?>
"></p>
			</form>
		</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['comments']->value)){?>
		<div id="pictureCommentList">
<?php if ((($_smarty_tpl->tpl_vars['COMMENT_COUNT']->value>2)||!empty($_smarty_tpl->tpl_vars['navbar']->value))){?>
				<div id="pictureCommentNavBar">
<?php if ($_smarty_tpl->tpl_vars['COMMENT_COUNT']->value>2){?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['COMMENTS_ORDER_URL']->value;?>
#comments" rel="nofollow" class="commentsOrder"><?php echo $_smarty_tpl->tpl_vars['COMMENTS_ORDER_TITLE']->value;?>
</a>
<?php }?>
					<?php if (!empty($_smarty_tpl->tpl_vars['navbar']->value)){?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
				</div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ('comment_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
<?php }?>
		<div style="clear:both"></div>
	</div>

</div>
<?php }?>
<script>
   var imgurl  =document.getElementById("theMainImage").src
   var desc = document.getElementById("theMainImage").alt +"--来自贝壳图的相片，分享给大家。"
	window._bd_share_config = {
		common : {
			bdText : desc,	
			bdDesc :  '',	
			bdUrl :  window.location.href, 	
			bdPic :  imgurl
		},
		share : [{
			"bdSize" : 16
		}]
	}
	//以下为js加载部分
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>

<?php if (!empty($_smarty_tpl->tpl_vars['PLUGIN_PICTURE_AFTER']->value)){?><?php echo $_smarty_tpl->tpl_vars['PLUGIN_PICTURE_AFTER']->value;?>
<?php }?>

</div>
<?php }} ?>