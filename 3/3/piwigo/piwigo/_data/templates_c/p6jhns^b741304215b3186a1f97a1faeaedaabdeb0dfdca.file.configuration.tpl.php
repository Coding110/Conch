<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:30:05
         compiled from "./admin/themes/default/template/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8869847875466f2ed0bf559-14276471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b741304215b3186a1f97a1faeaedaabdeb0dfdca' => 
    array (
      0 => './admin/themes/default/template/configuration.tpl',
      1 => 1385413136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8869847875466f2ed0bf559-14276471',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TABSHEET_TITLE' => 0,
    'default' => 0,
    'F_ACTION' => 0,
    'watermark' => 0,
    'main' => 0,
    'ORDER_BY_IS_CUSTOM' => 0,
    'order' => 0,
    'theme' => 0,
    'name' => 0,
    'ROOT_URL' => 0,
    'comments' => 0,
    'sizes' => 0,
    'is_gd' => 0,
    'ferrors' => 0,
    'derivatives' => 0,
    'd' => 0,
    'type' => 0,
    'resize_quality' => 0,
    'custom_derivatives' => 0,
    'custom' => 0,
    'time' => 0,
    'watermark_files' => 0,
    'display' => 0,
    'PROFILE_CONTENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f2ed45dc47_87038379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f2ed45dc47_87038379')) {function content_5466f2ed45dc47_87038379($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

(function(){
  var targets = {
    'input[name="rate"]' : '#rate_anonymous',
    'input[name="allow_user_registration"]' : '#email_admin_on_new_user',
    'input[name="comments_validation"]' : '#email_admin_on_comment_validation',
    'input[name="user_can_edit_comment"]' : '#email_admin_on_comment_edition',
    'input[name="user_can_delete_comment"]' : '#email_admin_on_comment_deletion',
  };

  for (selector in targets) {
    var target = targets[selector];

    jQuery(target).toggle(jQuery(selector).is(':checked'));

    (function(target){
      jQuery(selector).on('change', function() {
        jQuery(target).toggle($(this).is(':checked'));
      });
    })(target);
  };
}());
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<h2><?php echo l10n('Piwigo configuration');?>
 <?php echo $_smarty_tpl->tpl_vars['TABSHEET_TITLE']->value;?>
</h2>

<?php if (!isset($_smarty_tpl->tpl_vars['default']->value)){?>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" class="properties"<?php if (isset($_smarty_tpl->tpl_vars['watermark']->value)){?> enctype="multipart/form-data"<?php }?>>
<?php }?>

<div id="configContent">
<?php if (isset($_smarty_tpl->tpl_vars['main']->value)){?>
<fieldset class="mainConf">
  <legend><?php echo l10n('Basic settings');?>
</legend>
  <ul>
    <li>
      <label for="gallery_title"><?php echo l10n('Gallery title');?>
</label>
      <br>
      <input type="text" maxlength="255" size="50" name="gallery_title" id="gallery_title" value="<?php echo $_smarty_tpl->tpl_vars['main']->value['CONF_GALLERY_TITLE'];?>
">
    </li>

    <li>
      <label for="page_banner"><?php echo l10n('Page banner');?>
</label>
      <br>
      <textarea rows="5" cols="50" class="description" name="page_banner" id="page_banner"><?php echo $_smarty_tpl->tpl_vars['main']->value['CONF_PAGE_BANNER'];?>
</textarea>
    </li>
    
   <li id="order_filters">
      <label><?php echo l10n('Default photos order');?>
</label>

<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['main']->value['order_by']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
      <span class="filter <?php if (isset($_smarty_tpl->tpl_vars['ORDER_BY_IS_CUSTOM']->value)){?>transparent<?php }?>">
        <select name="order_by[]" <?php if (isset($_smarty_tpl->tpl_vars['ORDER_BY_IS_CUSTOM']->value)){?>disabled<?php }?>>
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['main']->value['order_by_options'],'selected'=>$_smarty_tpl->tpl_vars['order']->value),$_smarty_tpl);?>

        </select>
        <a class="removeFilter"><?php echo l10n('delete');?>
</a>
      </span>
<?php } ?>
<?php if (!isset($_smarty_tpl->tpl_vars['ORDER_BY_IS_CUSTOM']->value)){?>
      <a class="addFilter"><?php echo l10n('Add a criteria');?>
</a>
<?php }else{ ?>
      <span class="order_by_is_custom"><?php echo l10n('You can\'t define a default photo order because you have a custom setting in your local configuration.');?>
</span>
<?php }?>
    </li>
  </ul>
  
