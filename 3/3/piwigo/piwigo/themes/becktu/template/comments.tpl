{if isset($MENUBAR)}{$MENUBAR}{/if}
<div id="content" class="content{if isset($MENUBAR)} contentWithMenu{/if}">

<div class="titrePage">
	<ul class="categoryActions">
	</ul>
	<!--<h2><a href="{$U_HOME}">{'Home'|@translate}</a>{$LEVEL_SEPARATOR}{'User comments'|@translate}</h2>-->
</div>
{include file='infos_errors.tpl'}
 <div class="container">
  <form class="filter" action="{$F_ACTION}" method="get">
  <div class="register-info">
   <h3><div class="glyphicon glyphicon-info-sign" style="top:7px"></div><span class="icon"></span>{'User comments'|@translate}</h3>
   <div class="user-info">
   <div style="position:relative;right:20px;text-align:right;width:100%"><input type="submit" class="btn btn-primary"  value="{'Filter and display'|@translate}"></div>
  <fieldset>
   <!--<legend>{'Filter'|@translate}</legend>-->
    <div style="font-size:22px;font-weight:normal;padding:0px 0px 15px 0px;width:18%"><span>{'Filter'|@translate}</span></div>
    <label style="width:20%;">{'Keyword'|@translate}<input type="text" class="form-control" style="display: inline;width:60%;"  name="keyword" value="{$F_KEYWORD}"></label>

    <label style="width:20%;">{'Author'|@translate}<input type="text" class="form-control" style="display: inline;width:60%;"  name="author" value="{$F_AUTHOR}"></label>

    <label style="width:30%;">
      {'Album'|@translate}
      <select name="cat" class="form-control" style="display: inline;width:75%;" >
        <option value="0">------------</option>
        {html_options options=$categories selected=$categories_selected}
      </select>
    </label>

    <label style="position:relative;width:20%;">
      {'Since'|@translate}
      <select name="since"  class="form-control" style="display: inline;width:75%;">
        {html_options options=$since_options selected=$since_options_selected}
      </select>
    </label>
  </fieldset>
  <fieldset>
   <!-- <legend>{'Display'|@translate}</legend>-->
   <div style="font-size:22px;font-weight:normal;padding:0px 0px 15px 0px;width:18%"><span>{'Display'|@translate}</span></div>
    <label  style="position:relative;float:left;left:33px;width:25%;">
      {'Sort by'|@translate}
      <select name="sort_by" class="form-control" style="display: inline;width:55%;>
        {html_options options=$sort_by_options selected=$sort_by_options_selected}
      </select>
    </label>

    <label  style="position:relative;float:left;left:33px;width:25%;">
      {'Sort order'|@translate}
      <select name="sort_order" class="form-control" style="display: inline;width:55%;">
        {html_options options=$sort_order_options selected=$sort_order_options_selected}
      </select>
    </label>

    <label style="position:relative;float:left;left:33px;width:25%;">
      {'Number of items'|@translate}
      <select name="items_number" class="form-control" style="display: inline;width:55%;">
        {html_options options=$item_number_options selected=$item_number_options_selected}
      </select>
    </label>
  </fieldset>
   </div>
   </div>
   
   </form>

 </div>
   {if !empty($navbar) }{include file='navigation_bar.tpl'|@get_extent:'navbar'}{/if}
	{if isset($comments)}
	<div id="comments">
		{include file='comment_list.tpl' comment_derivative_params=$derivative_params}
	</div>
   {/if}
</div> <!-- content -->

