<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:30:20
         compiled from "./admin/themes/default/template/photos_add_direct.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12264782465466f2fccd57c1-50796694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd885096b3fb5209b0f170b08b2499750c3667603' => 
    array (
      0 => './admin/themes/default/template/photos_add_direct.tpl',
      1 => 1386844495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12264782465466f2fccd57c1-50796694',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'upload_mode' => 0,
    'uploadify_path' => 0,
    'upload_id' => 0,
    'session_id' => 0,
    'pwg_token' => 0,
    'upload_max_filesize' => 0,
    'tif_enabled' => 0,
    'TABSHEET_TITLE' => 0,
    'setup_errors' => 0,
    'error' => 0,
    'setup_warnings' => 0,
    'warning' => 0,
    'hide_warnings_link' => 0,
    'thumbnails' => 0,
    'thumbnail' => 0,
    'batch_link' => 0,
    'batch_label' => 0,
    'another_upload_link' => 0,
    'form_action' => 0,
    'category_options' => 0,
    'category_options_selected' => 0,
    'original_resize_maxheight' => 0,
    'original_resize_maxwidth' => 0,
    'upload_max_filesize_shorthand' => 0,
    'upload_file_types' => 0,
    'max_upload_resolution' => 0,
    'max_upload_width' => 0,
    'max_upload_height' => 0,
    'switch_url' => 0,
    'level_options' => 0,
    'level_options_selected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f2fcdbe4a8_59467578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f2fcdbe4a8_59467578')) {function content_5466f2fcdbe4a8_59467578($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.jgrowl','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.jgrowl_minimized.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.uploadify','load'=>'footer','require'=>'jquery','path'=>'admin/include/uploadify/jquery.uploadify.v3.0.0.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ui.progressbar','load'=>'footer'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/plugins/jquery.jgrowl.css"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"admin/include/uploadify/uploadify.css"),$_smarty_tpl);?>

<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ('include/colorbox.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('include/add_album.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
  function checkUploadStart() {
    var nbErrors = 0;
    jQuery("#formErrors").hide();
    jQuery("#formErrors li").hide();

    if (jQuery("#albumSelect option:selected").length == 0) {
      jQuery("#formErrors #noAlbum").show();
      nbErrors++;
    }

    var nbFiles = 0;
    if (jQuery("#uploadBoxes").size() == 1) {
      jQuery("input[name^=image_upload]").each(function() {
        if (jQuery(this).val() != "") {
          nbFiles++;
        }
      });
    }
    else {
      nbFiles = jQuery(".uploadifyQueueItem").size();
    }

    if (nbFiles == 0) {
      jQuery("#formErrors #noPhoto").show();
      nbErrors++;
    }

    if (nbErrors != 0) {
      jQuery("#formErrors").show();
      return false;
    }
    else {
      return true;
    }

  }

  function humanReadableFileSize(bytes) {
    var byteSize = Math.round(bytes / 1024 * 100) * .01;
    var suffix = 'KB';

    if (byteSize > 1000) {
      byteSize = Math.round(byteSize *.001 * 100) * .01;
      suffix = 'MB';
    }

    var sizeParts = byteSize.toString().split('.');
    if (sizeParts.length > 1) {
      byteSize = sizeParts[0] + '.' + sizeParts[1].substr(0,2);
    }
    else {
      byteSize = sizeParts[0];
    }

    return byteSize+suffix;
  }

  jQuery("#hideErrors").click(function() {
    jQuery("#formErrors").hide();
    return false;
  });

  jQuery("#uploadWarningsSummary a.showInfo").click(function() {
    jQuery("#uploadWarningsSummary").hide();
    jQuery("#uploadWarnings").show();
    return false;
  });

  jQuery("#showPermissions").click(function() {
    jQuery(this).parent(".showFieldset").hide();
    jQuery("#permissions").show();
    return false;
  });


<?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='html'){?>

  function addUploadBox() {
    var uploadBox = '<p class="file"><input type="file" size="60" name="image_upload[]"></p>';
    jQuery(uploadBox).appendTo("#uploadBoxes");
  }

  addUploadBox();

  jQuery("#addUploadBox A").click(function () {
    addUploadBox();
  });

  jQuery("#uploadForm").submit(function() {
    return checkUploadStart();
  });

<?php }elseif($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>

var uploadify_path = '<?php echo $_smarty_tpl->tpl_vars['uploadify_path']->value;?>
';
var upload_id = '<?php echo $_smarty_tpl->tpl_vars['upload_id']->value;?>
';
var session_id = '<?php echo $_smarty_tpl->tpl_vars['session_id']->value;?>
';
var pwg_token = '<?php echo $_smarty_tpl->tpl_vars['pwg_token']->value;?>
';
var buttonText = "<?php echo l10n('Select files');?>
";
var sizeLimit = Math.round(<?php echo $_smarty_tpl->tpl_vars['upload_max_filesize']->value;?>
 / 1024); /* in KBytes */


  jQuery("#uploadify").uploadify({
    'uploader'       : uploadify_path + '/uploadify.php',
    'langFile'       : uploadify_path + '/uploadifyLang_en.js',
    'swf'            : uploadify_path + '/uploadify.swf',
    'checkExisting'  : false,

    buttonCursor     : 'pointer',
    'buttonText'     : buttonText,
    'width'          : 300,
    'cancelImage'    : uploadify_path + '/cancel.png',
    'queueID'        : 'fileQueue',
    'auto'           : false,
    'multi'          : true,
    'fileTypeDesc'   : 'Photo files',
    'fileTypeExts'   : '*.jpg;*.JPG;*.jpeg;*.JPEG;*.png;*.PNG;*.gif;*.GIF;<?php if ($_smarty_tpl->tpl_vars['tif_enabled']->value){?>*.tif;*.TIF;*.tiff;*.TIFF<?php }?>',
    'fileSizeLimit'  : sizeLimit,
    'progressData'   : 'percentage',
    requeueErrors   : false,
    'onSelect'       : function(event,ID,fileObj) {
      jQuery("#fileQueue").show();
    },
    'onQueueComplete'  : function(stats) {
      jQuery("input[name=submit_upload]").click();
    },
    onUploadError: function (file,errorCode,errorMsg,errorString,swfuploadifyQueue) {
      /* uploadify calls the onUploadError trigger when the user cancels a file! */
      /* There no error so we skip it to avoid panic.                            */
      if ("Cancelled" == errorString) {
        return false;
      }

      var msg = file.name+', '+errorString;

      /* Let's put the error message in the form to display once the form is     */
      /* performed, it makes support easier when user can copy/paste the error   */
      /* thrown.                                                                 */
      jQuery("#uploadForm").append('<input type="hidden" name="onUploadError[]" value="'+msg+'">');

      jQuery.jGrowl(
        '<p></p>onUploadError '+msg,
        {
          theme:  'error',
          header: 'ERROR',
          life:   4000,
          sticky: false
        }
      );

      return false;
    },
    onUploadSuccess: function (file,data,response) {
      var data = jQuery.parseJSON(data);
      jQuery("#uploadedPhotos").parent("fieldset").show();

      /* Let's display the thumbnail of the uploaded photo, no need to wait the  */
      /* end of the queue                                                        */
      jQuery("#uploadedPhotos").prepend('<img src="'+data.thumbnail_url+'" class="thumbnail"> ');
    },
    onUploadComplete: function(file,swfuploadifyQueue) {
      var max = parseInt(jQuery("#progressMax").text());
      var next = parseInt(jQuery("#progressCurrent").text())+1;
      var addToProgressBar = 2;
      if (next <= max) {
        jQuery("#progressCurrent").text(next);
      }
      else {
        addToProgressBar = 1;
      }

      jQuery("#progressbar").progressbar({
        value: jQuery("#progressbar").progressbar("option", "value") + addToProgressBar
      });
    }
  });

  jQuery("input[type=button]").click(function() {
    if (!checkUploadStart()) {
      return false;
    }

    jQuery("#uploadify").uploadifySettings(
      'postData',
      {
        'category_id' : jQuery("select[name=category] option:selected").val(),
        'level' : jQuery("select[name=level] option:selected").val(),
        'upload_id' : upload_id,
        'session_id' : session_id,
        'pwg_token' : pwg_token
      }
    );

    nb_files = jQuery(".uploadifyQueueItem").size();
    jQuery("#progressMax").text(nb_files);
    jQuery("#progressbar").progressbar({max: nb_files*2, value:1});
    jQuery("#progressCurrent").text(1);

    jQuery("#uploadProgress").show();

    jQuery("#uploadify").uploadifyUpload();
  });


<?php }?>
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="titrePage">
  <h2><?php echo l10n('Upload Photos');?>
 <?php echo $_smarty_tpl->tpl_vars['TABSHEET_TITLE']->value;?>
</h2>
</div>

<div id="photosAddContent">

<?php if (count($_smarty_tpl->tpl_vars['setup_errors']->value)>0){?>
<div class="errors">
  <ul>
<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['setup_errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
<?php } ?>
  </ul>
</div>
<?php }else{ ?>

<?php if (count($_smarty_tpl->tpl_vars['setup_warnings']->value)>0){?>
<div class="warnings">
  <ul>
<?php  $_smarty_tpl->tpl_vars['warning'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['warning']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['setup_warnings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->key => $_smarty_tpl->tpl_vars['warning']->value){
$_smarty_tpl->tpl_vars['warning']->_loop = true;
?>
    <li><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
</li>
<?php } ?>
  </ul>
  <div class="hideButton" style="text-align:center"><a href="<?php echo $_smarty_tpl->tpl_vars['hide_warnings_link']->value;?>
"><?php echo l10n('Hide');?>
</a></div>
</div>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['thumbnails']->value)){?>
<fieldset>
  <legend><?php echo l10n('Uploaded Photos');?>
</legend>
  <div>
<?php  $_smarty_tpl->tpl_vars['thumbnail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thumbnail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thumbnails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['thumbnail']->key => $_smarty_tpl->tpl_vars['thumbnail']->value){
$_smarty_tpl->tpl_vars['thumbnail']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['link'];?>
" class="externalLink">
      <img src="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['src'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['file'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['title'];?>
" class="thumbnail">
    </a>
<?php } ?>
  </div>
  <p id="batchLink"><a href="<?php echo $_smarty_tpl->tpl_vars['batch_link']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['batch_label']->value;?>
</a></p>
</fieldset>
<p style="margin:10px"><a href="<?php echo $_smarty_tpl->tpl_vars['another_upload_link']->value;?>
"><?php echo l10n('Add another set of photos');?>
</a></p>
<?php }else{ ?>

<div id="formErrors" class="errors" style="display:none">
  <ul>
    <li id="noAlbum"><?php echo l10n('Select an album');?>
</li>
    <li id="noPhoto"><?php echo l10n('Select at least one photo');?>
</li>
  </ul>
  <div class="hideButton" style="text-align:center"><a href="#" id="hideErrors"><?php echo l10n('Hide');?>
</a></div>
</div>


<form id="uploadForm" enctype="multipart/form-data" method="post" action="<?php echo $_smarty_tpl->tpl_vars['form_action']->value;?>
" class="properties">
<?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>
    <input name="upload_id" value="<?php echo $_smarty_tpl->tpl_vars['upload_id']->value;?>
" type="hidden">
<?php }?>

    <fieldset>
      <legend><?php echo l10n('Drop into album');?>
</legend>

      <span id="albumSelection"<?php if (count($_smarty_tpl->tpl_vars['category_options']->value)==0){?> style="display:none"<?php }?>>
      <select id="albumSelect" name="category">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_options']->value,'selected'=>$_smarty_tpl->tpl_vars['category_options_selected']->value),$_smarty_tpl);?>

      </select>
      <br><?php echo l10n('... or ');?>
</span><a href="#" class="addAlbumOpen" title="<?php echo l10n('create a new album');?>
"><?php echo l10n('create a new album');?>
</a>
      
    </fieldset>

    <fieldset>
      <legend><?php echo l10n('Select files');?>
</legend>
 
    <?php if (isset($_smarty_tpl->tpl_vars['original_resize_maxheight']->value)){?><p class="uploadInfo"><?php echo l10n('The picture dimensions will be reduced to %dx%d pixels.',$_smarty_tpl->tpl_vars['original_resize_maxwidth']->value,$_smarty_tpl->tpl_vars['original_resize_maxheight']->value);?>
</p><?php }?>

    <p id="uploadWarningsSummary"><?php echo $_smarty_tpl->tpl_vars['upload_max_filesize_shorthand']->value;?>
B. <?php echo $_smarty_tpl->tpl_vars['upload_file_types']->value;?>
. <?php if (isset($_smarty_tpl->tpl_vars['max_upload_resolution']->value)){?><?php echo $_smarty_tpl->tpl_vars['max_upload_resolution']->value;?>
Mpx<?php }?> <a class="icon-info-circled-1 showInfo" title="<?php echo l10n('Learn more');?>
"></a></p>

    <p id="uploadWarnings">
<?php echo l10n('Maximum file size: %sB.',$_smarty_tpl->tpl_vars['upload_max_filesize_shorthand']->value);?>

<?php echo l10n('Allowed file types: %s.',$_smarty_tpl->tpl_vars['upload_file_types']->value);?>

<?php if (isset($_smarty_tpl->tpl_vars['max_upload_resolution']->value)){?>
<?php echo l10n('Approximate maximum resolution: %dM pixels (that\'s %dx%d pixels).',$_smarty_tpl->tpl_vars['max_upload_resolution']->value,$_smarty_tpl->tpl_vars['max_upload_width']->value,$_smarty_tpl->tpl_vars['max_upload_height']->value);?>

<?php }?>
    </p>



<?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='html'){?>
      <div id="uploadBoxes"></div>
      <div id="addUploadBox">
        <a href="javascript:"><?php echo l10n('+ Add an upload box');?>
</a>
      </div>

    <p id="uploadModeInfos"><?php echo l10n('You are using the Browser uploader. Try the <a href="%s">Flash uploader</a> instead.',$_smarty_tpl->tpl_vars['switch_url']->value);?>
</p>

<?php }elseif($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>
    <div id="uploadify">You've got a problem with your JavaScript</div> 

    <div id="fileQueue" style="display:none"></div>

    <p id="uploadModeInfos"><?php echo l10n('You are using the Flash uploader. Problems? Try the <a href="%s">Browser uploader</a> instead.',$_smarty_tpl->tpl_vars['switch_url']->value);?>
</p>

<?php }?>
    </fieldset>

    <p class="showFieldset"><a id="showPermissions" href="#"><?php echo l10n('Manage Permissions');?>
</a></p>

    <fieldset id="permissions" style="display:none">
      <legend><?php echo l10n('Who can see these photos?');?>
</legend>

      <select name="level" size="1">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['level_options']->value,'selected'=>$_smarty_tpl->tpl_vars['level_options_selected']->value),$_smarty_tpl);?>

      </select>
    </fieldset>

<?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='html'){?>
    <p>
      <input class="submit" type="submit" name="submit_upload" value="<?php echo l10n('Start Upload');?>
">
    </p>
<?php }elseif($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>
    <p style="margin-bottom:1em">
      <input class="submit" type="button" value="<?php echo l10n('Start Upload');?>
">
      <input type="submit" name="submit_upload" style="display:none">
    </p>
<?php }?>
</form>

<div id="uploadProgress" style="display:none">
<?php echo l10n('Photo %s of %s','<span id="progressCurrent">1</span>','<span id="progressMax">10</span>');?>

<br>
<div id="progressbar"></div>
</div>

<fieldset style="display:none">
  <legend><?php echo l10n('Uploaded Photos');?>
</legend>
  <div id="uploadedPhotos"></div>
</fieldset>

<?php }?> 
<?php }?> 

</div> <!-- photosAddContent -->
<?php }} ?>