<?php if (!isset($_smarty_tpl->tpl_vars['ORDER_BY_IS_CUSTOM']->value)){?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

(function(){
var max_fields = Math.ceil(<?php echo count($_smarty_tpl->tpl_vars['main']->value['order_by_options']);?>
/2);

function updateFilters() {
  var $selects = jQuery('#order_filters select');

  jQuery('#order_filters .addFilter').toggle($selects.length <= max_fields);
  jQuery('#order_filters .removeFilter').css('display', '').filter(':first').css('display', 'none');
  
  $selects.find('option').removeAttr('disabled');
  $selects.each(function() {
    $selects.not(this).find('option[value="'+ jQuery(this).val() +'"]').attr('disabled', 'disabled');
  });
}

jQuery('#order_filters').on('click', '.removeFilter', function() {
  jQuery(this).parent('span.filter').remove();
  updateFilters();
});

jQuery('#order_filters').on('change', 'select', updateFilters);

jQuery('#order_filters .addFilter').click(function() {
  jQuery(this).prev('span.filter').clone().insertBefore(jQuery(this));
  jQuery(this).prev('span.filter').children('select').val('');
  updateFilters();
});

updateFilters();
}());
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
</fieldset>

<fieldset class="mainConf">
  <legend><?php echo l10n('Permissions');?>
</legend>
  <ul>
    <li>
      <label>
        <input type="checkbox" name="rate" <?php if (($_smarty_tpl->tpl_vars['main']->value['rate'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Allow rating');?>

      </label>

      <label id="rate_anonymous" class="no-bold">
        <input type="checkbox" name="rate_anonymous" <?php if (($_smarty_tpl->tpl_vars['main']->value['rate_anonymous'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Rating by guests');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="allow_user_registration" <?php if (($_smarty_tpl->tpl_vars['main']->value['allow_user_registration'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Allow user registration');?>

      </label>

      <label id="email_admin_on_new_user" class="no-bold">
        <input type="checkbox" name="email_admin_on_new_user" <?php if (($_smarty_tpl->tpl_vars['main']->value['email_admin_on_new_user'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Email admins when a new user registers');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="allow_user_customization" <?php if (($_smarty_tpl->tpl_vars['main']->value['allow_user_customization'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Allow user customization');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="obligatory_user_mail_address" <?php if (($_smarty_tpl->tpl_vars['main']->value['obligatory_user_mail_address'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Mail address is obligatory for all users');?>

      </label>
    </li>
  </ul>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery("#activate_comments").change(function(){
  if ($(this).is(':checked')) {
    jQuery("#comments_param_warp").show();
  } else {
    jQuery("#comments_param_warp").hide();
  }
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</fieldset>

<fieldset class="mainConf">
  <legend><?php echo l10n('Miscellaneous');?>
</legend>
  <ul>
    <li>
      <label><?php echo l10n('Week starts on');?>

      <?php echo smarty_function_html_options(array('name'=>"week_starts_on",'options'=>$_smarty_tpl->tpl_vars['main']->value['week_starts_on_options'],'selected'=>$_smarty_tpl->tpl_vars['main']->value['week_starts_on_options_selected']),$_smarty_tpl);?>
</label>
    </li>

    <li>
      <strong><?php echo l10n('Save visits in history for');?>
</strong>

      <label class="no-bold">
        <input type="checkbox" name="history_guest" <?php if (($_smarty_tpl->tpl_vars['main']->value['history_guest'])){?>checked="checked"<?php }?>>
        <?php echo l10n('simple visitors');?>

      </label>

      <label class="no-bold">
        <input type="checkbox" name="log" <?php if (($_smarty_tpl->tpl_vars['main']->value['log'])){?>checked="checked"<?php }?>>
        <?php echo l10n('registered users');?>

      </label>

      <label class="no-bold">
        <input type="checkbox" name="history_admin" <?php if (($_smarty_tpl->tpl_vars['main']->value['history_admin'])){?>checked="checked"<?php }?>>
        <?php echo l10n('administrators');?>

      </label>
    </li>

    <li>
      <label><?php echo l10n('Mail theme');?>
</label>
      
      <div class="themeBoxes">
<?php  $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['name']->_loop = false;
 $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['main']->value['mail_theme_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['name']->key => $_smarty_tpl->tpl_vars['name']->value){
$_smarty_tpl->tpl_vars['name']->_loop = true;
 $_smarty_tpl->tpl_vars['theme']->value = $_smarty_tpl->tpl_vars['name']->key;
?>
        <div class="themeBox <?php if ($_smarty_tpl->tpl_vars['main']->value['mail_theme']==$_smarty_tpl->tpl_vars['theme']->value){?>themeDefault<?php }?>">
          <label>
            <div class="themeName">
              <input type="radio" name="mail_theme" value="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['main']->value['mail_theme']==$_smarty_tpl->tpl_vars['theme']->value){?>checked<?php }?>>
              <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

            </div>
            <div class="themeShot">
              <img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
themes/default/template/mail/screenshot-<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
.png" width="150"/>
            </div>
          </label>
          <a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
themes/default/template/mail/screenshot-<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
.png"><?php echo l10n('Preview');?>
</a>
        </div>
<?php } ?>
      </div>
    </li>
   
<?php echo $_smarty_tpl->getSubTemplate ('include/colorbox.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(".themeBoxes a").colorbox();

jQuery("input[name='mail_theme']").change(function() {
  jQuery("input[name='mail_theme']").parents(".themeBox").removeClass("themeDefault");
  jQuery(this).parents(".themeBox").addClass("themeDefault");
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

  </ul>
</fieldset>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['comments']->value)){?>
<fieldset id="commentsConf" class="no-border">
  <legend></legend>
  <ul>
    <li>
      <label>
        <input type="checkbox" name="activate_comments" id="activate_comments"<?php if (($_smarty_tpl->tpl_vars['comments']->value['activate_comments'])){?> checked="checked"<?php }?>>
        <?php echo l10n('Activate comments');?>

      </label>
    </li>
  </ul>

  <ul id="comments_param_warp"<?php if (!($_smarty_tpl->tpl_vars['comments']->value['activate_comments'])){?> style="display:none;"<?php }?>>
    <li>
      <label>
        <input type="checkbox" name="comments_forall" <?php if (($_smarty_tpl->tpl_vars['comments']->value['comments_forall'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Comments for all');?>

      </label>
    </li>

    <li>
      <label>
        <?php echo l10n('Number of comments per page');?>

        <input type="text" size="3" maxlength="4" name="nb_comment_page" id="nb_comment_page" value="<?php echo $_smarty_tpl->tpl_vars['comments']->value['NB_COMMENTS_PAGE'];?>
">
      </label>
    </li>

    <li>
      <label>
        <?php echo l10n('Default comments order');?>

        <select name="comments_order">
          <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['comments']->value['comments_order_options'],'selected'=>$_smarty_tpl->tpl_vars['comments']->value['comments_order']),$_smarty_tpl);?>

        </select>
      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="comments_validation" <?php if (($_smarty_tpl->tpl_vars['comments']->value['comments_validation'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Validation');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="comments_author_mandatory" <?php if (($_smarty_tpl->tpl_vars['comments']->value['comments_author_mandatory'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Username is mandatory');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="comments_email_mandatory" <?php if (($_smarty_tpl->tpl_vars['comments']->value['comments_email_mandatory'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Email address is mandatory');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="user_can_edit_comment" <?php if (($_smarty_tpl->tpl_vars['comments']->value['user_can_edit_comment'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Allow users to edit their own comments');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="user_can_delete_comment" <?php if (($_smarty_tpl->tpl_vars['comments']->value['user_can_delete_comment'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Allow users to delete their own comments');?>

      </label>
    </li>

    <li id="notifyAdmin">
      <strong><?php echo l10n('Notify administrators when a comment is');?>
</strong>

      <label id="email_admin_on_comment_validation" class="no-bold">
        <input type="checkbox" name="email_admin_on_comment_validation" <?php if (($_smarty_tpl->tpl_vars['comments']->value['email_admin_on_comment_validation'])){?>checked="checked"<?php }?>> <?php echo l10n('pending validation');?>

      </label>

      <label class="no-bold">
        <input type="checkbox" name="email_admin_on_comment" <?php if (($_smarty_tpl->tpl_vars['comments']->value['email_admin_on_comment'])){?>checked="checked"<?php }?>> <?php echo l10n('added');?>

      </label>

      <label id="email_admin_on_comment_edition" class="no-bold">
        <input type="checkbox" name="email_admin_on_comment_edition" <?php if (($_smarty_tpl->tpl_vars['comments']->value['email_admin_on_comment_edition'])){?>checked="checked"<?php }?>> <?php echo l10n('modified');?>

      </label>

      <label id="email_admin_on_comment_deletion" class="no-bold">
        <input type="checkbox" name="email_admin_on_comment_deletion" <?php if (($_smarty_tpl->tpl_vars['comments']->value['email_admin_on_comment_deletion'])){?>checked="checked"<?php }?>> <?php echo l10n('deleted');?>

      </label>
    </li>
  </ul>
</fieldset>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['sizes']->value)){?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

(function(){
  var labelMaxWidth = "<?php echo l10n('Maximum width');?>
",
      labelWidth = "<?php echo l10n('Width');?>
",
      labelMaxHeight = "<?php echo l10n('Maximum height');?>
",
      labelHeight = "<?php echo l10n('Height');?>
";

  function toggleResizeFields(size) {
    var checkbox = jQuery("#original_resize");
    var needToggle = jQuery("#sizeEdit-original");

    if (jQuery(checkbox).is(':checked')) {
      needToggle.show();
    }
    else {
      needToggle.hide();
    }
  }

  toggleResizeFields("original");
  jQuery("#original_resize").click(function () {
    toggleResizeFields("original");
  });

  jQuery("a[id^='sizeEditOpen-']").click(function(){
    var sizeName = jQuery(this).attr("id").split("-")[1];
    jQuery("#sizeEdit-"+sizeName).toggle();
    jQuery(this).hide();
		return false;
  });

  jQuery(".cropToggle").click(function() {
    var labelBoxWidth = jQuery(this).parents('table.sizeEditForm').find('td.sizeEditWidth');
    var labelBoxHeight = jQuery(this).parents('table.sizeEditForm').find('td.sizeEditHeight');

    if (jQuery(this).is(':checked')) {
      jQuery(labelBoxWidth).html(labelWidth);
      jQuery(labelBoxHeight).html(labelHeight);
    }
    else {
      jQuery(labelBoxWidth).html(labelMaxWidth);
      jQuery(labelBoxHeight).html(labelMaxHeight);
    }
  });

  jQuery("#showDetails").click(function() {
    jQuery(".sizeDetails").show();
    jQuery(this).css("visibility", "hidden");
		return false;
  });
}());
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('html_style', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.sizeEnable {width:50px;}
.sizeEditForm {margin:0 0 10px 20px;}
.sizeEdit {display:none;}
#sizesConf table {margin:0;}
.showDetails {padding:0;}
.sizeDetails {display:none;margin-left:10px;}
.sizeEditOpen {margin-left:10px;}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<fieldset id="sizesConf">
  <legend><?php echo l10n('Original Size');?>
</legend>
<?php if ($_smarty_tpl->tpl_vars['is_gd']->value){?>
  <div>
    <?php echo l10n('Resize after upload disabled due to the use of GD as graphic library');?>

    <input type="checkbox" name="original_resize" id="original_resize" disabled="disabled" style="visibility: hidden">
    <input type="hidden" name="original_resize_maxwidth" value="<?php echo $_smarty_tpl->tpl_vars['sizes']->value['original_resize_maxwidth'];?>
">
    <input type="hidden" name="original_resize_maxheight" value="<?php echo $_smarty_tpl->tpl_vars['sizes']->value['original_resize_maxheight'];?>
">
    <input type="hidden" name="original_resize_quality" value="<?php echo $_smarty_tpl->tpl_vars['sizes']->value['original_resize_quality'];?>
">
  </div>
<?php }else{ ?>
  <div>
    <label for="original_resize">
      <input type="checkbox" name="original_resize" id="original_resize" <?php if (($_smarty_tpl->tpl_vars['sizes']->value['original_resize'])){?>checked="checked"<?php }?>>
      <?php echo l10n('Resize after upload');?>

    </label>
  </div>

  <table id="sizeEdit-original">
    <tr>
      <th><?php echo l10n('Maximum width');?>
</th>
      <td>
        <input type="text" name="original_resize_maxwidth" value="<?php echo $_smarty_tpl->tpl_vars['sizes']->value['original_resize_maxwidth'];?>
" size="4" maxlength="4"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['original_resize_maxwidth'])){?> class="dError"<?php }?>> <?php echo l10n('pixels');?>

        <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['original_resize_maxwidth'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value['original_resize_maxwidth'];?>
">!</span><?php }?>
      </td>
    </tr>
    <tr>
      <th><?php echo l10n('Maximum height');?>
</th>
      <td>
        <input type="text" name="original_resize_maxheight" value="<?php echo $_smarty_tpl->tpl_vars['sizes']->value['original_resize_maxheight'];?>
" size="4" maxlength="4"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['original_resize_maxheight'])){?> class="dError"<?php }?>> <?php echo l10n('pixels');?>

        <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['original_resize_maxheight'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value['original_resize_maxheight'];?>
">!</span><?php }?>
      </td>
    </tr>
    <tr>
      <th><?php echo l10n('Image Quality');?>
</th>
      <td>
        <input type="text" name="original_resize_quality" value="<?php echo $_smarty_tpl->tpl_vars['sizes']->value['original_resize_quality'];?>
" size="3" maxlength="3"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['original_resize_quality'])){?> class="dError"<?php }?>> %
        <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['original_resize_quality'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value['original_resize_quality'];?>
">!</span><?php }?>
      </td>
    </tr>
  </table>
<?php }?>
</fieldset>

<fieldset id="multiSizesConf">
  <legend><?php echo l10n('Multiple Size');?>
</legend>

  <div class="showDetails">
    <a href="#" id="showDetails"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value)){?> style="display:none"<?php }?>><?php echo l10n('show details');?>
</a>
  </div>

  <table style="margin:0">
<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['derivatives']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
    <tr>
      <td>
        <label>
          <span class="sizeEnable">
<?php if ($_smarty_tpl->tpl_vars['d']->value['must_enable']){?>
            &#x2714;
<?php }else{ ?>
            <input type="checkbox" name="d[<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
][enabled]" <?php if ($_smarty_tpl->tpl_vars['d']->value['enabled']){?>checked="checked"<?php }?>>
<?php }?>
          </span>
          <?php echo l10n($_smarty_tpl->tpl_vars['type']->value);?>

        </label>
      </td>

      <td>
        <span class="sizeDetails"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value)){?> style="display:inline"<?php }?>><?php echo $_smarty_tpl->tpl_vars['d']->value['w'];?>
 x <?php echo $_smarty_tpl->tpl_vars['d']->value['h'];?>
 <?php echo l10n('pixels');?>
<?php if ($_smarty_tpl->tpl_vars['d']->value['crop']){?>, <?php echo mb_strtolower(l10n('Crop'), 'UTF-8');?>
<?php }?></span>
      </td>

      <td>
        <span class="sizeDetails"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value)&&!isset($_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value])){?> style="display:inline"<?php }?>>
          <a href="#" id="sizeEditOpen-<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" class="sizeEditOpen"><?php echo l10n('edit');?>
</a>
        </span>
      </td>
    </tr>

    <tr id="sizeEdit-<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" class="sizeEdit" <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value])){?> style="display:block"<?php }?>>
      <td colspan="3">
        <table class="sizeEditForm">
<?php if (!$_smarty_tpl->tpl_vars['d']->value['must_square']){?>
          <tr>
            <td colspan="2">
              <label>
                <input type="checkbox" class="cropToggle" name="d[<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
][crop]" <?php if ($_smarty_tpl->tpl_vars['d']->value['crop']){?>checked="checked"<?php }?>>
                <?php echo l10n('Crop');?>

              </label>
            </td>
          </tr>
<?php }?>
          <tr>
            <td class="sizeEditWidth"><?php if ($_smarty_tpl->tpl_vars['d']->value['must_square']||$_smarty_tpl->tpl_vars['d']->value['crop']){?><?php echo l10n('Width');?>
<?php }else{ ?><?php echo l10n('Maximum width');?>
<?php }?></td>
            <td>
              <input type="text" name="d[<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
][w]" maxlength="4" size="4" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['w'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['w'])){?> class="dError"<?php }?>>
              <?php echo l10n('pixels');?>

              <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['w'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['w'];?>
">!</span><?php }?>
            </td>
          </tr>

<?php if (!$_smarty_tpl->tpl_vars['d']->value['must_square']){?>
          <tr>
            <td class="sizeEditHeight"><?php if ($_smarty_tpl->tpl_vars['d']->value['crop']){?><?php echo l10n('Height');?>
<?php }else{ ?><?php echo l10n('Maximum height');?>
<?php }?></td>
            <td>
              <input type="text" name="d[<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
][h]" maxlength="4" size="4"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['h'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['h'])){?> class="dError"<?php }?>>
              <?php echo l10n('pixels');?>

              <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['h'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['h'];?>
">!</span><?php }?>
            </td>
          </tr>
<?php }?>
          <tr>
          <td><?php echo l10n('Sharpen');?>
</td>
          <td>
            <input type="text" name="d[<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
][sharpen]" maxlength="4" size="4"  value="<?php echo $_smarty_tpl->tpl_vars['d']->value['sharpen'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['sharpen'])){?> class="dError"<?php }?>>
            %
            <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['sharpen'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value[$_smarty_tpl->tpl_vars['type']->value]['sharpen'];?>
">!</span><?php }?>
          </td>
          </tr>
        </table> 
      </td>
    </tr>
<?php } ?>
  </table>

  <p style="margin:10px 0 0 0;<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value)){?> display:block;<?php }?>" class="sizeDetails">
    <?php echo l10n('Image Quality');?>

    <input type="text" name="resize_quality" value="<?php echo $_smarty_tpl->tpl_vars['resize_quality']->value;?>
" size="3" maxlength="3"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['resize_quality'])){?> class="dError"<?php }?>> %
    <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['resize_quality'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value['resize_quality'];?>
">!</span><?php }?>
  </p>
  <p style="margin:10px 0 0 0;<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value)){?> display:block;<?php }?>" class="sizeDetails">
    <a href="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
&action=restore_settings" onclick="return confirm('<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');"><?php echo l10n('Reset to default values');?>
</a>
  </p>

<?php if (!empty($_smarty_tpl->tpl_vars['custom_derivatives']->value)){?>
  <fieldset class="sizeDetails">
    <legend><?php echo l10n('custom');?>
</legend>
    <table style="margin:0">
<?php  $_smarty_tpl->tpl_vars['time'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['time']->_loop = false;
 $_smarty_tpl->tpl_vars['custom'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['custom_derivatives']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['time']->key => $_smarty_tpl->tpl_vars['time']->value){
$_smarty_tpl->tpl_vars['time']->_loop = true;
 $_smarty_tpl->tpl_vars['custom']->value = $_smarty_tpl->tpl_vars['time']->key;
?>
      <tr><td><label><input type="checkbox" name="delete_custom_derivative_<?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
"> <?php echo l10n('Delete');?>
 <?php echo $_smarty_tpl->tpl_vars['custom']->value;?>
 (<?php echo l10n('Last hit');?>
: <?php echo $_smarty_tpl->tpl_vars['time']->value;?>
)</label></td></tr>
<?php } ?>
    </table>
  </fieldset>
<?php }?>

</fieldset>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['watermark']->value)){?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

(function(){
  function onWatermarkChange() {
    var val = jQuery("#wSelect").val();
    if (val.length) {
      jQuery("#wImg").attr('src', '<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
'+val).show();
    }
    else {
      jQuery("#wImg").hide();
    }
  }

  onWatermarkChange();

  jQuery("#wSelect").bind("change", onWatermarkChange);

  if (jQuery("input[name='w[position]']:checked").val() == 'custom') {
    jQuery("#positionCustomDetails").show();
  }

  jQuery("input[name='w[position]']").change(function(){
    if (jQuery(this).val() == 'custom') {
      jQuery("#positionCustomDetails").show();
    }
    else {
      jQuery("#positionCustomDetails").hide();
    }
  });

  jQuery(".addWatermarkOpen").click(function(){
    jQuery("#addWatermark, #selectWatermark").toggle();
		return false;
  });
}());
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<fieldset id="watermarkConf" class="no-border">
  <legend></legend>
  <ul>
    <li>
      <span id="selectWatermark"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermarkImage'])){?> style="display:none"<?php }?>><label><?php echo l10n('Select a file');?>
</label>
      <select name="w[file]" id="wSelect">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['watermark_files']->value,'selected'=>$_smarty_tpl->tpl_vars['watermark']->value['file']),$_smarty_tpl);?>

      </select>
      <?php echo l10n('... or ');?>
<a href="#" class="addWatermarkOpen"><?php echo l10n('add a new watermark');?>
</a>
      <br>
      <img id="wImg"></img></span>
      <span id="addWatermark"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermarkImage'])){?> style="display:inline"<?php }?>>
      <?php echo l10n('add a new watermark');?>
 <?php echo l10n('... or ');?>
<a href="#" class="addWatermarkOpen"><?php echo l10n('Select a file');?>
</a>
      <br>
      <input type="file" size="60" id="watermarkImage" name="watermarkImage"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermarkImage'])){?> class="dError"<?php }?>> (png)
      <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermarkImage'])){?><span class="dErrorDesc" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ferrors']->value['watermarkImage']);?>
">!</span><?php }?>
      </span>
    </li>

    <li>
      <label>
        <?php echo l10n('Apply watermark if width is bigger than');?>

        <input  size="4" maxlength="4" type="text" name="w[minw]" value="<?php echo $_smarty_tpl->tpl_vars['watermark']->value['minw'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['minw'])){?> class="dError"<?php }?>>
      </label>
      <?php echo l10n('pixels');?>

    </li>

    <li>
      <label>
        <?php echo l10n('Apply watermark if height is bigger than');?>

        <input  size="4" maxlength="4" type="text" name="w[minh]" value="<?php echo $_smarty_tpl->tpl_vars['watermark']->value['minh'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['minh'])){?> class="dError"<?php }?>>
      </label>
      <?php echo l10n('pixels');?>

    </li>

    <li>
      <label><?php echo l10n('Position');?>
</label>
      <br>
      <div id="watermarkPositionBox">
        <label class="right"><?php echo l10n('top right corner');?>
 <input name="w[position]" type="radio" value="topright"<?php if ($_smarty_tpl->tpl_vars['watermark']->value['position']=='topright'){?> checked="checked"<?php }?>></label>
        <label><input name="w[position]" type="radio" value="topleft"<?php if ($_smarty_tpl->tpl_vars['watermark']->value['position']=='topleft'){?> checked="checked"<?php }?>> <?php echo l10n('top left corner');?>
</label>
        <label class="middle"><input name="w[position]" type="radio" value="middle"<?php if ($_smarty_tpl->tpl_vars['watermark']->value['position']=='middle'){?> checked="checked"<?php }?>> <?php echo l10n('middle');?>
</label>
        <label class="right"><?php echo l10n('bottom right corner');?>
 <input name="w[position]" type="radio" value="bottomright"<?php if ($_smarty_tpl->tpl_vars['watermark']->value['position']=='bottomright'){?> checked="checked"<?php }?>></label>
        <label><input name="w[position]" type="radio" value="bottomleft"<?php if ($_smarty_tpl->tpl_vars['watermark']->value['position']=='bottomleft'){?> checked="checked"<?php }?>> <?php echo l10n('bottom left corner');?>
</label>
      </div>
      
      <label style="display:block;margin-top:10px;font-weight:normal;"><input name="w[position]" type="radio" value="custom"<?php if ($_smarty_tpl->tpl_vars['watermark']->value['position']=='custom'){?> checked="checked"<?php }?>> <?php echo l10n('custom');?>
</label>
      <div id="positionCustomDetails">
        <label><?php echo l10n('X Position');?>

          <input size="3" maxlength="3" type="text" name="w[xpos]" value="<?php echo $_smarty_tpl->tpl_vars['watermark']->value['xpos'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['xpos'])){?> class="dError"<?php }?>>%
          <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['xpos'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value['watermark']['xpos'];?>
">!</span><?php }?>
        </label>

        <br>
        <label><?php echo l10n('Y Position');?>

          <input size="3" maxlength="3" type="text" name="w[ypos]" value="<?php echo $_smarty_tpl->tpl_vars['watermark']->value['ypos'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['ypos'])){?> class="dError"<?php }?>>%
          <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['ypos'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value['watermark']['ypos'];?>
">!</span><?php }?>
        </label>

        <br>
        <label><?php echo l10n('X Repeat');?>

          <input size="3" maxlength="3" type="text" name="w[xrepeat]" value="<?php echo $_smarty_tpl->tpl_vars['watermark']->value['xrepeat'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['xrepeat'])){?> class="dError"<?php }?>>
          <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['xrepeat'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value['watermark']['xrepeat'];?>
">!</span><?php }?>
        </label>
      </div>
    </li>

    <li>
      <label><?php echo l10n('Opacity');?>
</label>
      <input size="3" maxlength="3" type="text" name="w[opacity]" value="<?php echo $_smarty_tpl->tpl_vars['watermark']->value['opacity'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['opacity'])){?> class="dError"<?php }?>> %
      <?php if (isset($_smarty_tpl->tpl_vars['ferrors']->value['watermark']['opacity'])){?><span class="dErrorDesc" title="<?php echo $_smarty_tpl->tpl_vars['ferrors']->value['watermark']['opacity'];?>
">!</span><?php }?>
    </li>
  </ul>
</fieldset>

<?php }?> 

<?php if (isset($_smarty_tpl->tpl_vars['display']->value)){?>
<fieldset id="indexDisplayConf">
  <legend><?php echo l10n('Main Page');?>
</legend>
  <ul>
    <li>
      <label>
        <input type="checkbox" name="menubar_filter_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['menubar_filter_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(ucfirst(l10n('display only recently posted photos'))));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="index_new_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['index_new_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "new" next to albums and pictures');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="index_sort_order_input" <?php if (($_smarty_tpl->tpl_vars['display']->value['index_sort_order_input'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(l10n('Sort order')));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="index_flat_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['index_flat_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(ucfirst(l10n('display all photos in all sub-albums'))));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="index_posted_date_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['index_posted_date_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(ucfirst(l10n('display a calendar by posted date'))));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="index_created_date_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['index_created_date_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(ucfirst(l10n('display a calendar by creation date'))));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="index_slideshow_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['index_slideshow_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(ucfirst(l10n('slideshow'))));?>

      </label>
    </li>

    <li>
      <label>
        <?php echo l10n('Number of albums per page');?>

        <input type="text" size="3" maxlength="4" name="nb_categories_page" id="nb_categories_page" value="<?php echo $_smarty_tpl->tpl_vars['display']->value['NB_CATEGORIES_PAGE'];?>
">
      </label>
    </li>
  </ul>
</fieldset>

<fieldset id="pictureDisplayConf">
  <legend><?php echo l10n('Photo Page');?>
</legend>
  <ul>
    <li>
      <label>
        <input type="checkbox" name="picture_slideshow_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_slideshow_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(ucfirst(l10n('slideshow'))));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_metadata_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_metadata_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(l10n('Show file metadata')));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_download_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_download_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(ucfirst(l10n('Download this file'))));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_favorite_icon" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_favorite_icon'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate icon "%s"',(ucfirst(l10n('add this photo to your favorites'))));?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_navigation_icons" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_navigation_icons'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate Navigation Bar');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_navigation_thumb" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_navigation_thumb'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Activate Navigation Thumbnails');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_menu" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_menu'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Show menubar');?>

      </label>
    </li>
  </ul>
</fieldset>

<fieldset id="pictureInfoConf">
  <legend><?php echo l10n('Photo Properties');?>
</legend>
  <ul>
    <li>
      <label>
        <input type="checkbox" name="picture_informations[author]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['author'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Author');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[created_on]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['created_on'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Created on');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[posted_on]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['posted_on'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Posted on');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[dimensions]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['dimensions'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Dimensions');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[file]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['file'])){?>checked="checked"<?php }?>>
        <?php echo l10n('File');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[filesize]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['filesize'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Filesize');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[tags]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['tags'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Tags');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[categories]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['categories'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Albums');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[visits]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['visits'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Visits');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[rating_score]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['rating_score'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Rating score');?>

      </label>
    </li>

    <li>
      <label>
        <input type="checkbox" name="picture_informations[privacy_level]" <?php if (($_smarty_tpl->tpl_vars['display']->value['picture_informations']['privacy_level'])){?>checked="checked"<?php }?>>
        <?php echo l10n('Who can see this photo?');?>
 (<?php echo l10n('available for administrators only');?>
)
      </label>
    </li>
  </ul>
</fieldset>
<?php }?>

</div> <!-- configContent -->

<?php if (!isset($_smarty_tpl->tpl_vars['default']->value)){?>
	<p class="formButtons">
		<input type="submit" name="submit" value="<?php echo l10n('Save Settings');?>
">
	</p>
</form>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['default']->value)){?>
<div id="configContent">
<?php echo $_smarty_tpl->tpl_vars['PROFILE_CONTENT']->value;?>

</div>
<?php }?>
<?php }} ?>