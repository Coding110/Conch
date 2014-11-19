<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:42:01
         compiled from "./themes/becktu/template/about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8294472925466cb89501c48-95066898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf2d38cbae33e48b5af3064162c0ad2ce8872a48' => 
    array (
      0 => './themes/becktu/template/about.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8294472925466cb89501c48-95066898',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'U_HOME' => 0,
    'LEVEL_SEPARATOR' => 0,
    'ABOUT_MESSAGE' => 0,
    'THEME_ABOUT' => 0,
    'about_msgs' => 0,
    'elt' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cb8953ac09_82125155',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cb8953ac09_82125155')) {function content_5466cb8953ac09_82125155($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">
  <div class="titrePage">
    <ul class="categoryActions">
    </ul>
    <h2><a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><?php echo l10n('Home');?>
</a><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
<?php echo l10n('About');?>
</h2>
  </div>
  
<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <div id="piwigoAbout">
  <?php echo $_smarty_tpl->tpl_vars['ABOUT_MESSAGE']->value;?>

<?php if (isset($_smarty_tpl->tpl_vars['THEME_ABOUT']->value)){?>
  <ul>
   <li><?php echo $_smarty_tpl->tpl_vars['THEME_ABOUT']->value;?>
</li>
  </ul>
<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['about_msgs']->value)){?>
<?php  $_smarty_tpl->tpl_vars['elt'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['elt']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['about_msgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['elt']->key => $_smarty_tpl->tpl_vars['elt']->value){
$_smarty_tpl->tpl_vars['elt']->_loop = true;
?>
    <?php echo $_smarty_tpl->tpl_vars['elt']->value;?>

<?php } ?>
<?php }?>
  </div>
</div>
<?php }} ?>