<!-- begin search_rules.tpl -->
<div class="row">
{include file='infos_errors.tpl'}
<nav class="navbar" role="navigation">
  <div class="navbar-header">
    <div class="navbar-brand">{$PAGE_TITLE}</div>
  <div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li><a href="#" onclick="window.close();" title="{'Close this window'|@translate}"><span class="glyphicon glyphicon-remove-sign"></span></a></li>
    </ul>
  </div>
</nav>

  <h4>{'Search rules'|@translate}</h4>

{if isset($INTRODUCTION)}
<p>{$INTRODUCTION}</p>
{/if}

<ul>

  {if isset($search_words)}
  {foreach from=$search_words item=v}
  <li>{$v}</li>
  {/foreach}
  {/if}

  {if isset($SEARCH_TAGS_MODE) }
  <li>
    <p>{if 'AND'==$SEARCH_TAGS_MODE}{'All tags'|@translate}{else}{'Any tag'|@translate}{/if}</p>
    <ul>
      {foreach from=$search_tags item=v}
      <li>{$v}</li>
      {/foreach}
    </ul>
  </li>
  {/if}

  {if isset($DATE_CREATION)}
  <li>{$DATE_CREATION}</li>
  {/if}

  {if isset($DATE_AVAILABLE)}
  <li>{$DATE_AVAILABLE}</li>
  {/if}

  {if isset($search_categories)}
  <li>
    <p>{'Albums'|@translate}</p>

    <ul>
      {foreach from=$search_categories item=v}
      <li>{$v}</li>
      {/foreach}
    </ul>
  </li>
  {/if}

</ul>

<div class="panel panel-default">
  <div class="panel-body">
    <a href="#" onclick="window.close();">{'Close this window'|@translate}</a>
  </div>
</div>

</div>
<!-- end search_rules.tpl -->
