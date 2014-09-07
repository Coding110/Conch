<!-- begin about.tpl -->
  <ol class="breadcrumb">
    <li><a href="{$U_HOME}">{'Home'|@translate}</a></li>
    <li class="active">{'About'|@translate}</li>
  </ol>

  {include file='infos_errors.tpl'}

  {$ABOUT_MESSAGE}
  {if isset($THEME_ABOUT) }
  <ul>
   <li>{$THEME_ABOUT}</li>
  </ul>
  {/if}
  {if not empty($about_msgs)}
    {foreach from=$about_msgs item=elt}
    {$elt}
    {/foreach}
  {/if}
<!-- end about.tpl -->
