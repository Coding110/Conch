<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:39:46
         compiled from "./admin/themes/default/template/themes_installed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6338389765466cb023b77b4-52984329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af4fd08b77e3a07cee5a7765e774b4436a96beee' => 
    array (
      0 => './admin/themes/default/template/themes_installed.tpl',
      1 => 1382180651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6338389765466cb023b77b4-52984329',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tpl_themes' => 0,
    'field_name' => 0,
    'theme' => 0,
    'author' => 0,
    'version' => 0,
    'deactivate_baseurl' => 0,
    'set_default_baseurl' => 0,
    'activate_baseurl' => 0,
    'delete_baseurl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cb024a4146_35480960',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cb024a4146_35480960')) {function content_5466cb024a4146_35480960($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('include/colorbox.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function() {
  $("a.preview-box").colorbox();
  
  jQuery('.showInfo').tipTip({
    'delay' : 0,
    'fadeIn' : 200,
    'fadeOut' : 200,
    'maxWidth':'300px',
    'keepAlive':true,
    'activation':'click'
  });
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="titrePage">
  <h2><?php echo l10n('Installed Themes');?>
</h2>
</div>

<div id="themesContent">

<?php if (isset($_smarty_tpl->tpl_vars['field_name'])) {$_smarty_tpl->tpl_vars['field_name'] = clone $_smarty_tpl->tpl_vars['field_name'];
$_smarty_tpl->tpl_vars['field_name']->value = 'null'; $_smarty_tpl->tpl_vars['field_name']->nocache = null; $_smarty_tpl->tpl_vars['field_name']->scope = 0;
} else $_smarty_tpl->tpl_vars['field_name'] = new Smarty_variable('null', null, 0);?> 
<?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tpl_themes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value){
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?>
    
<?php if ($_smarty_tpl->tpl_vars['field_name']->value!=$_smarty_tpl->tpl_vars['theme']->value['STATE']){?>
<?php if ($_smarty_tpl->tpl_vars['field_name']->value!='null'){?>
    </div>
  </fieldset>
<?php }?>
  <fieldset>
    <legend>
<?php if ($_smarty_tpl->tpl_vars['theme']->value['STATE']=='active'){?>
      <?php echo l10n('Active Themes');?>

<?php }else{ ?>
      <?php echo l10n('Inactive Themes');?>

<?php }?>
    </legend>
    <div class="themeBoxes">
  <?php if (isset($_smarty_tpl->tpl_vars['field_name'])) {$_smarty_tpl->tpl_vars['field_name'] = clone $_smarty_tpl->tpl_vars['field_name'];
$_smarty_tpl->tpl_vars['field_name']->value = $_smarty_tpl->tpl_vars['theme']->value['STATE']; $_smarty_tpl->tpl_vars['field_name']->nocache = null; $_smarty_tpl->tpl_vars['field_name']->scope = 0;
} else $_smarty_tpl->tpl_vars['field_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['theme']->value['STATE'], null, 0);?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['theme']->value['AUTHOR'])){?>
<?php if (!empty($_smarty_tpl->tpl_vars['theme']->value['AUTHOR_URL'])){?>
      <?php if (isset($_smarty_tpl->tpl_vars['author'])) {$_smarty_tpl->tpl_vars['author'] = clone $_smarty_tpl->tpl_vars['author'];
$_smarty_tpl->tpl_vars['author']->value = sprintf("<a href='%s'>%s</a>",$_smarty_tpl->tpl_vars['theme']->value['AUTHOR_URL'],$_smarty_tpl->tpl_vars['theme']->value['AUTHOR']); $_smarty_tpl->tpl_vars['author']->nocache = null; $_smarty_tpl->tpl_vars['author']->scope = 0;
} else $_smarty_tpl->tpl_vars['author'] = new Smarty_variable(sprintf("<a href='%s'>%s</a>",$_smarty_tpl->tpl_vars['theme']->value['AUTHOR_URL'],$_smarty_tpl->tpl_vars['theme']->value['AUTHOR']), null, 0);?>
<?php }else{ ?>
      <?php if (isset($_smarty_tpl->tpl_vars['author'])) {$_smarty_tpl->tpl_vars['author'] = clone $_smarty_tpl->tpl_vars['author'];
$_smarty_tpl->tpl_vars['author']->value = (('<u>').($_smarty_tpl->tpl_vars['theme']->value['AUTHOR'])).('</u>'); $_smarty_tpl->tpl_vars['author']->nocache = null; $_smarty_tpl->tpl_vars['author']->scope = 0;
} else $_smarty_tpl->tpl_vars['author'] = new Smarty_variable((('<u>').($_smarty_tpl->tpl_vars['theme']->value['AUTHOR'])).('</u>'), null, 0);?>
<?php }?>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['theme']->value['VISIT_URL'])){?>
    <?php if (isset($_smarty_tpl->tpl_vars['version'])) {$_smarty_tpl->tpl_vars['version'] = clone $_smarty_tpl->tpl_vars['version'];
$_smarty_tpl->tpl_vars['version']->value = (((("<a class='externalLink' href='").($_smarty_tpl->tpl_vars['theme']->value['VISIT_URL'])).("'>")).($_smarty_tpl->tpl_vars['theme']->value['VERSION'])).("</a>"); $_smarty_tpl->tpl_vars['version']->nocache = null; $_smarty_tpl->tpl_vars['version']->scope = 0;
} else $_smarty_tpl->tpl_vars['version'] = new Smarty_variable((((("<a class='externalLink' href='").($_smarty_tpl->tpl_vars['theme']->value['VISIT_URL'])).("'>")).($_smarty_tpl->tpl_vars['theme']->value['VERSION'])).("</a>"), null, 0);?>
<?php }else{ ?>
    <?php if (isset($_smarty_tpl->tpl_vars['version'])) {$_smarty_tpl->tpl_vars['version'] = clone $_smarty_tpl->tpl_vars['version'];
$_smarty_tpl->tpl_vars['version']->value = $_smarty_tpl->tpl_vars['theme']->value['VERSION']; $_smarty_tpl->tpl_vars['version']->nocache = null; $_smarty_tpl->tpl_vars['version']->scope = 0;
} else $_smarty_tpl->tpl_vars['version'] = new Smarty_variable($_smarty_tpl->tpl_vars['theme']->value['VERSION'], null, 0);?>
<?php }?>
  <div class="themeBox<?php if ($_smarty_tpl->tpl_vars['theme']->value['IS_DEFAULT']){?> themeDefault<?php }?>">
    <div class="themeName">
      <?php echo $_smarty_tpl->tpl_vars['theme']->value['NAME'];?>
 <?php if ($_smarty_tpl->tpl_vars['theme']->value['IS_DEFAULT']){?><em>(<?php echo l10n('default');?>
)</em><?php }?> <?php if ($_smarty_tpl->tpl_vars['theme']->value['IS_MOBILE']){?><em>(<?php echo l10n('Mobile');?>
)</em><?php }?>
      <a class="icon-info-circled-1 showInfo" title="<?php if (!empty($_smarty_tpl->tpl_vars['author']->value)){?><?php echo l10n('By %s',$_smarty_tpl->tpl_vars['author']->value);?>
 | <?php }?><?php echo l10n('Version');?>
 <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
<br/><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['theme']->value['DESC'], ENT_QUOTES, 'UTF-8', true);?>
"></a>
    </div>
    <div class="themeShot"><a href="<?php echo $_smarty_tpl->tpl_vars['theme']->value['SCREENSHOT'];?>
