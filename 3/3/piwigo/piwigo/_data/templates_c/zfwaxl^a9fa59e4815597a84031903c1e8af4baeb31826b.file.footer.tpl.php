<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "./themes/smartpocket/template/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16059527475467fa1670a304-37304036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9fa59e4815597a84031903c1e8af4baeb31826b' => 
    array (
      0 => './themes/smartpocket/template/footer.tpl',
      1 => 1394569188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16059527475467fa1670a304-37304036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'thumb_navbar' => 0,
    'navbar' => 0,
    'ELEMENT_CONTENT' => 0,
    'PHPWG_URL' => 0,
    'VERSION' => 0,
    'CONTACT_MAIL' => 0,
    'TOGGLE_MOBILE_THEME_URL' => 0,
    'COOKIE_PATH' => 0,
    'footer_elements' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa1679c601_16480422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa1679c601_16480422')) {function content_5467fa1679c601_16480422($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['thumb_navbar']->value)){?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('navbar'=>$_smarty_tpl->tpl_vars['thumb_navbar']->value), 0);?>

<?php }elseif(!empty($_smarty_tpl->tpl_vars['navbar']->value)&&!isset($_smarty_tpl->tpl_vars['ELEMENT_CONTENT']->value)){?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
<div data-role="footer" class="pwg_footer">
  <h6>
	<?php echo l10n('Powered by');?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['PHPWG_URL']->value;?>
" class="Piwigo">Piwigo</a>
	<?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>

<?php if (isset($_smarty_tpl->tpl_vars['CONTACT_MAIL']->value)){?>
	- <?php echo l10n('Contact');?>

	<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['CONTACT_MAIL']->value;?>
?subject=<?php echo rawurlencode(l10n('A comment on your site'));?>
"><?php echo l10n('Webmaster');?>
</a>
<?php }?>
  <br><?php echo l10n('View in');?>
 :
    <b><?php echo l10n('Mobile');?>
</b> | <a href="<?php echo $_smarty_tpl->tpl_vars['TOGGLE_MOBILE_THEME_URL']->value;?>
"><?php echo l10n('Desktop');?>
</a>
  </h6>
</div>
<?php }?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

document.cookie = 'screen_size='+jQuery(document).width()+'x'+jQuery(document).height()+';path=<?php echo $_smarty_tpl->tpl_vars['COOKIE_PATH']->value;?>
';
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load'=>'footer'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['footer_elements']->value)){?>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['footer_elements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['v']->value;?>

<?php } ?>
<?php }?>
</div><!-- /page -->

</body>
</html><?php }} ?>