<!-- begin comment_list.tpl -->
{foreach from=$comments item=comment name=comment_loop}
  <div class="media">
    {if isset($comment.src_image)}
      {if isset($comment_derivative_params)}
        {assign var=derivative value=$pwg->derivative($comment_derivative_params, $comment.src_image)}
      {else}
        {assign var=derivative value=$pwg->derivative($derivative_params, $comment.src_image)}
      {/if}
      {if !$derivative->is_cached()}
        {combine_script id='jquery.ajaxmanager' path='themes/default/js/plugins/jquery.ajaxmanager.js' load='footer'}
        {combine_script id='thumbnails.loader' path='themes/default/js/thumbnails.loader.js' require='jquery.ajaxmanager' load='footer'}
      {/if}
      <a class="pull-left" href="{$comment.U_PICTURE}"><img {if $derivative->is_cached()}src="{$derivative->get_url()}"{else}src="{$ROOT_URL}{$themeconf.icon_dir}/img_small.png" data-src="{$derivative->get_url()}"{/if} alt="{$comment.ALT}"></a>
    {/if}
    <div class="media-body">
      <h4 class="media-heading">
        {$comment.AUTHOR}
        {if $comment.WEBSITE_URL}
          <small><a href="{$comment.WEBSITE_URL}" class="external" target="_blank" rel="nofollow"><span class="icon-home"></span></a></small>
        {/if}
        {if $comment.EMAIL}
          <small><a href="mailto:{$comment.EMAIL}"><span class="icon-mail"></span></a></small>
        {/if}
      </h4>
      <h5>
        {$comment.DATE}
        {if isset($comment.U_DELETE) or isset($comment.U_VALIDATE) or isset($comment.U_EDIT)}
          <small>(
            {if isset($comment.U_DELETE)}
              <a href="{$comment.U_DELETE}" onclick="return confirm('{'Are you sure?'|@translate|@escape:javascript}');">{'Delete'|@translate}</a>
              {if isset($comment.U_VALIDATE) or isset($comment.U_EDIT) or isset($comment.U_CANCEL)} | {/if}
            {/if}
            {if isset($comment.U_CANCEL)}
              <a href="{$comment.U_CANCEL}">{'Cancel'|@translate}</a>{if isset($comment.U_VALIDATE)} | {/if}
            {/if}
            {if isset($comment.U_EDIT) and !isset($comment.IN_EDIT)}
              <a class="editComment" href="{$comment.U_EDIT}#edit_comment">{'Edit'|@translate}</a>
              {if isset($comment.U_VALIDATE)} | {/if}
            {/if}
            {if isset($comment.U_VALIDATE)}
              <a href="{$comment.U_VALIDATE}">{'Validate'|@translate}</a>
            {/if}
            )</small>
        {/if}
      </h5>
      {if isset($comment.IN_EDIT)}
        <a name="edit_comment"></a>
        <form method="post" action="{$comment.U_EDIT}" id="editComment">
          <div class="control-group">
            <label class="control-label" for="contenteditid">{'Edit a comment'|@translate}</label>
            <div class="controls">
              <textarea name="content" id="contenteditid" rows="5" cols="80">{$comment.CONTENT|@escape}</textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="website_url">{'Website'|@translate}</label>
            <div class="controls">
              <input type="text" name="website_url" id="website_url" value="{$comment.WEBSITE_URL}" size="40">
            </div>
          </div>
          <input type="hidden" name="key" value="{$comment.KEY}">
          <input type="hidden" name="pwg_token" value="{$comment.PWG_TOKEN}">
          <input type="hidden" name="image_id" value="{$comment.IMAGE_ID|@default:$current.id}">
          <button class="btn" type="submit" name="submit">{'Submit'|@translate}</button>
        </form>
      {else}
        <p>{$comment.CONTENT}</p>
      {/if}
    </div>
  </div>
  <hr>
{/foreach}
<!-- end comment_list.tpl -->
