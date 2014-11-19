<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:24:52
         compiled from "/var/www/html/piwigo/plugins/community/add_photos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20228607315466c8d2c0a6b2-25608051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b252051982dbafb48b5ccdb3ff1bae347d95c65c' => 
    array (
      0 => '/var/www/html/piwigo/plugins/community/add_photos.tpl',
      1 => 1416101079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20228607315466c8d2c0a6b2-25608051',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8d2d1d206_09599032',
  'variables' => 
  array (
    'upload_mode' => 0,
    'limit_nb_photos' => 0,
    'uploadify_path' => 0,
    'upload_id' => 0,
    'session_id' => 0,
    'pwg_token' => 0,
    'upload_max_filesize' => 0,
    'limit_storage' => 0,
    'uploadify_fileTypeExts' => 0,
    'setup_errors' => 0,
    'error' => 0,
    'setup_warnings' => 0,
    'warning' => 0,
    'hide_warnings_link' => 0,
    'thumbnails' => 0,
    'thumbnail' => 0,
    'another_upload_link' => 0,
    'category_parent_options' => 0,
    'category_parent_options_selected' => 0,
    'form_action' => 0,
    'category_options' => 0,
    'category_options_selected' => 0,
    'create_subcategories' => 0,
    'upload_max_filesize_shorthand' => 0,
    'upload_file_types' => 0,
    'max_upload_resolution' => 0,
    'quota_summary' => 0,
    'max_upload_width' => 0,
    'max_upload_height' => 0,
    'quota_details' => 0,
    'switch_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8d2d1d206_09599032')) {function content_5466c8d2d1d206_09599032($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.jgrowl','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.jgrowl_minimized.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.uploadify','load'=>'footer','require'=>'jquery','path'=>'admin/include/uploadify/jquery.uploadify.v3.0.0.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ui.progressbar','load'=>'footer'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/plugins/jquery.jgrowl.css"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"admin/include/uploadify/uploadify.css"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/becktu/theme.css"),$_smarty_tpl);?>

 
<?php }?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.colorbox','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.colorbox.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/plugins/colorbox/style2/colorbox.css"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
function sprintf() {
        var i = 0, a, f = arguments[i++], o = [], m, p, c, x, s = '';
        while (f) {
                if (m = /^[^\x25]+/.exec(f)) {
                        o.push(m[0]);
                }
                else if (m = /^\x25{2}/.exec(f)) {
                        o.push('%');
                }
                else if (m = /^\x25(?:(\d+)\$)?(\+)?(0|'[^$])?(-)?(\d+)?(?:\.(\d+))?([b-fosuxX])/.exec(f)) {
                        if (((a = arguments[m[1] || i++]) == null) || (a == undefined)) {
                                throw('Too few arguments.');
                        }
                        if (/[^s]/.test(m[7]) && (typeof(a) != 'number')) {
                                throw('Expecting number but found ' + typeof(a));
                        }
                        switch (m[7]) {
                                case 'b': a = a.toString(2); break;
                                case 'c': a = String.fromCharCode(a); break;
                                case 'd': a = parseInt(a); break;
                                case 'e': a = m[6] ? a.toExponential(m[6]) : a.toExponential(); break;
                                case 'f': a = m[6] ? parseFloat(a).toFixed(m[6]) : parseFloat(a); break;
                                case 'o': a = a.toString(8); break;
                                case 's': a = ((a = String(a)) && m[6] ? a.substring(0, m[6]) : a); break;
                                case 'u': a = Math.abs(a); break;
                                case 'x': a = a.toString(16); break;
                                case 'X': a = a.toString(16).toUpperCase(); break;
                        }
                        a = (/[def]/.test(m[7]) && m[2] && a >= 0 ? '+'+ a : a);
                        c = m[3] ? m[3] == '0' ? '0' : m[3].charAt(1) : ' ';
                        x = m[5] - String(a).length - s.length;
                        p = m[5] ? str_repeat(c, x) : '';
                        o.push(s + (m[4] ? a + p : p + a));
                }
                else {
                        throw('Huh ?!');
                }
                f = f.substring(m[0].length);
        }
        return o.join('');
}

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

  function fillCategoryListbox(selectId, selectedValue) {
    jQuery.getJSON(
      "ws.php?format=json&method=pwg.categories.getList",
      {
        recursive: true,
        fullname: true,
        format: "json",
      },
      function(data) {
        jQuery.each(
          data.result.categories,
          function(i,category) {
            var selected = null;
            if (category.id == selectedValue) {
              selected = "selected";
            }
            
            jQuery("<option/>")
              .attr("value", category.id)
              .attr("selected", selected)
              .text(category.name)
              .appendTo("#"+selectId)
              ;
          }
        );
      }
    );
  }

  jQuery(".addAlbumOpen").colorbox({
    inline:true,
    innerWidth:"400px",
    href:"#addAlbumForm",
    className:"addAlbumDlg",

    onComplete:function(){
      jQuery("input[name=category_name]").focus();
    }
  });

  jQuery("#addAlbumForm form").submit(function(){
      jQuery("#categoryNameError").text("");

      jQuery.ajax({
        url: "ws.php?format=json&method=pwg.categories.add",
        data: {
          parent: jQuery("select[name=category_parent] option:selected").val(),
          name: jQuery("input[name=category_name]").val(),
          comment: jQuery("textarea[name=category_description]").val(),
        },
        beforeSend: function() {
          jQuery("#albumCreationLoading").show();
        },
        success:function(html) {
          jQuery("#albumCreationLoading").hide();

          var newAlbum = jQuery.parseJSON(html).result.id;
          jQuery(".addAlbumOpen").colorbox.close();

          jQuery("#albumSelect").find("option").remove();
          fillCategoryListbox("albumSelect", newAlbum);

          jQuery(".albumSelection").show();

          /* we hide the ability to create another album, this is different from the admin upload form */
          /* in Community, it's complicated to refresh the list of parent albums                       */
          jQuery("#linkToCreate").hide();

          return true;
        },
        error:function(XMLHttpRequest, textStatus, errorThrows) {
            jQuery("#albumCreationLoading").hide();
            jQuery("#categoryNameError").text(errorThrows).css("color", "red");
        }
      });

      return false;
  });
 
  jQuery("#hideErrors").click(function() {
    jQuery("#formErrors").hide();
    return false;
  });

  jQuery("#uploadWarningsSummary a.showInfo").click(function() {
    jQuery("#uploadWarningsSummary").hide();
    jQuery("#uploadWarnings").show();
  });

  jQuery("#showPermissions").click(function() {
    jQuery(this).parent(".showFieldset").hide();
    jQuery("#permissions").show();
  });

  jQuery("#showPhotoProperties").click(function() {
    jQuery(this).parent(".showFieldset").hide();
    jQuery("#photoProperties").show();
    jQuery("input[name=set_photo_properties]").prop('checked', true);
  });


<?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='html'){?>
<?php if (isset($_smarty_tpl->tpl_vars['limit_nb_photos']->value)){?>
  var limit_nb_photos = <?php echo $_smarty_tpl->tpl_vars['limit_nb_photos']->value;?>
;
<?php }?>


  function addUploadBox() {
    var uploadBox = '<p class="file"><input type="file" size="60" name="image_upload[]"></p>';
    jQuery(uploadBox).appendTo("#uploadBoxes");

    if (typeof limit_nb_photos != 'undefined') {
      if (jQuery("input[name^=image_upload]").size() >= limit_nb_photos) {
        jQuery("#addUploadBox").hide();
      }
    }
  }

  addUploadBox();

  jQuery("#addUploadBox A").click(function () {
    if (typeof limit_nb_photos != 'undefined') {
      if (jQuery("input[name^=image_upload]").size() >= limit_nb_photos) {
        alert('tu rigoles mon gaillard !');
        return false;
      }
    }

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
var sumQueueFilesize = 0;
<?php if (isset($_smarty_tpl->tpl_vars['limit_storage']->value)){?>
var limit_storage = <?php echo $_smarty_tpl->tpl_vars['limit_storage']->value;?>
;
<?php }?>

  jQuery("#uploadify").uploadify({
    'uploader'       : uploadify_path + '/uploadify.php',
    'langFile'       : uploadify_path + '/uploadifyLang_en.js',
    'swf'            : uploadify_path + '/uploadify.swf',

    buttonCursor     : 'pointer',
    'buttonText'     : buttonText,
    'width'          : 300,
    'cancelImage'    : uploadify_path + '/cancel.png',
    'queueID'        : 'fileQueue',
    'auto'           : false,
    'multi'          : true,
    'fileTypeDesc'   : 'Photo files',
    'fileTypeExts'   : '<?php echo $_smarty_tpl->tpl_vars['uploadify_fileTypeExts']->value;?>
',
    'fileSizeLimit'  : sizeLimit,
    'progressData'   : 'percentage',

<?php if (isset($_smarty_tpl->tpl_vars['limit_nb_photos']->value)){?>
    'queueSizeLimit' : <?php echo $_smarty_tpl->tpl_vars['limit_nb_photos']->value;?>
,
<?php }?>

    requeueErrors   : false,
    'onSelect'       : function(file) {
      console.log('filesize = '+file.size+'bytes');

      if (typeof limit_storage != 'undefined') {
        if (sumQueueFilesize + file.size > limit_storage) {
          jQuery.jGrowl(
            '<p></p>'+sprintf(
              '<?php echo l10n('File %s too big (%uMB), quota of %uMB exceeded');?>
',
              file.name,
              Math.round(file.size/(1024*1024)),
              limit_storage/(1024*1024)
            ),
            {
              theme:  'error',
              header: 'ERROR',
              life:   4000,
              sticky: false
            }
          );

          jQuery('#uploadify').uploadifyCancel(file.id);
          return false;
        }
        else {
          sumQueueFilesize += file.size;
        }
      }

      jQuery("#fileQueue").show();
    },
    'onCancel' : function(file) {
      console.log('The file ' + file.name + ' was cancelled ('+file.size+')');
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
        'pwg_token' : pwg_token,
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



<style type="text/css">
/*
#photosAddContent form p {
  text-align:left;
}
*/

#photosAddContent FIELDSET {
  width:650px;
  margin:20px auto;
}

#photosAddContent fieldset#photoProperties {padding-bottom:0}
#photosAddContent fieldset#photoProperties p {text-align:left;margin:0 0 1em 0;line-height:20px;}
#photosAddContent fieldset#photoProperties input[type="text"] {width:320px}
#photosAddContent fieldset#photoProperties textarea {width:500px; height:100px}

#photosAddContent P {
  margin:0;
}

#uploadBoxes P {
  margin:0;
  margin-bottom:2px;
  padding:0;
}

#uploadBoxes .file {margin-bottom:5px;text-align:left;}
#uploadBoxes {margin-top:20px;}
#addUploadBox {margin-bottom:2em;}

p#uploadWarningsSummary {text-align:left;margin-bottom:1em;font-size:90%;color:#999;}
p#uploadWarningsSummary .showInfo {position:static;display:inline;padding:1px 6px;margin-left:3px;}
p#uploadWarnings {display:none;text-align:left;margin-bottom:1em;font-size:90%;color:#999;}
p#uploadModeInfos {text-align:left;margin-top:1em;font-size:90%;color:#999;}

#photosAddContent p.showFieldset {text-align:left;margin:0  auto 10px auto;width: 630px;font-size:12px;}

#uploadProgress {width:650px; margin:10px auto;font-size:90%;}
#progressbar {border:1px solid #ccc; background-color:#eee;}
.ui-progressbar-value { background-image: url(admin/themes/default/images/pbar-ani.gif); height:10px;margin:-1px;border:1px solid #E78F08;}

.showInfo {display:block;position:absolute;top:0;right:5px;width:15px;font-style:italic;font-family:"Georgia",serif;background-color:#464646;font-size:0.9em;border-radius:10px;-moz-border-radius:10px;}
.showInfo:hover {cursor:pointer}
.showInfo {color:#fff;background-color:#999; }
.showInfo:hover {color:#fff;border:none;background-color:#333} 
</style>


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
 <!-- <legend><?php echo l10n('Uploaded Photos');?>
</legend>-->
  <div style="font-size:22px;font-weight:normal;padding:0px 0px 30px 0px;"><span><?php echo l10n('Uploaded Photos');?>
</span></div>
  <div>
<?php  $_smarty_tpl->tpl_vars['thumbnail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thumbnail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thumbnails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['thumbnail']->key => $_smarty_tpl->tpl_vars['thumbnail']->value){
$_smarty_tpl->tpl_vars['thumbnail']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['link'];?>
"  class="<?php if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['lightbox'])){?>colorboxThumb<?php }else{ ?>externalLink<?php }?>">
      <img src="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['src'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['file'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['title'];?>
" class="thumbnail">
    </a>
<?php } ?>
  </div>
</fieldset>
<div style="width:60%;text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['another_upload_link']->value;?>
"><?php echo l10n('Add another set of photos');?>
</a></div>
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

<div style="display:none">
  <div id="addAlbumForm" style="text-align:left;padding:1em;font-size:12px;font-family: Microsoft YaHei;">
    <form>
      <!--
      <?php echo l10n('Parent album');?>
<br>-->
      <select style="display:none" id ="category_parent" name="category_parent" class="form-control">
        <option value="0">------------</option>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_parent_options']->value,'selected'=>$_smarty_tpl->tpl_vars['category_parent_options_selected']->value),$_smarty_tpl);?>

      </select>
      <br><br><?php echo l10n('Album name');?>
<br><input name="category_name" class="form-control"><span id="categoryNameError"></span>
      <br><br><?php echo l10n('Album description');?>
<br><textarea name="category_description" rows="3"  class="form-control"></textarea>  <span id="categoryNameError"></span>
      <br><br><br><input type="submit" class="btn btn-primary" value="<?php echo l10n('Create');?>
"> <span id="albumCreationLoading" style="display:none"><img src="themes/default/images/ajax-loader-small.gif"></span>
    </form>
  </div>
</div>


<form id="uploadForm" enctype="multipart/form-data" method="post" action="<?php echo $_smarty_tpl->tpl_vars['form_action']->value;?>
" class="properties">
<?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>
    <input name="upload_id" value="<?php echo $_smarty_tpl->tpl_vars['upload_id']->value;?>
" type="hidden">
<?php }?>

    <fieldset>                                                      
      <!--<legend><?php echo l10n('Drop into album');?>
</legend>-->
      <div style="font-size:22px;font-weight:normal;padding:0px 0px 15px 0px;"><span>选择相册</span></div>
      <span class="albumSelection"<?php if (count($_smarty_tpl->tpl_vars['category_options']->value)==0){?> style="display:none"<?php }?>>
      <select id="albumSelect" name="category" class="form-control" style="width:22%" >
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_options']->value,'selected'=>$_smarty_tpl->tpl_vars['category_options_selected']->value),$_smarty_tpl);?>

      </select>
<?php if ($_smarty_tpl->tpl_vars['create_subcategories']->value){?>
      <div id="linkToCreate" class="linkToCreate">
      <a href="#" class="addAlbumOpen" title="<?php echo l10n('create a new album');?>
"><strong>+</strong><?php echo l10n('create a new album');?>
</a>
      </div>
<?php }?>
      </span>
     
    </fieldset>

    <fieldset>
     <!--<legend><?php echo l10n('Select files');?>
</legend>-->
<div style="font-size:22px;font-weight:normal;padding:10px 0px 15px 0px;"><span><?php echo l10n('Select files');?>
</span></div>
    <p id="uploadWarningsSummary"><?php echo $_smarty_tpl->tpl_vars['upload_max_filesize_shorthand']->value;?>
B. <?php echo $_smarty_tpl->tpl_vars['upload_file_types']->value;?>
. <?php if (isset($_smarty_tpl->tpl_vars['max_upload_resolution']->value)){?><?php echo $_smarty_tpl->tpl_vars['max_upload_resolution']->value;?>
Mpx.<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['quota_summary']->value)){?><?php echo $_smarty_tpl->tpl_vars['quota_summary']->value;?>
<?php }?>
<a class="showInfo" title="<?php echo l10n('Learn more');?>
">i</a></p>

    <p id="uploadWarnings">
<?php echo sprintf(l10n('Maximum file size: %sB.'),$_smarty_tpl->tpl_vars['upload_max_filesize_shorthand']->value);?>

<?php echo sprintf(l10n('Allowed file types: %s.'),$_smarty_tpl->tpl_vars['upload_file_types']->value);?>

<?php if (isset($_smarty_tpl->tpl_vars['max_upload_resolution']->value)){?>
<?php echo sprintf(l10n('Approximate maximum resolution: %dM pixels (that\'s %dx%d pixels).'),$_smarty_tpl->tpl_vars['max_upload_resolution']->value,$_smarty_tpl->tpl_vars['max_upload_width']->value,$_smarty_tpl->tpl_vars['max_upload_height']->value);?>

<?php }?>
<?php echo $_smarty_tpl->tpl_vars['quota_details']->value;?>

    </p>

<?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='html'){?>
      <div id="uploadBoxes"></div>
      <div id="addUploadBox">
        <a href="javascript:"><?php echo l10n('+ Add an upload box');?>
</a>
      </div>

    <p id="uploadModeInfos"><?php echo sprintf(l10n('You are using the Browser uploader. Try the <a href="%s">Flash uploader</a> instead.'),$_smarty_tpl->tpl_vars['switch_url']->value);?>
</p>

<?php }elseif($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>
    <div id="uploadify">You've got a problem with your JavaScript</div> 

    <div id="fileQueue" style="display:none"></div>

    <p id="uploadModeInfos"><?php echo sprintf(l10n('You are using the Flash uploader. Problems? Try the <a href="%s">Browser uploader</a> instead.'),$_smarty_tpl->tpl_vars['switch_url']->value);?>
</p>

<?php }?>
    </fieldset>
 
    <p class="showFieldset"><a id="showPhotoProperties" href="#"><?php echo l10n('Set Photo Properties');?>
</a></p>

    <fieldset id="photoProperties" style="display:none">
      <!--<legend><?php echo l10n('Photo Properties');?>
</legend>-->
      <div style="font-size:22px;font-weight:normal;padding:10px 0px 15px 0px;"><span><?php echo l10n('Photo Properties');?>
</span></div>
      <input type="checkbox" name="set_photo_properties" style="display:none">

      <p>
        <?php echo l10n('Title');?>
<br>
        <input type="text" class="form-control" name="name" value="">
      </p>

      <p>
        <?php echo l10n('Author');?>
<br>
        <input type="text" class="form-control" name="author" value="">
      </p>

      <p>
        <?php echo l10n('Description');?>
<br>
        <textarea name="description" id="description" class="description form-control" style="margin:0"></textarea>
      </p>

    </fieldset>

<?php if ($_smarty_tpl->tpl_vars['upload_mode']->value=='html'){?>
    <p>
      <input class="btn btn-primary" style="color:#fff" type="submit" name="submit_upload" value="<?php echo l10n('Start Upload');?>
">
    </p>
<?php }elseif($_smarty_tpl->tpl_vars['upload_mode']->value=='multiple'){?>
    <p style="margin-bottom:1em">
      <input class="btn btn-primary" style="color:#fff" type="button" value="<?php echo l10n('Start Upload');?>
">
      <input type="submit" name="submit_upload" style="display:none">
    </p>
<?php }?>
</form>


<div id="uploadProgress" style="display:none">
<?php echo sprintf(l10n('Photo %s of %s'),'<span id="progressCurrent">1</span>','<span id="progressMax">10</span>');?>

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


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
  jQuery("a.colorboxThumb").colorbox({rel:"colorboxThumb"});

  jQuery("a.externalLink").click(function() {
    window.open($(this).attr("href"));
    return false;
  });
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>