" class="preview-box" title="<?php echo $_smarty_tpl->tpl_vars['theme']->value['NAME'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['theme']->value['SCREENSHOT'];?>
" alt=""></a></div>
    <div class="themeActions">
      <div>
<?php if ($_smarty_tpl->tpl_vars['theme']->value['STATE']=='active'){?>
<?php if ($_smarty_tpl->tpl_vars['theme']->value['DEACTIVABLE']){?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['deactivate_baseurl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['theme']->value['ID'];?>
" class="tiptip" title="<?php echo l10n('Forbid this theme to users');?>
"><?php echo l10n('Deactivate');?>
</a>
<?php }else{ ?>
      <span title="<?php echo $_smarty_tpl->tpl_vars['theme']->value['DEACTIVATE_TOOLTIP'];?>
" class="tiptip"><?php echo l10n('Deactivate');?>
</span>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['theme']->value['IS_DEFAULT']){?>
      | <a href="<?php echo $_smarty_tpl->tpl_vars['set_default_baseurl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['theme']->value['ID'];?>
" class="tiptip" title="<?php echo l10n('Set as default theme for unregistered and new users');?>
"><?php echo l10n('Default');?>
</a>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['theme']->value['ADMIN_URI']){?>
      <br><a href="<?php echo $_smarty_tpl->tpl_vars['theme']->value['ADMIN_URI'];?>
" class="tiptip" title="<?php echo l10n('Configuration');?>
"><?php echo l10n('Configuration');?>
</a>
<?php }?>
<?php }else{ ?>
<?php if ($_smarty_tpl->tpl_vars['theme']->value['ACTIVABLE']){?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['activate_baseurl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['theme']->value['ID'];?>
" title="<?php echo l10n('Make this theme available to users');?>
" class="tiptip"><?php echo l10n('Activate');?>
</a>
<?php }else{ ?>
      <span title="<?php echo $_smarty_tpl->tpl_vars['theme']->value['ACTIVATE_TOOLTIP'];?>
" class="tiptip"><?php echo l10n('Activate');?>
</span>
<?php }?>
      |
<?php if ($_smarty_tpl->tpl_vars['theme']->value['DELETABLE']){?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['delete_baseurl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['theme']->value['ID'];?>
" onclick="return confirm('<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');" title="<?php echo l10n('Delete this theme');?>
"><?php echo l10n('Delete');?>
</a>
<?php }else{ ?>
      <span title="<?php echo $_smarty_tpl->tpl_vars['theme']->value['DELETE_TOOLTIP'];?>
" class="tiptip"><?php echo l10n('Delete');?>
</span>
<?php }?>
<?php }?>
      </div>
    </div> <!-- themeActions -->
  </div>
  
<?php } ?>
</div> <!-- themeBoxes -->
</fieldset>

</div> <!-- themesContent -->
<?php }} ?>