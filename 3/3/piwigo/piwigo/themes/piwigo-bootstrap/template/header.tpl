<!DOCTYPE html>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://{$smarty.server.HTTP_HOST}/themes/{$themeconf.name}/css/theme.css">

    {if isset($meta_ref) }
      {if isset($INFO_AUTHOR)}
      <meta name="author" content="{$INFO_AUTHOR|@strip_tags:false|@replace:'"':' '}">
      {/if}
      {if isset($related_tags)}
      <meta name="keywords" content="{foreach from=$related_tags item=tag name=tag_loop}{if !$smarty.foreach.tag_loop.first}, {/if}{$tag.name}{/foreach}">
      {/if}
      {if isset($COMMENT_IMG)}
      <meta name="description" content="{$COMMENT_IMG|@strip_tags:false|@replace:'"':' '}{if isset($INFO_FILE)} - {$INFO_FILE}{/if}">
      {else}
      <meta name="description" content="{$PAGE_TITLE}{if isset($INFO_FILE)} - {$INFO_FILE}{/if}">
      {/if}
    {/if}
    <title>{if $PAGE_TITLE!=l10n('Home') && $PAGE_TITLE!=$GALLERY_TITLE}{$PAGE_TITLE} | {/if}{$GALLERY_TITLE}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{$ROOT_URL}{$themeconf.icon_dir}/favicon.ico">

    <link rel="start" title="{'Home'|@translate}" href="{$U_HOME}" >
    <link rel="search" title="{'Search'|@translate}" href="{$ROOT_URL}search.php" >
    {if isset($first.U_IMG)   }<link rel="first" title="{'First'|@translate}" href="{$first.U_IMG}" >{/if}
    {if isset($previous.U_IMG)}<link rel="prev" title="{'Previous'|@translate}" href="{$previous.U_IMG}">{/if}
    {if isset($next.U_IMG)    }<link rel="next" title="{'Next'|@translate}" href="{$next.U_IMG}" >{/if}
    {if isset($last.U_IMG)    }<link rel="last" title="{'Last'|@translate}" href="{$last.U_IMG}" >{/if}
    {if isset($U_UP)          }<link rel="up" title="{'Thumbnails'|@translate}" href="{$U_UP}" >{/if}
    {if isset($U_PREFETCH)}<link rel="prefetch" href="{$U_PREFETCH}">{/if}
    {if isset($U_CANONICAL)}<link rel="canonical" href="{$U_CANONICAL}">{/if}
    {if not empty($page_refresh)    }<meta http-equiv="refresh" content="{$page_refresh.TIME};url={$page_refresh.U_REFRESH}">{/if}
  </head>
  <body>
    <div class="container">
      <br>
      <section class="content">
        <div id="jumbotron">
          {if $PAGE_BANNER}
            <h1>{$PAGE_BANNER}</h1>
          {/if}
        </div>
        {if isset($theSwiftHeader)}{$theSwiftHeader}{/if}
<!-- end header.tpl -->
