<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:39:39
         compiled from "./admin/themes/default/template/cat_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16503046145466cafbc80fa5-21030522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3917d48d784b6bb09a9b271cfc85e59f9e9d7c38' => 
    array (
      0 => './admin/themes/default/template/cat_list.tpl',
      1 => 1388663518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16503046145466cafbc80fa5-21030522',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CATEGORIES_NAV' => 0,
    'categories' => 0,
    'PARENT_EDIT' => 0,
    'F_ACTION' => 0,
    'PWG_TOKEN' => 0,
    'category' => 0,
    'themeconf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cafbd29340_38352150',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cafbd29340_38352150')) {function content_5466cafbd29340_38352150($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.ui.sortable')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.sortable'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
  jQuery(".drag_button").show();
  jQuery(".categoryLi").css("cursor","move");
  jQuery(".categoryUl").sortable({
    axis: "y",
    opacity: 0.8,
    update : function() {
      jQuery("#manualOrder").show();
      jQuery("#notManualOrder").hide();
      jQuery("#formAutoOrder").hide();
      jQuery("#formCreateAlbum").hide();
    }
  });

  jQuery("#categoryOrdering").submit(function(){
    ar = jQuery('.categoryUl').sortable('toArray');
    for(i=0;i<ar.length;i++) {
      cat = ar[i].split('cat_');
      document.getElementsByName('catOrd[' + cat[1] + ']')[0].value = i;
    }
  });

  jQuery("input[name=order_type]").click(function () {
    jQuery("#automatic_order_params").hide();
    if (jQuery("input[name=order_type]:checked").val() == "automatic") {
      jQuery("#automatic_order_params").show();
    }
  });

  jQuery("#addAlbumOpen").click(function(){
    jQuery("#formCreateAlbum").toggle();
    jQuery("input[name=virtual_name]").focus();
    jQuery("#formAutoOrder").hide();
  });

  jQuery("#addAlbumClose").click(function(){
    jQuery("#formCreateAlbum").hide();
  });


  jQuery("#autoOrderOpen").click(function(){
    jQuery("#formAutoOrder").toggle();
    jQuery("#formCreateAlbum").hide();
  });

  jQuery("#autoOrderClose").click(function(){
    jQuery("#formAutoOrder").hide();
  });

  jQuery("#cancelManualOrder").click(function(){
    jQuery(".categoryUl").sortable("cancel");
    jQuery("#manualOrder").hide();
    jQuery("#notManualOrder").show();
  });
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.sortable'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<h2><span style="letter-spacing:0"><?php echo $_smarty_tpl->tpl_vars['CATEGORIES_NAV']->value;?>
</span> &#8250; <?php echo l10n('Album list management');?>
</h2>
<p class="showCreateAlbum" id="notManualOrder">
  <a href="#" id="addAlbumOpen"><?php echo l10n('create a new album');?>
</a>
  <?php if (count($_smarty_tpl->tpl_vars['categories']->value)){?>| <a href="#" id="autoOrderOpen"><?php echo l10n('apply automatic sort order');?>
</a><?php }?>
  <?php if (($_smarty_tpl->tpl_vars['PARENT_EDIT']->value)){?>| <a href="<?php echo $_smarty_tpl->tpl_vars['PARENT_EDIT']->value;?>
"></span><?php echo l10n('edit');?>
</a><?php }?>
</p>
<form id="formCreateAlbum" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="post" style="display:none;">
  <fieldset>
      <legend><?php echo l10n('create a new album');?>
</legend>
      <input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">
      
      <p>
        <strong><?php echo l10n('Album name');?>
</strong><br>
        <input type="text" name="virtual_name" maxlength="255">
      </p>
      
      <p class="actionButtons">
        <input class="submit" name="submitAdd" type="submit" value="<?php echo l10n('Create');?>
">
        <a href="#" id="addAlbumClose"><?php echo l10n('Cancel');?>
</a>
      </p>
  </fieldset>
