<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "./themes/smartpocket/template/menubar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15824913855467fa164679b8-35161942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cd0d2c52d2687cc9edd7d29a83087d4dc798c6a' => 
    array (
      0 => './themes/smartpocket/template/menubar.tpl',
      1 => 1388431093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15824913855467fa164679b8-35161942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blocks' => 0,
    'block' => 0,
    'id' => 0,
    'the_block' => 0,
    'TOGGLE_MOBILE_THEME_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa1652f982_40483682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa1652f982_40483682')) {function content_5467fa1652f982_40483682($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/piwigo/include/smarty/libs/plugins/modifier.replace.php';
?><ul data-role="listview">
  <li data-icon="delete"><a href="#menubar" data-rel="close"><?php echo l10n('Close');?>
</a></li>
</ul>
<?php if (!empty($_smarty_tpl->tpl_vars['blocks']->value)){?>
<div data-role="collapsible-set" data-inset="false">
<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blocks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value){
$_smarty_tpl->tpl_vars['block']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['block']->key;
?>
		<div data-role="collapsible" data-inset="false" data-icon="false">
<?php if (!empty($_smarty_tpl->tpl_vars['block']->value->template)){?>
<?php $_smarty_tpl->tpl_vars[$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('the_block',$_smarty_tpl->tpl_vars['id']->value)] = new Smarty_variable($_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['block']->value->template, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0));?>

    <?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['the_block']->value,'dt','h3'),'<dd>',''),'</dd>','');?>

<?php }else{ ?>
		<?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['block']->value->raw_content,'dt','h3'),'<dd>',''),'</dd>','');?>

<?php }?>
    </div>
<?php } ?>
</div>
<?php }?>
<br>
<ul data-role="listview">
  <li data-role="list-divider"><?php echo l10n('View in');?>
</li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['TOGGLE_MOBILE_THEME_URL']->value;?>
"><?php echo l10n('Desktop');?>
</a></li>
</ul>
<?php }} ?>