<link rel="stylesheet" type="text/css" href="themes/becktu/index.css">
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
            <p style="font-size:14px;">独有相片群功能，提供创新的多人相册-私密分享</p>
         </div>            
          <div class="four columns">
            <h3><span class="glyphicon glyphicon-cloud-upload" title="cloud"></span>支持原图存储</h3>
            <p style="font-size:14px;"> 支持原图无损上传，完美保留每一个图像细节批量上传，双重备份，从此丢开那条麻烦的数据线</p>
          </div>
          <div class="four columns">
            <h3><span class="glyphicon glyphicon-cog" title="video"></span> 强大管理功能</h3>
            <p style="font-size:14px;">支持7种相片排序方式，给你前所未有的超快感体验</p>
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
	{foreach from=$most_visited item=val}
	{assign var=derivative value=$pwg->derivative($derivative_params, $val.src_image)}
	 <div class="item">
	   <a href="{$val.URL}"><img {if $derivative->is_cached()}src="{$derivative->get_url()}"{else}src="{$ROOT_URL}{$themeconf.icon_dir}/img_small.png" data-src="{$derivative->get_url()}"{/if} alt="{$val.TN_ALT}"></a>
	   <!-- <h3>{$val.DESCRIPTION}</h3> -->
	   </div><!--/item-->
	{/foreach}
   </section>
     <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
</div>