<!-- begin month_calendar.tpl -->
{if !empty($chronology_calendar.calendar_bars) }
  {foreach from=$chronology_calendar.calendar_bars item=bar}
    <section class="panel panel-default">
      <header class="panel-heading">
        <h5 class="panel-title"><a href="{$bar.U_HEAD}">{$bar.HEAD_LABEL}</a></h5>
      </header>
      <div class="panel-body list-group">
        {foreach from=$bar.items item=item}
          {if isset($item.URL)}
            <a class="list-group-item" href="{$item.URL}">{$item.LABEL}<span class="count">{$item.NB_IMAGES}</span></a>
          {/if}
        {/foreach}
      </div>
      <footer class="panel-footer">
        <a href="{$bar.U_HEAD}">{$pwg->l10n_dec('%d photo', '%d photos', $bar.NB_IMAGES)}</a>
      </footer>
    </section>
  {/foreach}
{/if}

{if isset($chronology_calendar.month_view) }
  <table class="table">
    <thead>
      <tr>
        {foreach from=$chronology_calendar.month_view.wday_labels item=wday}
          <th>{$wday}</th>
        {/foreach}
      </tr>
    </thead>
    {html_head} {*add the style to html head for strict standard compliance*}
    <style type="text/css">
      TABLE.calMonth TBODY TD, TABLE.calMonth TBODY TD DIV.calImg {ldelim}
        width:{$chronology_calendar.month_view.CELL_WIDTH}px;height:{$chronology_calendar.month_view.CELL_HEIGHT}px;
      }
    </style>
    {/html_head}
    {foreach from=$chronology_calendar.month_view.weeks item=week}
      <tr>
        {foreach from=$week item=day}
          {if !empty($day)}
            <td>
              {if isset($day.IMAGE)}
                <a href="{$day.U_IMG_LINK}"><img style="{$day.IMAGE_STYLE}" src="{$day.IMAGE}" alt="{$day.IMAGE_ALT}" title="{$pwg->l10n_dec('%d photo','%d photos', $day.NB_ELEMENTS)}"></a>
              {else}
                {$day.DAY}
              {/if}
          {else}{*blank cell first or last row only*}
            <td>
          {/if}
          </td>
        {/foreach} {*day in week*}
      </tr>
    {/foreach}  {*week in month*}
  </table>
{/if}
<!-- end month_calendar.tpl -->
