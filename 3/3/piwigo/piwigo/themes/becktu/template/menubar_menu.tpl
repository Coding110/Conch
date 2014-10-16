<div class="dropdown show-on-hover" style="text-align: right;">
   <button type="button" class="btn btn-default dropdown-toggle" id="dropdownMenu1" 
      data-toggle="dropdown">
     {'Menu'|@translate}
      <span class="caret"></span>
    </button>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
{if isset($block->data.qsearch) and  $block->data.qsearch==true}

	<script type="text/javascript">var qsearch_prompt="{'Quick search'|@translate|@escape:'javascript'}"; document.getElementById('qsearchInput').value=qsearch_prompt;</script>
{/if}
	{strip}
	{foreach from=$block->data item=link}
		{if is_array($link)}
			<li role="presentation"><a role="menuitem" href="{$link.URL}" title="{$link.TITLE}"{if isset($link.REL)} {$link.REL}{/if}>{$link.NAME}{if isset($link.COUNTER)} ({$link.COUNTER}){/if}</a></li>
		{/if}
	{/foreach}
	{/strip}
</ul>
</div>
