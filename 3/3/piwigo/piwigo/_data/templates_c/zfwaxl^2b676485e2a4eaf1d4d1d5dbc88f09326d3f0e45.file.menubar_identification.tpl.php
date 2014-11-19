<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "./themes/smartpocket/template/menubar_identification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10671805515467fa165aed44-78057926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b676485e2a4eaf1d4d1d5dbc88f09326d3f0e45' => 
    array (
      0 => './themes/smartpocket/template/menubar_identification.tpl',
      1 => 1388431093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10671805515467fa165aed44-78057926',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'U_REGISTER' => 0,
    'U_LOGIN' => 0,
    'U_LOGOUT' => 0,
    'U_PROFILE' => 0,
    'U_ADMIN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa165e0210_40716274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa165e0210_40716274')) {function content_5467fa165e0210_40716274($_smarty_tpl) {?><h3><?php echo l10n('Identification');?>
</h3>
<ul data-role="listview">
  <?php if (isset($_smarty_tpl->tpl_vars['U_REGISTER']->value)){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['U_REGISTER']->value;?>
"><?php echo l10n('Register');?>
</a></li><?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['U_LOGIN']->value)){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['U_LOGIN']->value;?>
"><?php echo l10n('Login');?>
</a></li><?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['U_LOGOUT']->value)){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['U_LOGOUT']->value;?>
"><?php echo l10n('Logout');?>
</a></li><?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['U_PROFILE']->value)){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['U_PROFILE']->value;?>
"><?php echo l10n('Customize');?>
</a></li><?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['U_ADMIN']->value)){?><li><a href="<?php echo $_smarty_tpl->tpl_vars['U_ADMIN']->value;?>
"><?php echo l10n('Administration');?>
</a></li><?php }?>
</ul>
<?php }} ?>