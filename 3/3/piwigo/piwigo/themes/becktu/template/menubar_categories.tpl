<div class="dropdown show-on-hover">
	 <button type="button" class="btn btn-default dropdown-toggle" id="dropdownMenu1" 
      data-toggle="dropdown">
     {'Albums'|@translate}
      <span class="caret"></span>
    </button>

{assign var='ref_level' value=0}
{foreach from=$block->data.MENU_CATEGORIES item=cat}
  {if $cat.LEVEL > $ref_level}
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
  {else}
    </li>
    {'</ul></li>'|@str_repeat:($ref_level-$cat.LEVEL)}
  {/if}
    <li {if $cat.SELECTED}class="selected"{/if}>
      <a href="{$cat.URL}" {if $cat.IS_UPPERCAT}rel="up"{/if} title="{$cat.TITLE}">{$cat.NAME}</a>
      {if $cat.count_images > 0}
      <span class="{if $cat.nb_images > 0}menuInfoCat{else}menuInfoCatByChild{/if}" title="{$cat.TITLE}">[{$cat.count_images}]</span>
      {/if}
      {if !empty($cat.icon_ts)}
      <img title="{$cat.icon_ts.TITLE}" src="{$ROOT_URL}{$themeconf.icon_dir}/recent{if $cat.icon_ts.IS_CHILD_DATE}_by_child{/if}.png" class="icon" alt="(!)">
      {/if}
  {assign var='ref_level' value=$cat.LEVEL}
{/foreach}
{'</li></ul>'|@str_repeat:$ref_level}

</div>
