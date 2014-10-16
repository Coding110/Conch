{strip}{html_style}
.thumbnailCategory .illustration{ldelim}
	width: {$derivative_params->max_width()+5}px;
}

.content .thumbnailCategory .description{ldelim}
	height: {$derivative_params->max_height()+5}px;
}
{/html_style}{/strip}
{footer_script}
  var error_icon = "{$ROOT_URL}{$themeconf.icon_dir}/errors_small.png", max_requests = {$maxRequests};
{/footer_script}
<div class="loader"><img src="{$ROOT_URL}{$themeconf.img_dir}/ajax_loader.gif"></div>
<div style="float:left;width:100%;height:auto; ">
<div style="float:left;width:15%;;height:100px;"></div>
<div id="portfolio-one" style="float:left;width:70%;">
<ul class="thumbnailCategories">
{foreach from=$category_thumbnails item=cat name=cat_loop}
{assign var=derivative value=$pwg->derivative($derivative_params, $cat.representative.src_image)}
{if !$derivative->is_cached()}
{combine_script id='jquery.ajaxmanager' path='themes/becktu/js/plugins/jquery.ajaxmanager.js' load='footer'}
{combine_script id='thumbnails.loader' path='themes/becktu/js/thumbnails.loader.js' require='jquery.ajaxmanager' load='footer'}
{/if}
  <li class="element">
		<div class="thumbnailCategory">
	     <a href="{$cat.URL}">
			<img {if $derivative->is_cached()}src="{$derivative->get_url()}"{else}src="{$ROOT_URL}{$themeconf.icon_dir}/img_small.png" data-src="{$derivative->get_url()}"{/if} alt="{$cat.TN_ALT}" title="{$cat.NAME|@replace:'"':' '|@strip_tags:false} - {'display this album'|@translate}" >
		   <span class="image-info">
		       <!-- Title -->
              <span class="image-title">
					{$cat.NAME}
				   <!--{if !empty($cat.icon_ts)}
					<img title="{$cat.icon_ts.TITLE}" src="{$ROOT_URL}{$themeconf.icon_dir}/recent{if $cat.icon_ts.IS_CHILD_DATE}_by_child{/if}.png" alt="(!)" >
					{/if}-->
              </span>
                 <!-- Desc -->
                <span class="image-desc">
                  {if isset($cat.INFO_DATES) }
				   <p class="dates">{$cat.INFO_DATES}</p>
				  {/if}
				   <p class="Nb_images">{$cat.CAPTION_NB_IMAGES}</p>
				         {if not empty($cat.DESCRIPTION)}
                          <p>{$cat.DESCRIPTION}</p>
             		   {/if}
               </span>
		    </span>
		   </a>
		</div>
	</li>
{/foreach}
</ul>
</div>
<div style="float:left;width:15%;">
<!--
 <div id="AD_1_90140" gmine="90140" class="gmine_ad" style="width:300px;height:250px;text-align:center;float:none;margin-top:0px;">
   <iframe src="http://pic.zol-img.com.cn/201403/iframe_auto_90140.html" width="300px" height="250px" marginheight="0" marginwidth="0" frameborder="0" scrolling="no">
 </iframe></div> -->
</div>
</div>