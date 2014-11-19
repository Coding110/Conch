<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:27:10
         compiled from "/var/www/html/piwigo/plugins/community/admin_permissions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112682750454670e5e81d6b5-62381700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '208360c6ade9f70b71bd3afc9edc496c3afe3b17' => 
    array (
      0 => '/var/www/html/piwigo/plugins/community/admin_permissions.tpl',
      1 => 1391004310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112682750454670e5e81d6b5-62381700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'edit' => 0,
    'F_ADD_ACTION' => 0,
    'who_options' => 0,
    'who_options_selected' => 0,
    'user_options_selected' => 0,
    'user_options' => 0,
    'group_options_selected' => 0,
    'group_options' => 0,
    'community_conf' => 0,
    'user_album_selected' => 0,
    'whole_gallery_selected' => 0,
    'category_options' => 0,
    'category_options_selected' => 0,
    'recursive' => 0,
    'create_subcategories' => 0,
    'moderated' => 0,
    'nb_photos' => 0,
    'storage' => 0,
    'permissions' => 0,
    'permission' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670e5e904273_72371853',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670e5e904273_72371853')) {function content_54670e5e904273_72371853($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ui.slider','require'=>'jquery.ui','load'=>'footer','path'=>'themes/default/js/ui/minified/jquery.ui.slider.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/ui/theme/jquery.ui.slider.css"),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'common','load'=>'footer','path'=>'admin/themes/default/js/common.js'),$_smarty_tpl);?>



<style>
form fieldset p {text-align:left;margin:0 0 1.5em 0;line-height:20px;}
.permissionActions {text-align:center;height:20px}
.permissionActions a:hover {border:none}
.permissionActions img {margin-bottom:-2px}
.rowSelected {background-color:#C2F5C2 !important}
#community_nb_photos, #community_storage {width:400px; display:inline-block; margin-right:10px;}
</style>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


$(document).ready(function() {
  $("select[name=who]").change(function () {
    $("[name^=who_]").hide();
    $("[name=who_"+$(this).prop("value")+"]").show();
    checkWhoOptions();
  });

  function checkWhoOptions() {
    if ('any_visitor' == $("select[name=who] option:selected").val()) {
      $("#userAlbumOption").attr("disabled", true);
      $("#userAlbumInfo").hide();

      if (-1 == $("select[name=category] option:selected").val()) {
        $("select[name=category]").val("0");
        checkWhereOptions();
      }
    }
    else {
      $("#userAlbumOption").attr("disabled", false);
      $("#userAlbumInfo").show();
    }
  }
  checkWhoOptions();

  function checkWhereOptions() {
    var recursive = $("input[name=recursive]");
    var create = $("input[name=create_subcategories]");

    if ($("select[name=category] option:selected").val() == 0) {
      $(recursive).attr("disabled", true);
      $(recursive).attr('checked', true);
    }
    else if ($("select[name=category] option:selected").val() == -1) {
      /* user upload only */
      $(recursive).attr("disabled", true).attr('checked', false);
      $(create).attr("disabled", true).attr('checked', false);
    }
    else {
      $(recursive).removeAttr("disabled");
    }

    if (!$(recursive).is(':checked')) {
      $(create).attr('checked', false);
      $(create).attr("disabled", true);
    }
    else {
      $(create).removeAttr("disabled");
    }
  }

  checkWhereOptions();

  $("select[name=category]").change(function() {
    checkWhereOptions();
  });

  $("input[name=recursive]").change(function() {
    checkWhereOptions();
  });

  $("#displayForm").click(function() {
    $("[name=add_permission]").show();
    $(this).hide();
    return false;
  });

  /* ∞ */
  /**
   * find the key from a value in the startStopValues array
   */
  function getSliderKeyFromValue(value, values) {
    for (var key in values) {
      if (values[key] == value) {
        return key;
      }
    }
    return 0;
  }

  var nbPhotosValues = [5,10,20,50,100,500,1000,5000,-1];

  function getNbPhotosInfoFromIdx(idx) {
    if (idx == nbPhotosValues.length - 1) {
      return "<?php echo l10n('no limit');?>
";
    }

    return sprintf(
      "<?php echo l10n('up to %d photos (for each user)');?>
",
      nbPhotosValues[idx]
    );
  }

  /* init nb_photos info span */
  var nbPhotos_init = getSliderKeyFromValue(jQuery('input[name=nb_photos]').val(), nbPhotosValues);

  jQuery("#community_nb_photos_info").html(getNbPhotosInfoFromIdx(nbPhotos_init));

  jQuery("#community_nb_photos").slider({
    range: "min",
    min: 0,
    max: nbPhotosValues.length - 1,
    value: nbPhotos_init,
    slide: function( event, ui ) {
      jQuery("#community_nb_photos_info").html(getNbPhotosInfoFromIdx(ui.value));
    },
    stop: function( event, ui ) {
      jQuery("input[name=nb_photos]").val(nbPhotosValues[ui.value]);
    }
  });

  var storageValues = [10,50,100,200,500,1000,5000,-1];

  function getStorageInfoFromIdx(idx) {
    if (idx == storageValues.length - 1) {
      return "<?php echo l10n('no limit');?>
";
    }

    return sprintf(
      "<?php echo l10n('up to %dMB (for each user)');?>
",
      storageValues[idx]
    );
  }

  /* init storage info span */
  var storage_init = getSliderKeyFromValue(jQuery('input[name=storage]').val(), storageValues);

  jQuery("#community_storage_info").html(getStorageInfoFromIdx(storage_init));

  jQuery("#community_storage").slider({
    range: "min",
    min: 0,
    max: storageValues.length - 1,
    value: storage_init,
    slide: function( event, ui ) {
      jQuery("#community_storage_info").html(getStorageInfoFromIdx(ui.value));
    },
    stop: function( event, ui ) {
      jQuery("input[name=storage]").val(storageValues[ui.value]);
    }
  });

});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<div class="titrePage">
  <h2><?php echo l10n('Upload Permissions');?>
 - <?php echo l10n('Community');?>
</h2>
</div>

<?php if (!isset($_smarty_tpl->tpl_vars['edit']->value)){?>
<a id="displayForm" href="#"><?php echo l10n('Add a permission');?>
</a>
<?php }?>

<form method="post" name="add_permission" action="<?php echo $_smarty_tpl->tpl_vars['F_ADD_ACTION']->value;?>
" class="properties" <?php if (!isset($_smarty_tpl->tpl_vars['edit']->value)){?>style="display:none"<?php }?>>
  <fieldset>
    <legend><?php if (isset($_smarty_tpl->tpl_vars['edit']->value)){?><?php echo l10n('Edit a permission');?>
<?php }else{ ?><?php echo l10n('Add a permission');?>
<?php }?></legend>

    <p>
      <strong><?php echo l10n('Who?');?>
</strong>
      <br>
      <select name="who">
<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['who_options']->value,'selected'=>$_smarty_tpl->tpl_vars['who_options_selected']->value),$_smarty_tpl);?>

      </select>

      <select name="who_user" <?php if (!isset($_smarty_tpl->tpl_vars['user_options_selected']->value)){?>style="display:none"<?php }?>>
<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['user_options']->value,'selected'=>$_smarty_tpl->tpl_vars['user_options_selected']->value),$_smarty_tpl);?>

      </select>

      <select name="who_group" <?php if (!isset($_smarty_tpl->tpl_vars['group_options_selected']->value)){?>style="display:none"<?php }?>>
