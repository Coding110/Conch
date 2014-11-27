{if !empty($blocks) }
<div id="menubar">
 <div class="col-md-4">
  <div><a href="./"><img src="{$ROOT_URL}themes/becktu/images/Becktu-logo-2.0.2.png" height="50px" width="100px" alt=""/></a></div>
</div>
  <div id="head_1" style="{if isset($ishome_page)} display:none{/if}">
	{foreach from=$blocks key=id item=block}
	{if "menubar_identification.tpl"!=$block->template and "menubar_menu.tpl"!=$block->template}
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
  <div style="{if isset($ishome_page)}postion:relative;float:left;height:20px;width:25%;{else}display:none{/if}"></div>
   <div class="uploadPhoto">
      <a class="btn btn-primary"  href=" {if isset($USERNAME)}{$ROOT_URL}index.php?/add_photos{else}{$ROOT_URL}identification.php{/if}">{'Upload Photos'|@translate}</a>
   </div>
	<div class="user">
	 <div class="userInfo">
	 <div id="u_register">
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


 <form style="{if isset($ishome_page)}display:none{/if}" class="navbar-search" action="{$ROOT_URL}qsearch.php" method="get" id="quicksearch" onsubmit="return this.q.value!='' && this.q.value!=qsearch_prompt;">
	<!--<input class="search-query" type="text" name="q" id="qsearchInput" onfocus="if (value==qsearch_prompt) value='';" onblur="if (value=='') value=qsearch_prompt;" style="width:90%">-->
     <input type="text" class="search-query" placeholder="Search" />
 </form>
 </div>
 
</div><div id="menuSwitcher">
  </div>
{/if}