</form>
<?php if (count($_smarty_tpl->tpl_vars['categories']->value)){?>
<form id="formAutoOrder" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="post" style="display:none;">
  <fieldset>
    <legend><?php echo l10n('Automatic sort order');?>
</legend>
    <input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">
    
    <p><strong><?php echo l10n('Sort order');?>
</strong>
      <br><label><input type="radio" value="asc" name="ascdesc" checked="checked"><?php echo l10n('ascending');?>
</label>
      <br><label><input type="radio" value="desc" name="ascdesc"><?php echo l10n('descending');?>
</label>
    </p>
  
    <p>
      <label><input type="checkbox" name="recursive"> <strong><?php echo l10n('Apply to sub-albums');?>
</strong></label>
    </p>
  
    <p class="actionButtons">
      <input class="submit" name="submitAutoOrder" type="submit" value="<?php echo l10n('Save order');?>
">
      <a href="#" id="autoOrderClose"><?php echo l10n('Cancel');?>
</a>
    </p>
  </fieldset>
</form>
<?php }?>

<form id="categoryOrdering" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="post">
  <input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">
  <p id="manualOrder" style="display:none">
    <input class="submit" name="submitManualOrder" type="submit" value="<?php echo l10n('Save manual order');?>
">
    <?php echo l10n('... or ');?>
 <a href="#" id="cancelManualOrder"><?php echo l10n('cancel manual order');?>
</a>
  </p>
  
<?php if (count($_smarty_tpl->tpl_vars['categories']->value)){?>
  <ul class="categoryUl">
<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
    <li class="categoryLi<?php if ($_smarty_tpl->tpl_vars['category']->value['IS_VIRTUAL']){?> virtual_cat<?php }?>" id="cat_<?php echo $_smarty_tpl->tpl_vars['category']->value['ID'];?>
">
      <!-- category <?php echo $_smarty_tpl->tpl_vars['category']->value['ID'];?>
 -->
      <p class="albumTitle">
        <img src="<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['admin_icon_dir'];?>
/cat_move.png" class="drag_button" style="display:none;" alt="<?php echo l10n('Drag to re-order');?>
" title="<?php echo l10n('Drag to re-order');?>
">
        <strong><a href="<?php echo $_smarty_tpl->tpl_vars['category']->value['U_CHILDREN'];?>
" title="<?php echo l10n('manage sub-albums');?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['NAME'];?>
</a></strong>
        <span class="albumInfos"><span class="userSeparator">&middot;</span> <?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['category']->value['NB_PHOTOS']);?>
 <span class="userSeparator">&middot;</span> <?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['category']->value['NB_SUB_PHOTOS']);?>
 <?php echo l10n_dec('in %d sub-album','in %d sub-albums',$_smarty_tpl->tpl_vars['category']->value['NB_SUB_ALBUMS']);?>
</span>
      </p>

      <input type="hidden" name="catOrd[<?php echo $_smarty_tpl->tpl_vars['category']->value['ID'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['RANK'];?>
">

      <p class="albumActions">
        <a href="<?php echo $_smarty_tpl->tpl_vars['category']->value['U_EDIT'];?>
"><span class="icon-pencil"></span><?php echo l10n('Edit');?>
</a>
        | <a href="<?php echo $_smarty_tpl->tpl_vars['category']->value['U_CHILDREN'];?>
"><span class="icon-sitemap"></span><?php echo l10n('manage sub-albums');?>
</a>
<?php if (isset($_smarty_tpl->tpl_vars['category']->value['U_SYNC'])){?>
        | <a href="<?php echo $_smarty_tpl->tpl_vars['category']->value['U_SYNC'];?>
"><span class="icon-exchange"></span><?php echo l10n('Synchronize');?>
</a>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['category']->value['U_DELETE'])){?>
        | <a href="<?php echo $_smarty_tpl->tpl_vars['category']->value['U_DELETE'];?>
" onclick="return confirm('<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');"><span class="icon-trash"></span><?php echo l10n('delete album');?>
</a>
<?php }?>
<?php if (cat_admin_access($_smarty_tpl->tpl_vars['category']->value['ID'])){?>
        | <a href="<?php echo $_smarty_tpl->tpl_vars['category']->value['U_JUMPTO'];?>
"><?php echo l10n('jump to album');?>
 →</a>
<?php }?>
      </p>

    </li>
<?php } ?>
  </ul>
<?php }?>
</form>
<?php }} ?>