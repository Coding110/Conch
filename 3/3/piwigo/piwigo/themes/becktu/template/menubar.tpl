{if !empty($blocks) }
<div id="menubar">
 <div class="col-md-4">
  <div><a href="./"><img src="{$ROOT_URL}themes/becktu/images/Becktu-logo-2.0.2.png" height="50px" width="100px" alt=""/></a></div>
</div>
  <div id="head_1">
	{foreach from=$blocks key=id item=block}
	{if "menubar_identification.tpl"!=$block->template}
	<dl id="{$id}">
		{if not empty($block->template)}
		{include file=$block->template|@get_extent:$id }
		{else}
		{$block->raw_content}
		{/if}
	</dl>
	{/if}
	{/foreach}
  </div>	
   <div class="uploadPhoto">
      <a class="btn btn-primary"  href="{$ROOT_URL}index.php?/add_photos">{'Upload Photos'|@translate}</a>
   </div>
	<div class="user">
	 <div class="userInfo">
	 <div style="position:relative;float:left;top:18px;font-size:18px;">
	  {if isset($U_REGISTER)}
	    <a role="menuitem" href="{$U_REGISTER}" title="{'Create a new account'|@translate}" rel="nofollow">{'Register'|@translate}</a>	
	  {/if}
	  </div>
	 <div style="position:relative;float:right;">
	{foreach from=$blocks key=id item=block}
	{if "menubar_identification.tpl"==$block->template}
		{if not empty($block->template)}
		{include file=$block->template|@get_extent:$id }
		{else}
		{$block->raw_content}
		{/if}
	   {/if}
    {/foreach}
     </div>
	</div>


 <form class="navbar-search" action="{$ROOT_URL}qsearch.php" method="get" id="quicksearch" onsubmit="return this.q.value!='' && this.q.value!=qsearch_prompt;">
	<!--<input class="search-query" type="text" name="q" id="qsearchInput" onfocus="if (value==qsearch_prompt) value='';" onblur="if (value=='') value=qsearch_prompt;" style="width:90%">-->
     <input type="text" class="search-query" placeholder="Search" />
 </form>
 </div>
 
</div><div id="menuSwitcher">
  </div>
{/if}
