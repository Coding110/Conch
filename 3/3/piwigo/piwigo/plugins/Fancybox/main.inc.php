<?php
/*
Plugin Name: FancyBox Lightbox
Version: 1.5.3
Description: Display pictures in a lightbox (with fancybox).
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=488
Author: Winson
Author URI: http://www.WinsonAlbums.com
*/


add_event_handler('loc_begin_picture', 'load_Fancybox');

function load_Fancybox()
{
  global $template;

  $path = get_root_url().'plugins/'. basename(dirname(__FILE__)).'/';

  $template->append('head_elements', '
<link rel="stylesheet" type="text/css" href="'.$path.'images/jquery.fancybox-1.3.4.css">
<script type="text/javascript" src="'.$path.'js/jquery.min.js"></script>
<script type="text/javascript" src="'.$path.'js/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">

var $var143 = jQuery.noConflict();
$var143(document).ready(function() { 
	$var143("a#single_image").fancybox({
		"hideOnContentClick": true,
		"padding":2,
		"margin":10,
		"autoScale":true
	});
});
</script>'
  );
}

add_event_handler('render_element_content','winson_picture_content',EVENT_HANDLER_PRIORITY_NEUTRAL+10,2);

function winson_picture_content($content, $element_info)
{
preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$content,$match);
if(isset($match) && count($match)>0){
	$content = str_replace($match[0],'<a id="single_image" href="'.$element_info['element_url'].'">'.$match[0].'</a>',$content);
}
return $content;
}


?>