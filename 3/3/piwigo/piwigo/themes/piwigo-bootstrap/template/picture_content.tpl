<!-- begin picture_content.tpl -->
{if !$current.selected_derivative->is_cached()}
{combine_script id='jquery.ajaxmanager' path='themes/default/js/plugins/jquery.ajaxmanager.js' load='footer'}
{combine_script id='thumbnails.loader' path='themes/default/js/thumbnails.loader.js' require='jquery.ajaxmanager' load='footer'}
{footer_script}var error_icon = "{$ROOT_URL}{$themeconf.icon_dir}/errors_small.png"{/footer_script}
{/if}

<img {if $current.selected_derivative->is_cached()}src="{$current.selected_derivative->get_url()}" {$current.selected_derivative->get_size_htm()}{else}src="{$ROOT_URL}{$themeconf.img_dir}/ajax_loader.gif" data-src="{$current.selected_derivative->get_url()}"{/if} alt="{$ALT_IMG}" id="theMainImage" usemap="#map{$current.selected_derivative->get_type()}" title="{if isset($COMMENT_IMG)}{$COMMENT_IMG|@strip_tags:false|@replace:'"':' '}{else}{$current.TITLE|@replace:'"':' '} - {$ALT_IMG}{/if}">

<!-- end picture_content.tpl -->
