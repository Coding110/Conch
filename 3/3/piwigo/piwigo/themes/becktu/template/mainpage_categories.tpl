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
<script>
function openme(cat_id){
	document.getElementById('cat_dlg_1').style.display='block';
	 document.getElementById('cat_dlg_2').style.display='block';
	document.getElementById('album_id').value=cat_id;
	 document.getElementById('cat_dlg_2').style.top = getScrollTop()+"px"; 
	 document.getElementById('album_name').value= document.getElementById("name_"+cat_id).value;
	 document.getElementById('album_description').value= document.getElementById("desc_"+cat_id).value;
}
function closeme(){
	document.getElementById('cat_dlg_1').style.display='none';
	document.getElementById('cat_dlg_2').style.display='none';
}
function logo_in(){
	closeme();
}
function editShow(cat_id){
 	document.getElementById("cat_" + cat_id).className="cat_edit_show";
}
function editHidden(cat_id){
 	document.getElementById("cat_" + cat_id).className="cat_edit_hidden";
}
function getScrollTop(){
    var scrollTop=0;
    if(document.documentElement&&document.documentElement.scrollTop){
	scrollTop=document.documentElement.scrollTop;
    }else if(document.body){ 
	scrollTop=document.body.scrollTop;
    } 
	return scrollTop;
	}
</script>
<div id="cat_dlg_1"></div>
<div id="cat_dlg_2">
  <div style="margin: 0 auto; background: #ffffff;width:30%;text-align:left;border:1px solid #c0c0c0;">
  <div style="border-bottom: 1px solid #ebebeb;background: #f9f9f9;width:90%;">
    <div style="padding-left: 10px;line-height: 36px;font-size:15px;height: 36px;">更新相册</div>
  </div>
  <div style="border-bottom: 1px solid #ebebeb;position:relative;float:right;top:-36px;line-height: 36px;font-size:15px;height: 36px;width:10%;background: #f9f9f9;"><a href="javascript:void(0)" onclick="closeme();">关闭</a></div>
   <br></br>
    <form action ="index.php?/edit_album" method="post">
    <table>
     <tr>
       <td style="font-size:14px;">{'Album name'|@translate}：</td><td><input id="album_name"  name="album_name" class="form-control"></td>
     </tr>
     <tr><td>&nbsp</td><td>&nbsp</td></tr>
     <tr>
       <td style="font-size:14px;">{'Album description'|@translate}：</td><td><textarea id="album_description" name="album_description" rows="3"  class="form-control"></textarea></td>
     </tr>
       <tr><td>&nbsp</td><td>&nbsp</td></tr>
     <tr>
      <td align="right"><input type="submit" class="btn btn-primary" value="确定"></td><td align="center"><input type="buttom" onclick="closeme();" class="btn btn-primary" style="width:30%" value="取消"></td>
     </tr>
     <tr><td><input id="album_id" type="hidden" name="album_id" ></td><td>&nbsp</td></tr>
     </table>
     </form>
  </div>
</div>

<div class="loader"><img src="{$ROOT_URL}{$themeconf.img_dir}/ajax_loader.gif"></div>
<div style="float:left;width:100%;height:{if count($category_thumbnails)<=8}390px{else}auto{/if}; ">
<div style="float:left;width:15%;;height:100px;"></div>
<div id="portfolio-one" style="float:left;width:70%;">
<ul class="thumbnailCategories">

{foreach from=$category_thumbnails item=cat name=cat_loop}
{assign var=derivative value=$pwg->derivative($derivative_params, $cat.representative.src_image)}
{if !$derivative->is_cached()}
{combine_script id='jquery.ajaxmanager' path='themes/becktu/js/plugins/jquery.ajaxmanager.js' load='footer'}
{combine_script id='thumbnails.loader' path='themes/becktu/js/thumbnails.loader.js' require='jquery.ajaxmanager' load='footer'}
{/if}
	 <div onmouseover="editShow({$cat.id});" onmouseout="editHidden({$cat.id});" class="item">
	 	   <a href="{$cat.URL}">
		    <img  {if $derivative->is_cached()}src="{$derivative->get_url()}"{else}src="{$ROOT_URL}{$themeconf.icon_dir}/img_small.png" data-src="{$derivative->get_url()}"{/if} alt="{$cat.TN_ALT}" title="{$cat.NAME|@replace:'"':' '|@strip_tags:false} - {'display this album'|@translate}" >
		   </a>
		   <div class="cat_desc">{$cat.NAME}({$cat.CAPTION_NB_IMAGES})</div>
		    <div id="cat_{$cat.id}" class="cat_edit_hidden"> 
		    {if isset($CAT_DELETE)}
		    	<a href ="javascript:void(0)"   onClick="openme({$cat.id})"><span class="glyphicon glyphicon-cog" style="font-size:14px"></span></a>
		     	<a  href="{$CAT_DELETE}{$cat.id}" title="{'delete album'|@translate}" onclick="return confirm('{'Are you sure?'|@translate|@escape:javascript}');">
				<span class="glyphicon glyphicon-trash" style="font-size:14px"></span></a>
			{/if}
            <input id="name_{$cat.id}" type="hidden" value="{$cat.NAME}">
		    <input id="desc_{$cat.id}" type="hidden" value="{$cat.DESCRIPTION}">
		  </div>
	   </div><!--/item-->	   
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