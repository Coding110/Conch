<?php /* Smarty version Smarty-3.1.13, created on 2014-11-18 13:57:22
         compiled from "./admin/themes/default/template/cat_perm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1779091217546adfc247d5f0-60790095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '926064c1eb82602c9243ab4167149059a39aeb4f' => 
    array (
      0 => './admin/themes/default/template/cat_perm.tpl',
      1 => 1382180651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1779091217546adfc247d5f0-60790095',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CATEGORIES_NAV' => 0,
    'TABSHEET_TITLE' => 0,
    'F_ACTION' => 0,
    'private' => 0,
    'groups' => 0,
    'groups_selected' => 0,
    'users' => 0,
    'users_selected' => 0,
    'nb_users_granted_indirect' => 0,
    'user_granted_indirect_groups' => 0,
    'group_details' => 0,
    'INHERIT' => 0,
    'PWG_TOKEN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_546adfc24fc055_69355013',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546adfc24fc055_69355013')) {function content_546adfc24fc055_69355013($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.chosen','load'=>'footer','path'=>'themes/default/js/plugins/chosen.jquery.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/plugins/chosen.css"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function() {
  jQuery(".chzn-select").chosen();

  function checkStatusOptions() {
    if (jQuery("input[name=status]:checked").val() == "private") {
      jQuery("#privateOptions, #applytoSubAction").show();
    }
    else {
      jQuery("#privateOptions, #applytoSubAction").hide();
    }
  }

  checkStatusOptions();
  jQuery("#selectStatus").change(function() {
    checkStatusOptions();
  });

  jQuery("#indirectPermissionsDetailsShow").click(function(){
    jQuery("#indirectPermissionsDetailsShow").hide();
    jQuery("#indirectPermissionsDetailsHide").show();
    jQuery("#indirectPermissionsDetails").show();
    return false;
  });

  jQuery("#indirectPermissionsDetailsHide").click(function(){
    jQuery("#indirectPermissionsDetailsShow").show();
    jQuery("#indirectPermissionsDetailsHide").hide();
    jQuery("#indirectPermissionsDetails").hide();
    return false;
  });
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="titrePage">
  <h2><span style="letter-spacing:0"><?php echo $_smarty_tpl->tpl_vars['CATEGORIES_NAV']->value;?>
</span> &#8250; <?php echo l10n('Edit album');?>
 <?php echo $_smarty_tpl->tpl_vars['TABSHEET_TITLE']->value;?>
</h2>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="post" id="categoryPermissions">

<fieldset>
  <legend><?php echo l10n('Access type');?>
</legend>

  <p id="selectStatus">
    <label><input type="radio" name="status" value="public" <?php if (!$_smarty_tpl->tpl_vars['private']->value){?>checked="checked"<?php }?>> <strong><?php echo l10n('public');?>
</strong> : <em><?php echo l10n('any visitor can see this album');?>
</em></label>
    <br>
    <label><input type="radio" name="status" value="private" <?php if ($_smarty_tpl->tpl_vars['private']->value){?>checked="checked"<?php }?>> <strong><?php echo l10n('private');?>
</strong> : <em><?php echo l10n('visitors need to login and have the appropriate permissions to see this album');?>
</em></label>
  </p>
</fieldset>

<fieldset id="privateOptions">
  <legend><?php echo l10n('Groups and users');?>
</legend>

  <p>
<?php if (count($_smarty_tpl->tpl_vars['groups']->value)>0){?>
    <strong><?php echo l10n('Permission granted for groups');?>
</strong>
    <br>
    <select data-placeholder="<?php echo l10n('Select groups...');?>
" class="chzn-select" multiple style="width:700px;" name="groups[]">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['groups']->value,'selected'=>$_smarty_tpl->tpl_vars['groups_selected']->value),$_smarty_tpl);?>

    </select>
<?php }else{ ?>
    <?php echo l10n('There is no group in this gallery.');?>
 <a href="admin.php?page=group_list" class="externalLink"><?php echo l10n('Group management');?>
</a>
<?php }?>
  </p>

  <p>
    <strong><?php echo l10n('Permission granted for users');?>
</strong>
    <br>
    <select data-placeholder="<?php echo l10n('Select users...');?>
" class="chzn-select" multiple style="width:700px;" name="users[]">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['users']->value,'selected'=>$_smarty_tpl->tpl_vars['users_selected']->value),$_smarty_tpl);?>

    </select>
  </p>

<?php if (isset($_smarty_tpl->tpl_vars['nb_users_granted_indirect']->value)){?>
  <p>
    <?php echo l10n('%u users have automatic permission because they belong to a granted group.',$_smarty_tpl->tpl_vars['nb_users_granted_indirect']->value);?>

    <a href="#" id="indirectPermissionsDetailsHide" style="display:none"><?php echo l10n('hide details');?>
</a>
    <a href="#" id="indirectPermissionsDetailsShow"><?php echo l10n('show details');?>
</a>

    <ul id="indirectPermissionsDetails" style="display:none">
<?php  $_smarty_tpl->tpl_vars['group_details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_granted_indirect_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_details']->key => $_smarty_tpl->tpl_vars['group_details']->value){
$_smarty_tpl->tpl_vars['group_details']->_loop = true;
?>
      <li><strong><?php echo $_smarty_tpl->tpl_vars['group_details']->value['group_name'];?>
</strong> : <?php echo $_smarty_tpl->tpl_vars['group_details']->value['group_users'];?>
</li>
<?php } ?>
    </ul>
  </p>
<?php }?>


</fieldset>

  <p style="margin:12px;text-align:left;">
    <input class="submit" type="submit" value="<?php echo l10n('Save Settings');?>
" name="submit">
    <label id="applytoSubAction" style="display:none;"><input type="checkbox" name="apply_on_sub" <?php if ($_smarty_tpl->tpl_vars['INHERIT']->value){?>checked="checked"<?php }?>><?php echo l10n('Apply to sub-albums');?>
</label>
  </p>

<input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">
</form>
<?php }} ?>