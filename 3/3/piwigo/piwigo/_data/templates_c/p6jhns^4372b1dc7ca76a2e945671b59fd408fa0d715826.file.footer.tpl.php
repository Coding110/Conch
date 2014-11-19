<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:08
         compiled from "./admin/themes/default/template/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12765516425466c8c086c1e6-45303684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4372b1dc7ca76a2e945671b59fd408fa0d715826' => 
    array (
      0 => './admin/themes/default/template/footer.tpl',
      1 => 1321111283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12765516425466c8c086c1e6-45303684',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'footer_elements' => 0,
    'v' => 0,
    'debug' => 0,
    'PHPWG_URL' => 0,
    'VERSION' => 0,
    'pwgmenu' => 0,
    'CONTACT_MAIL' => 0,
    'ENABLE_SYNCHRONIZATION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c08b5b91_34703692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c08b5b91_34703692')) {function content_5466c8c08b5b91_34703692($_smarty_tpl) {?>
</div> <!-- pwgMain -->
<?php if (isset($_smarty_tpl->tpl_vars['footer_elements']->value)){?>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['footer_elements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['v']->value;?>

<?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['debug']->value['QUERIES_LIST'])){?>
<div id="debug">
<?php echo $_smarty_tpl->tpl_vars['debug']->value['QUERIES_LIST'];?>

</div>
<?php }?>

<div id="footer">
  <div id="piwigoInfos">
 

  <?php echo l10n('Powered by');?>

  <a class="externalLink" href="<?php echo $_smarty_tpl->tpl_vars['PHPWG_URL']->value;?>
" title="<?php echo l10n('Visit Piwigo project website');?>
">
  <span class="Piwigo">Piwigo</span></a>
  <?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>

  | <a class="externalLink" href="<?php echo $_smarty_tpl->tpl_vars['pwgmenu']->value['WIKI'];?>
" title="<?php echo l10n('Read Piwigo Documentation');?>
"><?php echo l10n('Documentation');?>
</a>
  | <a class="externalLink" href="<?php echo $_smarty_tpl->tpl_vars['pwgmenu']->value['FORUM'];?>
" title="<?php echo l10n('Get Support on Piwigo Forum');?>
"><?php echo l10n('Support');?>
</a>
  </div> <!-- piwigoInfos -->

  <div id="pageInfos">
<?php if (isset($_smarty_tpl->tpl_vars['debug']->value['TIME'])){?>
 <?php echo l10n('Page generated in');?>
 <?php echo $_smarty_tpl->tpl_vars['debug']->value['TIME'];?>
 (<?php echo $_smarty_tpl->tpl_vars['debug']->value['NB_QUERIES'];?>
 <?php echo l10n('SQL queries in');?>
 <?php echo $_smarty_tpl->tpl_vars['debug']->value['SQL_TIME'];?>
) -
<?php }?>
  <?php echo l10n('Contact');?>

  <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['CONTACT_MAIL']->value;?>
?subject=<?php echo rawurlencode(l10n('A comment on your site'));?>
"><?php echo l10n('Webmaster');?>
</a>
  </div> <!-- pageInfos -->

</div> <!-- footer -->
</div> <!-- the_page -->


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.tipTip','load'=>'async','path'=>'themes/default/js/plugins/jquery.tipTip.minified.js'),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.tipTip')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.tipTip'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function() {
	jQuery('#pwgHead A[title], #footer A[title], .themeActions .tiptip, .languageActions .tiptip').tipTip({
			'delay' : 0,
			'fadeIn' : 200,
			'fadeOut' : 200
	});
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.tipTip'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<!-- BEGIN get_combined_scripts -->
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_combined_scripts'][0][0]->func_get_combined_scripts(array('load'=>'footer'),$_smarty_tpl);?>

<!-- END get_combined_scripts -->


<script type='text/javascript'>
  jQuery(document).ready(function() {
    $("a.externalLink").click(function() {
      window.open($(this).attr("href"));
      return false;
    });
  });
</script>


<?php if (!$_smarty_tpl->tpl_vars['ENABLE_SYNCHRONIZATION']->value){?>

<script type='text/javascript'>
  $(document).ready(function() {
    $("#helpSynchro").hide();
  });
</script>

<?php }?>

</body>
</html><?php }} ?>