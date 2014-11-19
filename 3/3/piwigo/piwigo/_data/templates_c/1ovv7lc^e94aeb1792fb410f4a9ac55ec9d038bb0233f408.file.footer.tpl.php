<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 15:44:05
         compiled from "./themes/default/template/mail/text/plain/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94986519154670445628ae9-05243172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e94aeb1792fb410f4a9ac55ec9d038bb0233f408' => 
    array (
      0 => './themes/default/template/mail/text/plain/footer.tpl',
      1 => 1383679409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94986519154670445628ae9-05243172',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'GALLERY_TITLE' => 0,
    'GALLERY_URL' => 0,
    'VERSION' => 0,
    'PHPWG_URL' => 0,
    'CONTACT_MAIL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670445637741_80822070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670445637741_80822070')) {function content_54670445637741_80822070($_smarty_tpl) {?>


----
<?php echo l10n('Sent by');?>
 "<?php echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['GALLERY_URL']->value;?>

<?php echo l10n('Powered by');?>
 "Piwigo<?php if (!empty($_smarty_tpl->tpl_vars['VERSION']->value)){?> <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
<?php }?>" <?php echo $_smarty_tpl->tpl_vars['PHPWG_URL']->value;?>

<?php echo l10n('Contact');?>
: <?php echo $_smarty_tpl->tpl_vars['CONTACT_MAIL']->value;?>
<?php }} ?>