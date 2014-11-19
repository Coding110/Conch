<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:39:59
         compiled from "./admin/themes/default/template/languages_installed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18820324535466cb0f028b88-96908039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f393ac8a05c4fa1cf869b2de2d6570e74486daf' => 
    array (
      0 => './admin/themes/default/template/languages_installed.tpl',
      1 => 1321111283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18820324535466cb0f028b88-96908039',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language_states' => 0,
    'language_state' => 0,
    'languages' => 0,
    'language' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cb0f089216_40673035',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cb0f089216_40673035')) {function content_5466cb0f089216_40673035($_smarty_tpl) {?><div class="titrePage">
  <h2><?php echo l10n('Installed Languages');?>
</h2>
</div>

<?php  $_smarty_tpl->tpl_vars['language_state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language_state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['language_states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language_state']->key => $_smarty_tpl->tpl_vars['language_state']->value){
$_smarty_tpl->tpl_vars['language_state']->_loop = true;
?>
<fieldset>
  <legend>
<?php if ($_smarty_tpl->tpl_vars['language_state']->value=='active'){?>
  <?php echo l10n('Active Languages');?>


<?php }elseif($_smarty_tpl->tpl_vars['language_state']->value=='inactive'){?>
  <?php echo l10n('Inactive Languages');?>


<?php }?>
  </legend>
  <div class="languageBoxes">
<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['language']->value['state']==$_smarty_tpl->tpl_vars['language_state']->value){?>
  <div class="languageBox<?php if ($_smarty_tpl->tpl_vars['language']->value['is_default']){?> languageDefault<?php }?>">
    <div class="languageName"><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
<?php if ($_smarty_tpl->tpl_vars['language']->value['is_default']){?> <em>(<?php echo l10n('default');?>
)</em><?php }?></div>
    <div class="languageActions">
      <div>
<?php if ($_smarty_tpl->tpl_vars['language_state']->value=='active'){?>
<?php if ($_smarty_tpl->tpl_vars['language']->value['deactivable']){?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['language']->value['u_action'];?>
&amp;action=deactivate" class="tiptip" title="<?php echo l10n('Forbid this language to users');?>
"><?php echo l10n('Deactivate');?>
</a>
<?php }else{ ?>
      <span title="<?php echo $_smarty_tpl->tpl_vars['language']->value['deactivate_tooltip'];?>
"><?php echo l10n('Deactivate');?>
</span>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['language']->value['is_default']){?>
      | <a href="<?php echo $_smarty_tpl->tpl_vars['language']->value['u_action'];?>
&amp;action=set_default" class="tiptip" title="<?php echo l10n('Set as default language for unregistered and new users');?>
"><?php echo l10n('Default');?>
</a>
<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['language_state']->value=='inactive'){?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['language']->value['u_action'];?>
&amp;action=activate" class="tiptip" title="<?php echo l10n('Make this language available to users');?>
"><?php echo l10n('Activate');?>
</a>
      | <a href="<?php echo $_smarty_tpl->tpl_vars['language']->value['u_action'];?>
&amp;action=delete" onclick="return confirm('<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');" class="tiptip" title="<?php echo l10n('Delete this language');?>
"><?php echo l10n('Delete');?>
</a>
<?php }?>
      </div>
    </div> <!-- languageActions -->
  </div> <!-- languageBox -->
<?php }?>
<?php } ?>
  </div> <!-- languageBoxes -->
</fieldset>
<?php } ?>
<?php }} ?>