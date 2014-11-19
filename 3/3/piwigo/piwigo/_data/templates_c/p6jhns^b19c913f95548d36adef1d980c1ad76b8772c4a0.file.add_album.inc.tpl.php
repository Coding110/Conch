<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:30:19
         compiled from "./admin/themes/default/template/include/add_album.inc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19128984435466f2fb8ce655-08958900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b19c913f95548d36adef1d980c1ad76b8772c4a0' => 
    array (
      0 => './admin/themes/default/template/include/add_album.inc.tpl',
      1 => 1383486932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19128984435466f2fb8ce655-08958900',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f2fb8d8e00_98235820',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f2fb8d8e00_98235820')) {function content_5466f2fb8d8e00_98235820($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
  jQuery(".addAlbumOpen").colorbox({
    inline: true,
    href: "#addAlbumForm",
    onComplete: function() {
      var $albumSelect = jQuery("#albumSelect");

      jQuery("input[name=category_name]").focus();
      
      jQuery("#category_parent").html('<option value="0">------------</option>')
        .append($albumSelect.html())
        .val($albumSelect.val() || 0);
    }
  });

  jQuery("#addAlbumForm form").submit(function() {
      jQuery("#categoryNameError").text("");
      
      var parent_id = jQuery("select[name=category_parent] option:selected").val(),
          name = jQuery("input[name=category_name]").val();

      jQuery.ajax({
        url: "ws.php",
        dataType: 'json',
        data: {
          format: 'json',
          method: 'pwg.categories.add',
          parent: parent_id,
          name: name
        },
        beforeSend: function() {
          jQuery("#albumCreationLoading").show();
        },
        success: function(data) {
          jQuery("#albumCreationLoading").hide();
          jQuery(".addAlbumOpen").colorbox.close();

          var newAlbum = data.result.id,
              newAlbum_name = '';
              
          if (parent_id!=0) {
            newAlbum_name = jQuery("#category_parent").find("option[value="+ parent_id +"]").text() +' / ';
          }
          newAlbum_name+= name;
          
          var new_option = jQuery("<option/>")
              .attr("value", newAlbum)
              .attr("selected", "selected")
              .text(newAlbum_name);

          var $albumSelect = jQuery("#albumSelect");
          $albumSelect.find("option").removeAttr('selected');
          
          if (parent_id==0) {
            $albumSelect.prepend(new_option);
          }
          else {
            $albumSelect.find("option[value="+ parent_id +"]").after(new_option);
          }

          jQuery("#addAlbumForm form input[name=category_name]").val('');
          jQuery("#albumSelection").show();

          return true;
        },
        error: function(XMLHttpRequest, textStatus, errorThrows) {
            jQuery("#albumCreationLoading").hide();
            jQuery("#categoryNameError").text(errorThrows).css("color", "red");
        }
      });

      return false;
  });
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div style="display:none">
  <div id="addAlbumForm" style="text-align:left;padding:1em;">
    <form>
      <?php echo l10n('Parent album');?>
<br>
      <select id="category_parent" name="category_parent">
      </select>
      <br><br>
      
      <?php echo l10n('Album name');?>
<br>
      <input name="category_name" type="text" maxlength="255"> <span id="categoryNameError"></span>
      <br><br><br>
      
      <input type="submit" value="<?php echo l10n('Create');?>
">
      <span id="albumCreationLoading" style="display:none"><img src="themes/default/images/ajax-loader-small.gif"></span>
    </form>
  </div>
</div>
<?php }} ?>