<!-- begin search.tpl -->
{* Example of resizeable *}
{*
{include file='include/resize.inc.tpl'}
*}

{* Example of datepicker *}
{*
{include file='include/datepicker.inc.tpl'}

{footer_script}{literal}
  pwg_initialization_datepicker("#start_day", "#start_month", "#start_year", "#start_linked_date", null, null, "#end_linked_date");
  pwg_initialization_datepicker("#end_day", "#end_month", "#end_year", "#end_linked_date", null, "#start_linked_date", null);
 jQuery().ready(function(){ $(".date_today").hide(); });
{/literal}{/footer_script}
*}

<div class="row">
  {include file='infos_errors.tpl'}
  <nav class="navbar" role="navigation">
    <div class="navbar-header">
      <span class="navbar-brand"><a href="{$U_HOME}">{'Home'|@translate}</a>{$LEVEL_SEPARATOR}{'Search'|@translate}</span>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        {combine_script id='core.scripts' load='async' path='themes/default/js/scripts.js'}
        <li><a href="{$U_HELP}" onclick="popuphelp(this.href); return false;" title="{'Help'|@translate}"><span class="glyphicon glyphicon-question-sign"></span></a></li>
      </ul>
    </div>
  </nav>

  <form class="filter" method="post" name="search" action="{$F_SEARCH_ACTION}">
  <fieldset>
    <legend>{'Filter'|@translate}</legend>
    <div class="contol-group">
      <div class="controls">
        <input type="text" name="search_allwords"> {'Search for words'|@translate}
        <input type="radio" name="mode" value="AND" checked="checked"> {'Search for all terms'|@translate}
        <input type="radio" name="mode" value="OR"> {'Search for any term'|@translate}
      </div>
    </div>
    <div class="control-group">
      <label for="search_author" class="control-label">{'Search for Author'|@translate}</label>
      <div class="controls">
        <input type="text" name="search_author">
      </div>
    </div>
  </fieldset>

  {if isset($TAG_SELECTION)}
    <fieldset>
      <legend>{'Search tags'|@translate}</legend>
      {$TAG_SELECTION}
      <div class="control-group">
        <div class="controls">
          <input type="radio" name="tag_mode" value="AND" checked="checked"> {'All tags'|@translate}
          <input type="radio" name="tag_mode" value="OR"> {'Any tag'|@translate}
        </div>
      </div>
    </fieldset>
  {/if}

  <fieldset>
    <legend>{'Search by date'|@translate}</legend>
    <div class="control-group">
      <label class="control-label" for="date_type">{'Kind of date'|@translate}</label>
      <div class="controls">
        <input type="radio" name="date_type" value="date_creation" checked="checked"> {'Creation date'|@translate}
        <input type="radio" name="date_type" value="date_available"> {'Post date'|@translate}
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="start_day">{'Date'|@translate}</label>
      <div class="controls">
        <select id="start_day" name="start_day">
          <option value="0">--</option>
          {section name=day start=1 loop=32}
            <option value="{$smarty.section.day.index}" {if $smarty.section.day.index==$START_DAY_SELECTED}selected="selected"{/if}>{$smarty.section.day.index}</option>
          {/section}
        </select>
        <select id="start_month" name="start_month">
          {html_options options=$month_list selected=$START_MONTH_SELECTED}
        </select>
        <input id="start_year" name="start_year" type="text" maxlength="4" >
        <input id="start_linked_date" name="start_linked_date" type="hidden" disabled="disabled">
        <a class="date_today" href="#" onClick="document.search.start_day.value={$smarty.now|date_format:"%d"};document.search.start_month.value={$smarty.now|date_format:"%m"};document.search.start_year.value={$smarty.now|date_format:"%Y"};return false;">{'today'|@translate}</a>
      </div>
    </div>
    <div class="control-group">
      <label for="end_day" class="control-label">{'End-Date'|@translate}</label>
      <div class="controls">
        <select id="end_day" name="end_day">
          <option value="0">--</option>
          {section name=day start=1 loop=32}
            <option value="{$smarty.section.day.index}" {if $smarty.section.day.index==$END_DAY_SELECTED}selected="selected"{/if}>{$smarty.section.day.index}</option>
          {/section}
        </select>
        <select id="end_month" name="end_month">
          {html_options options=$month_list selected=$END_MONTH_SELECTED}
        </select>
        <input id="end_year" name="end_year" type="text" maxlength="4" >
        <input id="end_linked_date" name="end_linked_date" type="hidden" disabled="disabled">
        <a class="date_today" href="#" onClick="document.search.end_day.value={$smarty.now|date_format:"%d"};document.search.end_month.value={$smarty.now|date_format:"%m"};document.search.end_year.value={$smarty.now|date_format:"%Y"};return false;">{'today'|@translate}</a>
      </div>
    </div>
  </fieldset>

  <fieldset>
    <legend>{'Search in albums'|@translate}</legend>
    <div class="control-group">
      <label class="control-label" for="cat[]">{'Albums'|@translate}</label>
      <div class="controls">
        <select class="categoryList" name="cat[]" multiple="multiple" >
          {html_options options=$category_options selected=$category_options_selected}
        </select>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="subcats-included">{'Search in sub-albums'|@translate}</label>
      <div class="controls">
        <input type="radio" name="subcats-included" value="1" checked="checked">{'Yes'|@translate}
        <input type="radio" name="subcats-included" value="0">{'No'|@translate}
      </div>
    </div>
  </fieldset>
  <button class="btn btn-primary" type="submit" name="submit">{'Submit'|@translate}</button>
  <button class="btn btn-primary" type="reset">{'Reset'|@translate}</button>
</form>

</div>
</div>
<!-- end search.tpl -->
