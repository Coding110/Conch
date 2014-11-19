<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:35
         compiled from "./themes/becktu/template/picture_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4600674305466c8dba3ebe0-32775619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ddb02547e6fcd7ac5338079231593fe4f7d35aa' => 
    array (
      0 => './themes/becktu/template/picture_content.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4600674305466c8dba3ebe0-32775619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current' => 0,
    'ROOT_URL' => 0,
    'themeconf' => 0,
    'ALT_IMG' => 0,
    'COMMENT_IMG' => 0,
    'previous' => 0,
    'next' => 0,
    'derivative' => 0,
    'size' => 0,
    'U_UP' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8dbac9a58_23948154',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8dbac9a58_23948154')) {function content_5466c8dbac9a58_23948154($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/piwigo/include/smarty/libs/plugins/modifier.replace.php';
?><?php if (!$_smarty_tpl->tpl_vars['current']->value['selected_derivative']->is_cached()){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ajaxmanager','path'=>'themes/default/js/plugins/jquery.ajaxmanager.js','load'=>'footer'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'thumbnails.loader','path'=>'themes/default/js/thumbnails.loader.js','require'=>'jquery.ajaxmanager','load'=>'footer'),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
var error_icon = "<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['icon_dir'];?>
/errors_small.png"<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>

<img onmousemove="preOrNext(event)" <?php if ($_smarty_tpl->tpl_vars['current']->value['selected_derivative']->is_cached()){?>src="<?php echo $_smarty_tpl->tpl_vars['current']->value['selected_derivative']->get_url();?>
" <?php echo $_smarty_tpl->tpl_vars['current']->value['selected_derivative']->get_size_htm();?>
<?php }else{ ?>src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['img_dir'];?>
/ajax_loader.gif" data-src="<?php echo $_smarty_tpl->tpl_vars['current']->value['selected_derivative']->get_url();?>
"<?php }?> alt="<?php echo $_smarty_tpl->tpl_vars['ALT_IMG']->value;?>
" id="theMainImage" usemap="#map<?php echo $_smarty_tpl->tpl_vars['current']->value['selected_derivative']->get_type();?>
" title="<?php if (isset($_smarty_tpl->tpl_vars['COMMENT_IMG']->value)){?><?php echo smarty_modifier_replace(strip_tags($_smarty_tpl->tpl_vars['COMMENT_IMG']->value),'"',' ');?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['current']->value['TITLE_ESC'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ALT_IMG']->value;?>
<?php }?>">

<input type="hidden"  id="lefturl" value="<?php echo $_smarty_tpl->tpl_vars['previous']->value['U_IMG'];?>
"></input>
<input type="hidden"  id="righturl" value="<?php echo $_smarty_tpl->tpl_vars['next']->value['U_IMG'];?>
"></input>
<input type="hidden"  id="previous" value="<?php echo $_smarty_tpl->tpl_vars['previous']->value;?>
"></input>
<input type="hidden"  id="next" value="<?php echo $_smarty_tpl->tpl_vars['next']->value;?>
"></input>
<!--
<?php  $_smarty_tpl->tpl_vars['derivative'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['derivative']->_loop = false;
 $_smarty_tpl->tpl_vars['derivative_type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['current']->value['unique_derivatives']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['derivative']->key => $_smarty_tpl->tpl_vars['derivative']->value){
$_smarty_tpl->tpl_vars['derivative']->_loop = true;
 $_smarty_tpl->tpl_vars['derivative_type']->value = $_smarty_tpl->tpl_vars['derivative']->key;
?> <map name="map<?php echo $_smarty_tpl->tpl_vars['derivative']->value->get_type();?>
"> <?php if (isset($_smarty_tpl->tpl_vars['size'])) {$_smarty_tpl->tpl_vars['size'] = clone $_smarty_tpl->tpl_vars['size'];
$_smarty_tpl->tpl_vars['size']->value = $_smarty_tpl->tpl_vars['derivative']->value->get_size(); $_smarty_tpl->tpl_vars['size']->nocache = null; $_smarty_tpl->tpl_vars['size']->scope = 0;
} else $_smarty_tpl->tpl_vars['size'] = new Smarty_variable($_smarty_tpl->tpl_vars['derivative']->value->get_size(), null, 0);?> <?php if (isset($_smarty_tpl->tpl_vars['previous']->value)){?> <area shape=rect  coords="0,0,<?php echo intval(($_smarty_tpl->tpl_vars['size']->value[0]/4));?>
,<?php echo $_smarty_tpl->tpl_vars['size']->value[1];?>
" href="<?php echo $_smarty_tpl->tpl_vars['previous']->value['U_IMG'];?>
" title="<?php echo l10n('Previous');?>
 : <?php echo $_smarty_tpl->tpl_vars['previous']->value['TITLE_ESC'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['previous']->value['TITLE_ESC'];?>
"> <?php }?> <area shape=rect coords="<?php echo intval(($_smarty_tpl->tpl_vars['size']->value[0]/4));?>
,0,<?php echo intval(($_smarty_tpl->tpl_vars['size']->value[0]/1.34));?>
,<?php echo intval(($_smarty_tpl->tpl_vars['size']->value[1]/4));?>
" href="<?php echo $_smarty_tpl->tpl_vars['U_UP']->value;?>
" title="<?php echo l10n('Thumbnails');?>
" alt="<?php echo l10n('Thumbnails');?>
"> <?php if (isset($_smarty_tpl->tpl_vars['next']->value)){?> <area shape=rect coords="<?php echo intval(($_smarty_tpl->tpl_vars['size']->value[0]/1.33));?>
,0,<?php echo $_smarty_tpl->tpl_vars['size']->value[0];?>
,<?php echo $_smarty_tpl->tpl_vars['size']->value[1];?>
" href="<?php echo $_smarty_tpl->tpl_vars['next']->value['U_IMG'];?>
" title="<?php echo l10n('Next');?>
 : <?php echo $_smarty_tpl->tpl_vars['next']->value['TITLE_ESC'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['next']->value['TITLE_ESC'];?>
"> <?php }?> </map> <?php } ?>-->

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

 
	function preOrNext(event){
	     var Sys = {};
		 var ua = navigator.userAgent.toLowerCase();  
		 var s;  
		 (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] :    
		 (s = ua.match(/firefox\/([\d.]+)/)) ? Sys.firefox = s[1] : 
		 (s = ua.match(/chrome\/([\d.]+)/)) ? Sys.chrome = s[1] :    
		 (s = ua.match(/opera.([\d.]+)/)) ? Sys.opera = s[1] :   
		 (s = ua.match(/version\/([\d.]+).*safari/)) ? Sys.safari = s[1] : 0; 

		var lefturl		= document.getElementById("lefturl").value;
		var righturl	= document.getElementById("righturl").value;
		var previous	= document.getElementById("previous").value;
	    var next	= document.getElementById("next").value;
	    
       var bigimg=document.getElementById("theMainImage");
       
	    var event = event || window.event;
	    var x = event.offsetX || event.layerX;   
	    
		var imgurl		= righturl;  
		var temp=bigimg.width/2;
	    var imgX=bigimg.offsetLeft;

		if(Sys.firefox){
	        if(x<imgX+temp && previous!=""){
					bigimg.style.cursor	= 'url(/themes/becktu/images/arr_left.cur),auto';
					imgurl				= lefturl;
	            }else if(next!=""){
					bigimg.style.cursor	= 'url(/themes/becktu/images/arr_right.cur),auto';
					imgurl				= righturl;
	            }
	          
	    }else{
	                if(x<temp && previous!=""){
					bigimg.style.cursor	= 'url(/themes/becktu/images/arr_left.cur),auto';
					imgurl				= lefturl;

	            }else if(next!=""){
					bigimg.style.cursor	= 'url(/themes/becktu/images/arr_right.cur),auto';
					imgurl				= righturl;                

	            }
	    
	    }
	    
		bigimg.onmouseup=function(){
			top.location=imgurl;
		}		 
}
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>