<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['group_options']->value,'selected'=>$_smarty_tpl->tpl_vars['group_options_selected']->value),$_smarty_tpl);?>

      </select>
    </p>

    <p>
      <strong><?php echo l10n('Where?');?>
</strong> <?php if ($_smarty_tpl->tpl_vars['community_conf']->value['user_albums']){?><em id="userAlbumInfo"><?php echo l10n('(in addition to user album)');?>
</em><?php }?>
      <br>
      <select class="categoryDropDown" name="category">
<?php if ($_smarty_tpl->tpl_vars['community_conf']->value['user_albums']){?>
        <option value="-1"<?php if ($_smarty_tpl->tpl_vars['user_album_selected']->value){?> selected="selected"<?php }?> id="userAlbumOption"><?php echo l10n('User album only');?>
</option>
<?php }?>
        <option value="0"<?php if ($_smarty_tpl->tpl_vars['whole_gallery_selected']->value){?> selected="selected"<?php }?>><?php echo l10n('The whole gallery');?>
</option>
        <option disabled="disabled">------------</option>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_options']->value,'selected'=>$_smarty_tpl->tpl_vars['category_options_selected']->value),$_smarty_tpl);?>

      </select>
      <br>
      <label><input type="checkbox" name="recursive" <?php if ($_smarty_tpl->tpl_vars['recursive']->value){?>checked="checked"<?php }?>> <?php echo l10n('Apply to sub-albums');?>
</label>
      <br>
      <label><input type="checkbox" name="create_subcategories" <?php if ($_smarty_tpl->tpl_vars['create_subcategories']->value){?>checked="checked"<?php }?>> <?php echo l10n('ability to create sub-albums');?>
</label>
    </p>

    <p>
      <strong><?php echo l10n('Which level of trust?');?>
</strong>
      <br><label><input type="radio" name="moderated" value="true" <?php if ($_smarty_tpl->tpl_vars['moderated']->value){?>checked="checked"<?php }?>> <em><?php echo l10n('low trust');?>
</em> : <?php echo l10n('uploaded photos must be validated by an administrator');?>
</label>
      <br><label><input type="radio" name="moderated" value="false" <?php if (!$_smarty_tpl->tpl_vars['moderated']->value){?>checked="checked"<?php }?>> <em><?php echo l10n('high trust');?>
