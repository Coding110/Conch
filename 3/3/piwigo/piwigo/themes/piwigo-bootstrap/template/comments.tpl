<!-- begin comments.tpl -->
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{$U_HOME}">{'Home'|@translate}</a></li>
    <li class="active">{'User comments'|@translate}</li>
  </ol>
  {include file='infos_errors.tpl'}

<form class="filter" action="{$F_ACTION}" method="get">

  <fieldset>
    <legend>{'Filter'|@translate}</legend>

    <div class="control-group">
      <label class="control-label" for="keyword">{'Keyword'|@translate}</label>
    <div class="control-group">
      <div class="controls">
        <input type="text" name="keyword" value="{$F_KEYWORD}">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="author">{'Author'|@translate}</label>
      <div class="controls">
        <input type="text" name="author" value="{$F_AUTHOR}">
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="cat">{'Album'|@translate}</label>
      <div class="controls">
        <select name="cat">
          <option value="0">------------</option>
          {html_options options=$categories selected=$categories_selected}
        </select>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="since">{'Since'|@translate}</label>
      <div class="controls">
        <select name="since">
          {html_options options=$since_options selected=$since_options_selected}
        </select>
      </div>
    </div>

  </fieldset>

  <fieldset>

    <legend>{'Display'|@translate}</legend>

    <div class="control-group">
    <label class="control-label" for="sort_by">{'Sort by'|@translate}</label>
      <div class="controls">
        <select name="sort_by">
          {html_options options=$sort_by_options selected=$sort_by_options_selected}
        </select>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="sort_order">{'Sort order'|@translate}</label>
      <div class="controls">
        <select name="sort_order">
          {html_options options=$sort_order_options selected=$sort_order_options_selected}
        </select>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="items_number">{'Number of items'|@translate}</label>
      <div class="controls">
        <select name="items_number">
          {html_options options=$item_number_options selected=$item_number_options_selected}
        </select>
      </div>
    </div>

  </fieldset>

  <button class="btn btn-primary" type="submit" name="submit">{'Filter and display'|@translate}</button>

</form>

{if !empty($navbar) }{include file='navigation_bar.tpl'|@get_extent:'navbar'}{/if}

{if isset($comments)}
<div id="comments">
	{include file='comment_list.tpl' comment_derivative_params=$derivative_params}
</div>
{/if}

</div>
<!-- end comments.tpl -->
