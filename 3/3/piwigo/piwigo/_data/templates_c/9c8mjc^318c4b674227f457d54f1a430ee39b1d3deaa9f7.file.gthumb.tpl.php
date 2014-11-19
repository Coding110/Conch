<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:34
         compiled from "/var/www/html/piwigo/plugins/GThumb/template/gthumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13590520355466c8da106c75-70471524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '318c4b674227f457d54f1a430ee39b1d3deaa9f7' => 
    array (
      0 => '/var/www/html/piwigo/plugins/GThumb/template/gthumb.tpl',
      1 => 1362629312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13590520355466c8da106c75-70471524',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'thumbnails' => 0,
    'GThumb_derivative_params' => 0,
    'thumbnail' => 0,
    'pwg' => 0,
    'SHOW_THUMBNAIL_CAPTION' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
    'derivative' => 0,
    'GThumb' => 0,
    'GThumb_big' => 0,
    'gt_size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8da199514_78428264',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8da199514_78428264')) {function content_5466c8da199514_78428264($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['thumbnails']->value)){?>
<?php  $_smarty_tpl->tpl_vars['thumbnail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thumbnail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thumbnails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['thumbnail']->key => $_smarty_tpl->tpl_vars['thumbnail']->value){
$_smarty_tpl->tpl_vars['thumbnail']->_loop = true;
?>
<?php if (isset($_smarty_tpl->tpl_vars['derivative'])) {$_smarty_tpl->tpl_vars['derivative'] = clone $_smarty_tpl->tpl_vars['derivative'];
$_smarty_tpl->tpl_vars['derivative']->value = $_smarty_tpl->tpl_vars['pwg']->value->derivative($_smarty_tpl->tpl_vars['GThumb_derivative_params']->value,$_smarty_tpl->tpl_vars['thumbnail']->value['src_image']); $_smarty_tpl->tpl_vars['derivative']->nocache = null; $_smarty_tpl->tpl_vars['derivative']->scope = 0;
} else $_smarty_tpl->tpl_vars['derivative'] = new Smarty_variable($_smarty_tpl->tpl_vars['pwg']->value->derivative($_smarty_tpl->tpl_vars['GThumb_derivative_params']->value,$_smarty_tpl->tpl_vars['thumbnail']->value['src_image']), null, 0);?>
<li class="gthumb">
<?php if ($_smarty_tpl->tpl_vars['SHOW_THUMBNAIL_CAPTION']->value){?>
    <span class="thumbLegend">
      <span class="thumbName">
        <?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['NAME'];?>

<?php if (!empty($_smarty_tpl->tpl_vars['thumbnail']->value['icon_ts'])){?>
        <img title="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['icon_ts']['TITLE'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/recent.png" alt="(!)">
<?php }?>
      </span>
<?php if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS'])){?>
      <span class="<?php if (0==$_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS']){?>zero <?php }?>nb-comments">
        <?php echo $_smarty_tpl->tpl_vars['pwg']->value->l10n_dec('%d comment','%d comments',$_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS']);?>

      </span>
<?php }?>
      <?php if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_COMMENTS'])&&isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS'])){?> - <?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS'])){?>
      <span class="<?php if (0==$_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS']){?>zero <?php }?>nb-hits">
        <?php echo $_smarty_tpl->tpl_vars['pwg']->value->l10n_dec('%d hit','%d hits',$_smarty_tpl->tpl_vars['thumbnail']->value['NB_HITS']);?>

      </span>
<?php }?>
    </span>
<?php }?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['URL'];?>
">
    <img class="thumbnail" <?php if (!$_smarty_tpl->tpl_vars['derivative']->value->is_cached()){?>data-<?php }?>src="<?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_url();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['TN_ALT'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['thumbnail']->value['TN_TITLE'];?>
" <?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_size_htm();?>
>
  </a>
</li>
<?php } ?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"plugins/GThumb/template/gthumb.css"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ajaxmanager','path'=>'themes/default/js/plugins/jquery.ajaxmanager.js','load'=>'footer'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'thumbnails.loader','path'=>'themes/default/js/thumbnails.loader.js','require'=>'jquery.ajaxmanager','load'=>'footer'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ba-resize','path'=>'plugins/GThumb/js/jquery.ba-resize.min.js','load'=>"footer"),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'gthumb','require'=>'jquery,jquery.ba-resize','path'=>'plugins/GThumb/js/gthumb.js','load'=>"footer"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>"gthumb")); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>"gthumb"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

GThumb.max_height = <?php echo $_smarty_tpl->tpl_vars['GThumb']->value['height'];?>
;
GThumb.margin = <?php echo $_smarty_tpl->tpl_vars['GThumb']->value['margin'];?>
;
GThumb.method = '<?php echo $_smarty_tpl->tpl_vars['GThumb']->value['method'];?>
';

<?php if (isset($_smarty_tpl->tpl_vars['GThumb_big']->value)){?>
<?php if (isset($_smarty_tpl->tpl_vars['gt_size'])) {$_smarty_tpl->tpl_vars['gt_size'] = clone $_smarty_tpl->tpl_vars['gt_size'];
$_smarty_tpl->tpl_vars['gt_size']->value = $_smarty_tpl->tpl_vars['GThumb_big']->value->get_size(); $_smarty_tpl->tpl_vars['gt_size']->nocache = null; $_smarty_tpl->tpl_vars['gt_size']->scope = 0;
} else $_smarty_tpl->tpl_vars['gt_size'] = new Smarty_variable($_smarty_tpl->tpl_vars['GThumb_big']->value->get_size(), null, 0);?>
GThumb.big_thumb = {id:<?php echo $_smarty_tpl->tpl_vars['GThumb_big']->value->src_image->id;?>
,src:'<?php echo $_smarty_tpl->tpl_vars['GThumb_big']->value->get_url();?>
',width:<?php echo $_smarty_tpl->tpl_vars['gt_size']->value[0];?>
,height:<?php echo $_smarty_tpl->tpl_vars['gt_size']->value[1];?>
};
<?php }?>

GThumb.build();
jQuery(window).bind('RVTS_loaded', GThumb.build);
jQuery('#thumbnails').resize(GThumb.process);
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>"gthumb"), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('html_head', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<style type="text/css">#thumbnails .gthumb { margin:0 0 <?php echo $_smarty_tpl->tpl_vars['GThumb']->value['margin'];?>
px <?php echo $_smarty_tpl->tpl_vars['GThumb']->value['margin'];?>
px !important; }</style>
<!--[if IE 8]>
<style type="text/css">#thumbnails .gthumb a { right: 0px; }</style>
<![endif]-->
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?><?php }} ?>