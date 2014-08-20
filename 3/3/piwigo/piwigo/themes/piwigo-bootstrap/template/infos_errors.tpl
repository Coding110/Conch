<div class="col-sm-12">
  {if not empty($header_notes)}
    <div class="alert alert-info">
      {foreach from=$header_notes item=elt}
        {$elt}<br>
      {/foreach}
    </div>
  {/if}
  {if not empty($header_msgs)}
    <div class="alert alert-warn">
      {foreach from=$header_msgs item=elt}
        {$elt}<br>
      {/foreach}
    </div>
  {/if}
  {if isset($errors)}
    <div class="alert alert-danger">
      <ul>
        {foreach from=$errors item=error}
          <li>{$error}</li>
        {/foreach}
      </ul>
    </div>
  {/if}
  {if isset($infos)}
    <div class="alert alert-info">
      <ul>
        {foreach from=$infos item=info}
          <li>{$info}</li>
        {/foreach}
      </ul>
    </div>
  {/if}
</div>
