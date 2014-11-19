<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 09:12:54
         compiled from "/var/www/html/piwigo/plugins/community/main_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19993880485467fa165ee7d2-68148700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd766b33a10d0fc9dcda70492f0e5469cdfa68a4' => 
    array (
      0 => '/var/www/html/piwigo/plugins/community/main_index.tpl',
      1 => 1414740113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19993880485467fa165ee7d2-68148700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'most_visited' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5467fa166194c6_62393345',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5467fa166194c6_62393345')) {function content_5467fa166194c6_62393345($_smarty_tpl) {?><link rel="stylesheet" type="text/css" href="themes/becktu/index.css">
<link rel="stylesheet" type="text/css" href="themes/becktu/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="themes/becktu/flexslider.css">
<link rel="stylesheet" type="text/css" href="themes/becktu/conch_style.css">


  <section id="conch_slideshow" >
     <div class="container">
       <div id="main-slider" class="flexslider">
      <ul class="slides">
            <li class="row">
                <img src="themes/becktu/images/slideshow/templatemo_banner_image_1.jpg" alt="slider image 1" />
            </li>
            <li class="row">
                <img src="themes/becktu/images/slideshow/templatemo_banner_image_2.jpg" alt="slider image 2" />
            </li>
            <li class="row">
                <img src="themes/becktu/images/slideshow/templatemo_banner_image_3.jpg" alt="slider image 3" />
            </li>
            <li class="row">
                <img src="themes/becktu/images/slideshow/templatemo_banner_image_4.jpg" alt="slider image 4" />
            </li>
         </ul>
        </div>
      </div>
  </section>      
  
   <section class="section_light">
        <div class="row">       
         <div class="four columns">
            <h3><span class="glyphicon glyphicon-camera"  title="camera"></span> 多人相册亲密分享</h3>
            <p>独有相片群功能，提供创新的多人相册-私密分享</p>
         </div>            
          <div class="four columns">
            <h3><span class="glyphicon glyphicon-cloud-upload" title="cloud"></span>支持原图存储</h3>
            <p> 支持原图无损上传，完美保留每一个图像细节批量上传，双重备份，从此丢开那条麻烦的数据线</p>
          </div>
          <div class="four columns">
            <h3><span class="glyphicon glyphicon-cog" title="video"></span> 强大管理功能</h3>
            <p>支持7种相片排序方式，给你前所未有的超快感体验</p>
          </div>
        </div>    
    </section>
    <aside class="left">
      <h4>社区推荐</h4>
    </aside>
    <div class="clearfix"></div> <!-- Text Section End -->
    <div class="clearfix"></div>
    </section> <!-- Work Links Section End -->
    
   <section id="work"> 
<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['most_visited']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
	 <div class="item">
	   <a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['URL'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['val']->value['path'];?>
" alt="image 10"></a><!-- Image must be 400px by 300px -->
	   <!-- <h3><?php echo $_smarty_tpl->tpl_vars['val']->value['DESCRIPTION'];?>
</h3> -->
	   </div><!--/item-->
<?php } ?>
   </section>
     <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</div><?php }} ?>