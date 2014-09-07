<!-- begin menubar_categories.tpl -->
<section id="menubar_categories">
  <header class="panel-heading">
    <h4>
      <a href="{$block->data.U_CATEGORIES}">{'Albums'|@translate}</a> &nbsp;
      {if isset($U_START_FILTER)}
        (<a href="{$U_START_FILTER}" title="{'display only recently posted photos'|@translate}" rel="nofollow"><span class="icon-filter"></span></a>)
      {/if}
      {if isset($U_STOP_FILTER)}
        (<a href="{$U_STOP_FILTER}" title="{'return to the display of all photos'|@translate}"><span class="icon-filter red"></span></a>)
      {/if}
    </h4>
  </header>
  <div class="panel-body">
    {assign var='ref_level' value=0}
    {foreach from=$block->data.MENU_CATEGORIES item=cat}
      {if $cat.LEVEL > $ref_level}
        <ul class="nav nav-pills nav-stacked">
      {else}
        </li>
        {'</ul></li>'|@str_repeat:$ref_level-$cat.LEVEL}
      {/if}
      <li class="{if $cat.SELECTED}active{/if}">
        {strip}
        <a href="{$cat.URL}" {if $cat.IS_UPPERCAT}rel="up"{/if} title="{$cat.TITLE}">{$cat.NAME}
          <span class="badge pull-right" title="{$cat.TITLE}">{$cat.count_images}</span>
          {if !empty($cat.icon_ts)}
            <span class="icon-asterisk" title="{$cat.icon_ts.TITLE}"></span>
          {/if}
        </a>
        {/strip}
        {assign var='ref_level' value=$cat.LEVEL}
      {/foreach}
    {'</li></ul>'|@str_repeat:$ref_level}
  </div>
  <footer class="panel-footer">
    {$pwg->l10n_dec('%d photo', '%d photos', $block->data.NB_PICTURE)}
  </footer>
</section>
<!-- end menubar_categories.tpl -->