</em> : <?php echo l10n('uploaded photos are directly displayed in the gallery');?>
</label>
    </p>

    <p style="margin-bottom:0">
      <strong><?php echo l10n('How many photos?');?>
</strong>
    </p>
    <div id="community_nb_photos"></div>
    <span id="community_nb_photos_info"><?php echo l10n('no limit');?>
</span>
    <input type="hidden" name="nb_photos" value="<?php echo $_smarty_tpl->tpl_vars['nb_photos']->value;?>
">

    <p style="margin-top:1.5em;margin-bottom:0;">
      <strong><?php echo l10n('How much disk space?');?>
</strong>
    </p>
    <div id="community_storage"></div>
    <span id="community_storage_info"><?php echo l10n('no limit');?>
</span>
    <input type="hidden" name="storage" value="<?php echo $_smarty_tpl->tpl_vars['storage']->value;?>
">

<?php if (isset($_smarty_tpl->tpl_vars['edit']->value)){?>
      <input type="hidden" name="edit" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value;?>
">
<?php }?>
    <p style="margin-top:1.5em;">
      <input class="submit" type="submit" name="submit_add" value="<?php if (isset($_smarty_tpl->tpl_vars['edit']->value)){?><?php echo l10n('Submit');?>
<?php }else{ ?><?php echo l10n('Add');?>
<?php }?>"/>
      <a href="<?php echo $_smarty_tpl->tpl_vars['F_ADD_ACTION']->value;?>
"><?php echo l10n('Cancel');?>
</a>
    </p>
  </fieldset>
</form>

<table class="table2" style="margin:15px auto;">
  <tr class="throw">
    <th><?php echo l10n('Who?');?>
</th>
    <th><?php echo l10n('Where?');?>
</th>
    <th><?php echo l10n('Options');?>
</th>
    <th><?php echo l10n('Actions');?>
</th>
  </tr>
<?php if (!empty($_smarty_tpl->tpl_vars['permissions']->value)){?>
<?php  $_smarty_tpl->tpl_vars['permission'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['permission']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permissions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['permission_loop']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['permission']->key => $_smarty_tpl->tpl_vars['permission']->value){
$_smarty_tpl->tpl_vars['permission']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['permission_loop']['index']++;
?>
  <tr class="<?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['foreach']['permission_loop']['index'])){?>row1<?php }else{ ?>row2<?php }?><?php if ($_smarty_tpl->tpl_vars['permission']->value['HIGHLIGHT']){?> rowSelected<?php }?>">
    <td><?php echo $_smarty_tpl->tpl_vars['permission']->value['WHO'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['permission']->value['WHERE'];?>
</td>
    <td>
      <span title="<?php echo $_smarty_tpl->tpl_vars['permission']->value['TRUST_TOOLTIP'];?>
"><?php echo $_smarty_tpl->tpl_vars['permission']->value['TRUST'];?>
</span><?php if ($_smarty_tpl->tpl_vars['permission']->value['RECURSIVE']){?>,
<span title="<?php echo $_smarty_tpl->tpl_vars['permission']->value['RECURSIVE_TOOLTIP'];?>
"><?php echo l10n('sub-albums');?>
</span><?php }?><?php if ($_smarty_tpl->tpl_vars['permission']->value['NB_PHOTOS']){?>,
<span title="<?php echo $_smarty_tpl->tpl_vars['permission']->value['NB_PHOTOS_TOOLTIP'];?>
"><?php echo sprintf(l10n('%d photos'),$_smarty_tpl->tpl_vars['permission']->value['NB_PHOTOS']);?>
</span><?php }?><?php if ($_smarty_tpl->tpl_vars['permission']->value['STORAGE']){?>,
<span title="<?php echo $_smarty_tpl->tpl_vars['permission']->value['STORAGE_TOOLTIP'];?>
"><?php echo $_smarty_tpl->tpl_vars['permission']->value['STORAGE'];?>
MB</span><?php }?>
<?php if ($_smarty_tpl->tpl_vars['permission']->value['CREATE_SUBCATEGORIES']){?>
, <?php echo l10n('sub-albums creation');?>

<?php }?>
    </td>
    <td class="permissionActions">
      <a href="<?php echo $_smarty_tpl->tpl_vars['permission']->value['U_EDIT'];?>
">
        <img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['admin_icon_dir'];?>
/edit_s.png" alt="<?php echo l10n('edit');?>
" title="<?php echo l10n('edit');?>
" />
      </a>
      <a href="<?php echo $_smarty_tpl->tpl_vars['permission']->value['U_DELETE'];?>
" onclick="return confirm( document.getElementById('btn_delete').title + '\n\n' + '<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');">
        <img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['admin_icon_dir'];?>
/delete.png" id="btn_delete" alt="<?php echo l10n('delete');?>
" title="<?php echo l10n('Delete permission');?>
" />
      </a>
    </td>
  </tr>
<?php } ?>
<?php }?>
</table>
<?php }} ?>