<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:24:51
         compiled from "/var/www/html/piwigo/plugins/GThumb/template/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193992370354670dd3186051-20239135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c160af1c996b91b4b93ac12a3856d7315d554e8c' => 
    array (
      0 => '/var/www/html/piwigo/plugins/GThumb/template/admin.tpl',
      1 => 1387781522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193992370354670dd3186051-20239135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEIGHT' => 0,
    'MARGIN' => 0,
    'NB_IMAGE_PAGE' => 0,
    'BIG_THUMB' => 0,
    'CACHE_BIG_THUMB' => 0,
    'METHOD' => 0,
    'SHOW_THUMBNAIL_CAPTION' => 0,
    'PWG_TOKEN' => 0,
    'ROOT_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670dd31fbf85_97979731',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670dd31fbf85_97979731')) {function content_54670dd31fbf85_97979731($_smarty_tpl) {?><div class="titrePage">
<h2>GThumb+</h2>
</div>

<form action="" method="post">

<fieldset id="GThumb">
<legend><?php echo l10n('Configuration');?>
</legend>
<table>
  <tr>
    <td align="right"><?php echo l10n('Thumbnails max height');?>
 : &nbsp;&nbsp;</td>
    <td><input type="text" size="2" maxlength="3" name="height" value="<?php echo $_smarty_tpl->tpl_vars['HEIGHT']->value;?>
">&nbsp;px</td></td>
  </tr>

  <tr>
    <td align="right"><?php echo l10n('Margin between thumbnails');?>
 : &nbsp;&nbsp;</td>
    <td><input type="text" size="2" maxlength="3" name="margin" value="<?php echo $_smarty_tpl->tpl_vars['MARGIN']->value;?>
">&nbsp;px</td>
  </tr>

  <tr>
    <td align="right"><?php echo l10n('Number of photos per page');?>
 : &nbsp;&nbsp;</td>
    <td><input type="text" size="2" maxlength="3" name="nb_image_page" value="<?php echo $_smarty_tpl->tpl_vars['NB_IMAGE_PAGE']->value;?>
"></td>
  </tr>

  <tr>
    <td align="right"><?php echo l10n('Double the size of the first thumbnail');?>
 : &nbsp;&nbsp;</td>
    <td><label><input type="radio" name="big_thumb" value="1" <?php if ($_smarty_tpl->tpl_vars['BIG_THUMB']->value){?>checked="checked"<?php }?>> <?php echo l10n('Yes');?>
</label> &nbsp;
        <label><input type="radio" name="big_thumb" value="0" <?php if (!$_smarty_tpl->tpl_vars['BIG_THUMB']->value){?>checked="checked"<?php }?>> <?php echo l10n('No');?>
</label>
    </td>
  </tr>

  <tr>
    <td align="right"><?php echo l10n('Cache the big thumbnails (recommended)');?>
 : &nbsp;&nbsp;</td>
    <td><label><input type="radio" name="cache_big_thumb" value="1" <?php if ($_smarty_tpl->tpl_vars['CACHE_BIG_THUMB']->value){?>checked="checked"<?php }?>> <?php echo l10n('Yes');?>
</label> &nbsp;
        <label><input type="radio" name="cache_big_thumb" value="0" <?php if (!$_smarty_tpl->tpl_vars['CACHE_BIG_THUMB']->value){?>checked="checked"<?php }?>> <?php echo l10n('No');?>
</label>
    </td>
  </tr>

  <tr>
    <td align="right"><?php echo l10n('Scale thumbnails');?>
 : &nbsp;&nbsp;</td>
    <td><label><input type="radio" name="method" value="crop" <?php if ($_smarty_tpl->tpl_vars['METHOD']->value=='crop'){?>checked="checked"<?php }?>> <?php echo l10n('Crop');?>
</label> &nbsp;
        <label><input type="radio" name="method" value="resize" <?php if ($_smarty_tpl->tpl_vars['METHOD']->value=='resize'){?>checked="checked"<?php }?>> <?php echo l10n('Resize');?>
</label>
    </td>
  </tr>
  
  <tr>
    <td align="right"><?php echo l10n('Show thumbnails caption');?>
 : &nbsp;&nbsp;</td>
    <td><label><input type="radio" name="show_thumbnail_caption" value="1" <?php if ($_smarty_tpl->tpl_vars['SHOW_THUMBNAIL_CAPTION']->value){?>checked="checked"<?php }?>> <?php echo l10n('Yes');?>
</label> &nbsp;
        <label><input type="radio" name="show_thumbnail_caption" value="0" <?php if (!$_smarty_tpl->tpl_vars['SHOW_THUMBNAIL_CAPTION']->value){?>checked="checked"<?php }?>> <?php echo l10n('No');?>
</label>
    </td>
  </tr>

</table>
</fieldset>

<p>
  <input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">
  <input type="submit" name="submit" value="<?php echo l10n('Submit');?>
">
  <input type="submit" name="cachedelete" value="<?php echo l10n('Purge thumbnails cache');?>
" title="<?php echo l10n('Delete images in GThumb+ cache.');?>
" onclick="return confirm('<?php echo l10n('Are you sure?');?>
');">
  <input type="button" name="cachebuild" value="<?php echo l10n('Pre-cache thumbnails');?>
" title="<?php echo l10n('Finds images that have not been cached and creates the cached version.');?>
" onclick="start()">
</p>
</form>

<fieldset id="generate_cache">
<legend><?php echo l10n('Pre-cache thumbnails');?>
</legend>
<p>
	<input id="startLink" value="<?php echo l10n('Start');?>
" onclick="start()" type="button">
	<input id="pauseLink" value="<?php echo l10n('Pause');?>
" onclick="pause()" type="button" disabled="disbled">
	<input id="stopLink" value="<?php echo l10n('Stop');?>
" onclick="stop()" type="button" disabled="disbled">
</p>
<p>
<table>
	<tr>
		<td>Errors</td>
		<td id="errors">0</td>
	</tr>
	<tr>
		<td>Loaded</td>
		<td id="loaded">0</td>
	</tr>
	<tr>
		<td>Remaining</td>
		<td id="remaining">0</td>
	</tr>
</table>
</p>
<div id="feedbackWrap" style="height:<?php echo $_smarty_tpl->tpl_vars['HEIGHT']->value;?>
px; min-height:<?php echo $_smarty_tpl->tpl_vars['HEIGHT']->value;?>
px;">
<img id="feedbackImg">
</div>

<div id="errorList">
</div>
</fieldset>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('html_head', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<style type="text/css">
#GThumb td { padding-bottom: 12px; }
#cacheinfo p, #GThumbProgressbar { text-align:left; line-height:20px; margin:20px }
.ui-progressbar-value { background-image: url(plugins/GThumb/template/pbar-ani.gif); }
#generate_cache { display: none; }
</style>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'iloader','load'=>'footer','path'=>'plugins/GThumb/js/image.loader.js'),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.ui.effect-slide')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.effect-slide'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery('input[name^="cache"]').tipTip({'delay' : 0, 'fadeIn' : 200, 'fadeOut' : 200});

var loader = new ImageLoader( {onChanged: loaderChanged, maxRequests:1 } )
	, pending_next_page = null
	, last_image_show_time = 0
	, allDoneDfd, urlDfd;

function start() {
	allDoneDfd = jQuery.Deferred();
	urlDfd = jQuery.Deferred();

	allDoneDfd.always( function() {
			jQuery("#startLink").attr('disabled', false).css("opacity", 1);
			jQuery("#pauseLink,#stopLink").attr('disabled', true).css("opacity", 0.5);
		} );

	urlDfd.always( function() {
		if (loader.remaining()==0)
			allDoneDfd.resolve();
		} );

  jQuery('#generate_cache').show();
	jQuery("#startLink").attr('disabled', true).css("opacity", 0.5);
	jQuery("#pauseLink,#stopLink").attr('disabled', false).css("opacity", 1);

	loader.pause(false);
	updateStats();
	getUrls(0);
}

function pause() {
	loader.pause( !loader.pause() );
}

function stop() {
	loader.clear();
	urlDfd.resolve();
}

function getUrls(page_token) {
	data = {prev_page: page_token, max_urls: 500, types: []};
	jQuery.post( '<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
admin.php?page=plugin-GThumb&getMissingDerivative=',
		data, wsData, "json").fail( wsError );
}

function wsData(data) {
	loader.add( data.urls );
	if (data.next_page) {
		if (loader.pause() || loader.remaining() > 100) {
			pending_next_page = data.next_page;
		}
		else {
			getUrls(data.next_page);
		}
	}
}

function wsError() {
	urlDfd.reject();
}

function updateStats() {
	jQuery("#loaded").text( loader.loaded );
	jQuery("#errors").text( loader.errors );
	jQuery("#remaining").text( loader.remaining() );
}

function loaderChanged(type, img) {
	updateStats();
	if (img) {
		if (type==="load") {
			var now = jQuery.now();
			if (now - last_image_show_time > 3000) {
				last_image_show_time = now;
				var h=img.height, url=img.src;
				jQuery("#feedbackWrap").hide("slide", {direction:'down'}, function() {
					last_image_show_time = jQuery.now();
					if (h > 300 )
						jQuery("#feedbackImg").attr("height", 300);
					else
						jQuery("#feedbackImg").removeAttr("height");
					jQuery("#feedbackImg").attr("src", url);
					jQuery("#feedbackWrap").show("slide", {direction:'up'} );
					} );
			}
		}
		else {
			jQuery("#errorList").prepend( '<a href="'+img.src+'">'+img.src+'</a>' + "<br>");
		}
	}
	if (pending_next_page && 100 > loader.remaining() )	{
		getUrls(pending_next_page);
		pending_next_page = null;
	}
	else if (loader.remaining() == 0 && (urlDfd.isResolved() || urlDfd.isRejected()))	{
		allDoneDfd.resolve();
	}
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.effect-slide'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>