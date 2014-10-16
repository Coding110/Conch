<div class="dropdown show-on-hover">
   <button type="button" class="btn btn-default dropdown-toggle" id="dropdownMenu1" 
      data-toggle="dropdown">
     {'Specials'|@translate}
      <span class="caret"></span>
    </button>
   <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">      
      {strip}
		{foreach from=$block->data item=link}
		<li role="presentation"><a role="menuitem" href="{$link.URL}" title="{$link.TITLE}"{if isset($link.REL)} {$link.REL}{/if}>{$link.NAME}</a></li>
		{/foreach}
	   {/strip}
   </ul>	
</div>