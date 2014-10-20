{if !$current.selected_derivative->is_cached()}
{combine_script id='jquery.ajaxmanager' path='themes/default/js/plugins/jquery.ajaxmanager.js' load='footer'}
{combine_script id='thumbnails.loader' path='themes/default/js/thumbnails.loader.js' require='jquery.ajaxmanager' load='footer'}
{footer_script}var error_icon = "{$ROOT_URL}{$themeconf.icon_dir}/errors_small.png"{/footer_script}
{/if}

<img onmousemove="preOrNext(event)" {if $current.selected_derivative->is_cached()}src="{$current.selected_derivative->get_url()}" {$current.selected_derivative->get_size_htm()}{else}src="{$ROOT_URL}{$themeconf.img_dir}/ajax_loader.gif" data-src="{$current.selected_derivative->get_url()}"{/if} alt="{$ALT_IMG}" id="theMainImage" usemap="#map{$current.selected_derivative->get_type()}" title="{if isset($COMMENT_IMG)}{$COMMENT_IMG|@strip_tags:false|@replace:'"':' '}{else}{$current.TITLE_ESC} - {$ALT_IMG}{/if}">

<input type="hidden"  id="lefturl" value="{$previous.U_IMG}"></input>
<input type="hidden"  id="righturl" value="{$next.U_IMG}"></input>
<input type="hidden"  id="previous" value="{$previous}"></input>
<input type="hidden"  id="next" value="{$next}"></input>
<!--
{foreach from=$current.unique_derivatives item=derivative key=derivative_type}{strip}
<map name="map{$derivative->get_type()}">
{assign var='size' value=$derivative->get_size()}
{if isset($previous)}
<area shape=rect  coords="0,0,{($size[0]/4)|@intval},{$size[1]}" href="{$previous.U_IMG}" title="{'Previous'|@translate} : {$previous.TITLE_ESC}" alt="{$previous.TITLE_ESC}">
{/if}
<area shape=rect coords="{($size[0]/4)|@intval},0,{($size[0]/1.34)|@intval},{($size[1]/4)|@intval}" href="{$U_UP}" title="{'Thumbnails'|@translate}" alt="{'Thumbnails'|@translate}">
{if isset($next)}
<area shape=rect coords="{($size[0]/1.33)|@intval},0,{$size[0]},{$size[1]}" href="{$next.U_IMG}" title="{'Next'|@translate} : {$next.TITLE_ESC}" alt="{$next.TITLE_ESC}">
{/if}
</map>
{/strip}{/foreach}-->

{footer_script}
 
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
{/footer_script}