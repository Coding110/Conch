<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:15
         compiled from "./themes/becktu/template/mainpage_categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:743353155466c8c7d35b91-28934098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a1d17589de67110c4ac3bd0179784d68c735359' => 
    array (
      0 => './themes/becktu/template/mainpage_categories.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '743353155466c8c7d35b91-28934098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'derivative_params' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
    'maxRequests' => 0,
    'category_thumbnails' => 0,
    'cat' => 0,
    'pwg' => 0,
    'derivative' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c7d89162_21327164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c7d89162_21327164')) {function content_5466c8c7d89162_21327164($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/piwigo/include/smarty/libs/plugins/modifier.replace.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('html_style', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
 .thumbnailCategory .illustration{ width: <?php echo $_smarty_tpl->tpl_vars['derivative_params']->value->max_width()+5;?>
px; } .content .thumbnailCategory .description{ height: <?php echo $_smarty_tpl->tpl_vars['derivative_params']->value->max_height()+5;?>
px; } <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

  var error_icon = "<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/errors_small.png", max_requests = <?php echo $_smarty_tpl->tpl_vars['maxRequests']->value;?>
;
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<div class="loader"><img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['img_dir'];?>
/ajax_loader.gif"></div>
<div style="float:left;width:100%;height:auto; ">
<div style="float:left;width:15%;;height:100px;"></div>
<div id="portfolio-one" style="float:left;width:70%;">
<ul class="thumbnailCategories">
<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_thumbnails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
<?php if (isset($_smarty_tpl->tpl_vars['derivative'])) {$_smarty_tpl->tpl_vars['derivative'] = clone $_smarty_tpl->tpl_vars['derivative'];
$_smarty_tpl->tpl_vars['derivative']->value = $_smarty_tpl->tpl_vars['pwg']->value->derivative($_smarty_tpl->tpl_vars['derivative_params']->value,$_smarty_tpl->tpl_vars['cat']->value['representative']['src_image']); $_smarty_tpl->tpl_vars['derivative']->nocache = null; $_smarty_tpl->tpl_vars['derivative']->scope = 0;
} else $_smarty_tpl->tpl_vars['derivative'] = new Smarty_variable($_smarty_tpl->tpl_vars['pwg']->value->derivative($_smarty_tpl->tpl_vars['derivative_params']->value,$_smarty_tpl->tpl_vars['cat']->value['representative']['src_image']), null, 0);?>
<?php if (!$_smarty_tpl->tpl_vars['derivative']->value->is_cached()){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ajaxmanager','path'=>'themes/becktu/js/plugins/jquery.ajaxmanager.js','load'=>'footer'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'thumbnails.loader','path'=>'themes/becktu/js/thumbnails.loader.js','require'=>'jquery.ajaxmanager','load'=>'footer'),$_smarty_tpl);?>

<?php }?>
  <li class="element">
		<div class="thumbnailCategory">
	     <a href="<?php echo $_smarty_tpl->tpl_vars['cat']->value['URL'];?>
">
			<img <?php if ($_smarty_tpl->tpl_vars['derivative']->value->is_cached()){?>src="<?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_url();?>
"<?php }else{ ?>src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/img_small.png" data-src="<?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_url();?>
"<?php }?> alt="<?php echo $_smarty_tpl->tpl_vars['cat']->value['TN_ALT'];?>
" title="<?php echo strip_tags(smarty_modifier_replace($_smarty_tpl->tpl_vars['cat']->value['NAME'],'"',' '));?>
 - <?php echo l10n('display this album');?>
" >
		   <span class="image-info">
		       <!-- Title -->
              <span class="image-title">
					<?php echo $_smarty_tpl->tpl_vars['cat']->value['NAME'];?>

				   <!--<?php if (!empty($_smarty_tpl->tpl_vars['cat']->value['icon_ts'])){?>
					<img title="<?php echo $_smarty_tpl->tpl_vars['cat']->value['icon_ts']['TITLE'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/recent<?php if ($_smarty_tpl->tpl_vars['cat']->value['icon_ts']['IS_CHILD_DATE']){?>_by_child<?php }?>.png" alt="(!)" >
					<?php }?>-->
              </span>
                 <!-- Desc -->
                <span class="image-desc">
<?php if (isset($_smarty_tpl->tpl_vars['cat']->value['INFO_DATES'])){?>
				   <p class="dates"><?php echo $_smarty_tpl->tpl_vars['cat']->value['INFO_DATES'];?>
</p>
<?php }?>
				   <p class="Nb_images"><?php echo $_smarty_tpl->tpl_vars['cat']->value['CAPTION_NB_IMAGES'];?>
</p>
<?php if (!empty($_smarty_tpl->tpl_vars['cat']->value['DESCRIPTION'])){?>
                          <p><?php echo $_smarty_tpl->tpl_vars['cat']->value['DESCRIPTION'];?>
</p>
<?php }?>
               </span>
		    </span>
		   </a>
		</div>
	</li>
<?php } ?>
</ul>
</div>
<div style="float:left;width:15%;">
<!--
 <div id="AD_1_90140" gmine="90140" class="gmine_ad" style="width:300px;height:250px;text-align:center;float:none;margin-top:0px;">
   <iframe src="http://pic.zol-img.com.cn/201403/iframe_auto_90140.html" width="300px" height="250px" marginheight="0" marginwidth="0" frameborder="0" scrolling="no">
 </iframe></div> -->
</div>
</div><?php }} ?>