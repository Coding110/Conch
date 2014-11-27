{if isset($errors) }
<div class="errors" style="font-size:14px;">
  <ul>
    {foreach from=$errors item=error}
    <li>{$error}</li>
    {/foreach}
  </ul>
</div>
{/if}

{if not empty($infos)}
<div style="width:80%;text-align:right;font-size:14px;">
<div class="infos" style="width:66%;text-align:center;float:right;">
  <ul>
    {foreach from=$infos item=info}
    <li>{$info}</li>
    {/foreach}
  </ul>
</div>
</div>
{/if}