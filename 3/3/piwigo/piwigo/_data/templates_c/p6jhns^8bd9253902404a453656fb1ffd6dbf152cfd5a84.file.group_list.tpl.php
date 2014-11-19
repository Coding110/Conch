<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:26:06
         compiled from "./admin/themes/default/template/group_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144986728554670e1e051404-59264271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bd9253902404a453656fb1ffd6dbf152cfd5a84' => 
    array (
      0 => './admin/themes/default/template/group_list.tpl',
      1 => 1387803394,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144986728554670e1e051404-59264271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'F_ADD_ACTION' => 0,
    'PWG_TOKEN' => 0,
    'groups' => 0,
    'group' => 0,
    'element_set_groupe_plugins_actions' => 0,
    'action' => 0,
    'mergeDefaultValue' => 0,
    'duplicateDefaultValue' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670e1e115b57_63957088',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670e1e115b57_63957088')) {function content_54670e1e115b57_63957088($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


$(document).ready(function() {
  /**
   * Add group
   */
  jQuery("#addGroup").click(function() {
    jQuery("#addGroupForm").toggle();
    jQuery("input[name=groupname]").focus();
    return false;
  });

  jQuery("#addGroupClose").click(function() {
    jQuery("#addGroupForm").hide();
    return false;
  });

  $('.groups input').change(function () { $(this).parent('p').toggleClass('group_select'); });
  $(".grp_action").hide();
  $("input.group_selection").click(function() {

    var nbSelected = 0;
    nbSelected = $("input.group_selection").filter(':checked').length;

    if (nbSelected == 0) {
      $("#permitAction").hide();
      $("#forbidAction").show();
    }
    else {
      $("#permitAction").show();
      $("#forbidAction").hide();
    }
    $("p[group_id="+$(this).prop("value")+"]").each(function () {
     $(this).toggle();
    });

    if (nbSelected<2) {
      $("#two_to_select").show();
      $("#two_atleast").hide();
    }
    else {
      $("#two_to_select").hide();
      $("#two_atleast").show();
    }
  });
  $("[id^=action_]").hide();
  $("select[name=selectAction]").change(function () {
    $("[id^=action_]").hide();
    $("#action_"+$(this).prop("value")).show();
    if ($(this).val() != -1 ) {
      $("#applyActionBlock").show();
    }
    else {
      $("#applyActionBlock").hide();
    }
  });
});


<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>




<div class="titrePage">
  <h2><?php echo l10n('Group management');?>
</h2>
</div>

<p class="showCreateAlbum" id="showAddGroup">
  <a class="icon-plus-circled" href="#" id="addGroup"><?php echo l10n('Add group');?>
</a>
</p>

<form method="post" style="display:none" id="addGroupForm" name="add_user" action="<?php echo $_smarty_tpl->tpl_vars['F_ADD_ACTION']->value;?>
" class="properties">
  <fieldset>
    <legend><?php echo l10n('Add group');?>
</legend>

    <p>
      <strong><?php echo l10n('Group name');?>
</strong><br>
      <input type="text" name="groupname" maxlength="50" size="20">
    </p>

    <p class="actionButtons">
      <input class="submit" name="submit_add" type="submit" value="<?php echo l10n('Add');?>
">
      <a href="#" id="addGroupClose"><?php echo l10n('Cancel');?>
</a>
    </p>

    <input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">

  </fieldset>
</form>

<form method="post" name="add_user" action="<?php echo $_smarty_tpl->tpl_vars['F_ADD_ACTION']->value;?>
" class="properties">
  <input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">

  <ul class="groups">
<?php if (!empty($_smarty_tpl->tpl_vars['groups']->value)){?>
<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
    <li>
      <label><p><?php echo $_smarty_tpl->tpl_vars['group']->value['NAME'];?>
<i><small><?php echo $_smarty_tpl->tpl_vars['group']->value['IS_DEFAULT'];?>
</small></i><input class="group_selection" name="group_selection[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['ID'];?>
"></p></label>
      <p class="list_user"><?php if ($_smarty_tpl->tpl_vars['group']->value['MEMBERS']>0){?><?php echo $_smarty_tpl->tpl_vars['group']->value['MEMBERS'];?>
<br><?php echo $_smarty_tpl->tpl_vars['group']->value['L_MEMBERS'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['group']->value['MEMBERS'];?>
<?php }?></p>
      <a class="icon-lock group_perm" href="<?php echo $_smarty_tpl->tpl_vars['group']->value['U_PERM'];?>
" title="<?php echo l10n('Permissions');?>
"><?php echo l10n('Permissions');?>
</a>
    </li>
<?php } ?>
<?php }?>
  </ul>

  <fieldset id="action">
    <legend><?php echo l10n('Action');?>
</legend>
      <div id="forbidAction"><?php echo l10n('No group selected, no action possible.');?>
</div>
      <div id="permitAction" style="display:none">

        <select name="selectAction">
          <option value="-1"><?php echo l10n('Choose an action');?>
</option>
          <option disabled="disabled">------------------</option>
          <option value="rename"><?php echo l10n('Rename');?>
</option>
          <option value="delete"><?php echo l10n('Delete');?>
</option>
          <option value="merge"><?php echo l10n('Merge selected groups');?>
</option>
          <option value="duplicate"><?php echo l10n('Duplicate');?>
</option>
          <option value="toggle_default"><?php echo l10n('Toggle \'default group\' property');?>
</option>
<?php if (!empty($_smarty_tpl->tpl_vars['element_set_groupe_plugins_actions']->value)){?>
<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['element_set_groupe_plugins_actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value){
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['action']->value['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['action']->value['NAME'];?>
</option>
<?php } ?>
<?php }?>
        </select>

        <!-- rename -->
        <div id="action_rename" class="bulkAction">
<?php if (!empty($_smarty_tpl->tpl_vars['groups']->value)){?>
<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
        <p group_id="<?php echo $_smarty_tpl->tpl_vars['group']->value['ID'];?>
" class="grp_action">
          <input type="text" class="large" name="rename_<?php echo $_smarty_tpl->tpl_vars['group']->value['ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['NAME'];?>
" onfocus="this.value=(this.value=='<?php echo $_smarty_tpl->tpl_vars['group']->value['NAME'];?>
') ? '' : this.value;" onblur="this.value=(this.value=='') ? '<?php echo $_smarty_tpl->tpl_vars['group']->value['NAME'];?>
' : this.value;">
        </p>
<?php } ?>
<?php }?>
        </div>

        <!-- merge -->
        <div id="action_merge" class="bulkAction">
          <p id="two_to_select"><?php echo l10n('Please select at least two groups');?>
</p>
          <?php if (isset($_smarty_tpl->tpl_vars['mergeDefaultValue'])) {$_smarty_tpl->tpl_vars['mergeDefaultValue'] = clone $_smarty_tpl->tpl_vars['mergeDefaultValue'];
$_smarty_tpl->tpl_vars['mergeDefaultValue']->value = l10n('Type here the name of the new group'); $_smarty_tpl->tpl_vars['mergeDefaultValue']->nocache = null; $_smarty_tpl->tpl_vars['mergeDefaultValue']->scope = 0;
} else $_smarty_tpl->tpl_vars['mergeDefaultValue'] = new Smarty_variable(l10n('Type here the name of the new group'), null, 0);?>
          <p id="two_atleast">
            <input type="text" class="large" name="merge" value="<?php echo $_smarty_tpl->tpl_vars['mergeDefaultValue']->value;?>
" onfocus="this.value=(this.value=='<?php echo $_smarty_tpl->tpl_vars['mergeDefaultValue']->value;?>
') ? '' : this.value;" onblur="this.value=(this.value=='') ? '<?php echo $_smarty_tpl->tpl_vars['mergeDefaultValue']->value;?>
' : this.value;">
          </p>
        </div>

        <!-- delete -->
        <div id="action_delete" class="bulkAction">
        <p><label><input type="checkbox" name="confirm_deletion" value="1"> <?php echo l10n('Are you sure?');?>
</label></p>
        </div>

        <!-- duplicate -->
        <div id="action_duplicate" class="bulkAction">
        <?php if (isset($_smarty_tpl->tpl_vars['duplicateDefaultValue'])) {$_smarty_tpl->tpl_vars['duplicateDefaultValue'] = clone $_smarty_tpl->tpl_vars['duplicateDefaultValue'];
$_smarty_tpl->tpl_vars['duplicateDefaultValue']->value = l10n('Type here the name of the new group'); $_smarty_tpl->tpl_vars['duplicateDefaultValue']->nocache = null; $_smarty_tpl->tpl_vars['duplicateDefaultValue']->scope = 0;
} else $_smarty_tpl->tpl_vars['duplicateDefaultValue'] = new Smarty_variable(l10n('Type here the name of the new group'), null, 0);?>
<?php if (!empty($_smarty_tpl->tpl_vars['groups']->value)){?>
<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
        <p group_id="<?php echo $_smarty_tpl->tpl_vars['group']->value['ID'];?>
" class="grp_action">
          <?php echo $_smarty_tpl->tpl_vars['group']->value['NAME'];?>
 > <input type="text" class="large" name="duplicate_<?php echo $_smarty_tpl->tpl_vars['group']->value['ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['duplicateDefaultValue']->value;?>
" onfocus="this.value=(this.value=='<?php echo $_smarty_tpl->tpl_vars['duplicateDefaultValue']->value;?>
') ? '' : this.value;" onblur="this.value=(this.value=='') ? '<?php echo $_smarty_tpl->tpl_vars['duplicateDefaultValue']->value;?>
' : this.value;">
        </p>
<?php } ?>
<?php }?>
        </div>

        <!-- toggle_default -->
        <div id="action_toggle_default" class="bulkAction">
<?php if (!empty($_smarty_tpl->tpl_vars['groups']->value)){?>
<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
        <p group_id="<?php echo $_smarty_tpl->tpl_vars['group']->value['ID'];?>
" class="grp_action">
          <?php echo $_smarty_tpl->tpl_vars['group']->value['NAME'];?>
 > <?php if (empty($_smarty_tpl->tpl_vars['group']->value['IS_DEFAULT'])){?><?php echo l10n('This group will be set to default');?>
<?php }else{ ?><?php echo l10n('This group will be unset to default');?>
<?php }?>
        </p>
<?php } ?>
<?php }?>
        </div>


        <!-- plugins -->
<?php if (!empty($_smarty_tpl->tpl_vars['element_set_groupe_plugins_actions']->value)){?>
<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['element_set_groupe_plugins_actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value){
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
        <div id="action_<?php echo $_smarty_tpl->tpl_vars['action']->value['ID'];?>
" class="bulkAction">
        <?php if (!empty($_smarty_tpl->tpl_vars['action']->value['CONTENT'])){?><?php echo $_smarty_tpl->tpl_vars['action']->value['CONTENT'];?>
<?php }?>
        </div>
<?php } ?>
<?php }?>
        <p id="applyActionBlock" style="display:none" class="actionButtons">
          <input id="applyAction" class="submit" type="submit" value="<?php echo l10n('Apply action');?>
" name="submit"> <span id="applyOnDetails"></span></p>
    </div> <!-- #permitAction -->
  </fieldset>
</form>
</form><?php }} ?>