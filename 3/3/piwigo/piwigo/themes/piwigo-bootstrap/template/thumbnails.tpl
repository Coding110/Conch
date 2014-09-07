<!-- begin thumbnails.tpl -->
{if !empty($thumbnails)}
{footer_script require='jquery'}{literal}
$('.img-wrap').hover(
  function () {
    $(this).find('.thumb-cap').height($(this).find('.img-rounded').height());
    $(this).find('.thumb-cap').width($(this).find('.img-rounded').width());
    $(this).find('.thumb-cap').slideDown(250);
  },
  function () {
    $(this).find('.thumb-cap').slideUp(250);
  }
);
{/literal}{/footer_script}

{foreach from=$thumbnails item=thumbnail}
  {assign var=derivative value=$pwg->derivative($derivative_params, $thumbnail.src_image)}

  <div class="thumb">
    {strip}
    <a href="{$thumbnail.URL}">
      <div class="img-wrap">
        {if $SHOW_THUMBNAIL_CAPTION }
          <div class="thumb-cap">
            {$thumbnail.NAME}
            {if !empty($thumbnail.icon_ts)}
              <span class="icon-asterisk"></span>
            {/if}
            {if isset($thumbnail.NB_COMMENTS)}
                <br>
                {$pwg->l10n_dec('%d comment', '%d comments',$thumbnail.NB_COMMENTS)}
            {/if}
            {if isset($thumbnail.NB_HITS)}
              <br>
              {$pwg->l10n_dec('%d hit', '%d hits',$thumbnail.NB_HITS)}
            {/if}
          </div>
        {/if}
        <img src="{$derivative->get_url()}" class="img-rounded" data-src="{$derivative->get_url()}" alt="{$thumbnail.TN_ALT}" title="{$thumbnail.TN_TITLE}">
      </div>
    </a>
    {/strip}
  </div>
{/foreach}
{/if}
<!-- end thumbnails.tpl -->
