<!-- begin menubar.tpl --!>
{if !empty($blocks) }
  {foreach from=$blocks key=id item=block}
    {if not empty($block->template)}
      {include file=$block->template|@get_extent:$id }
    {else}
      {$block->raw_content}
    {/if}
  {/foreach}
{/if}
<!-- end menubar.tpl --!>
