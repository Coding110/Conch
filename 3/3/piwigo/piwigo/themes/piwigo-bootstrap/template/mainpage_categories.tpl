<!-- begin mainpage_categories.tpl -->
{*define_derivative name='derivative_params' width=160 height=90 crop=true*}
{foreach from=$category_thumbnails item=cat name=cat_loop}
  {assign var=derivative value=$pwg->derivative($derivative_params, $cat.representative.src_image)}
  <div class="thumb">
    {strip}
    <a href="{$cat.URL}">
      <div class="img-wrap">
        <img src="{$derivative->get_url()}" data-src="{$derivative->get_url()}" alt="{$cat.TN_ALT}" title="{$cat.NAME|@replace:'"':' '|@strip_tags:false} - {'display this album'|@translate}">
      </div>
      <div class="caption">
        <h5><a href="{$cat.URL}">{$cat.NAME}</a></h5>
        {if !empty($cat.icon_ts)}
          <span class="icon-asterisk"></span>
        {/if}
        {if isset($cat.INFO_DATES) }
          <p class="dates">{$cat.INFO_DATES}</p>
        {/if}
        <p>{$cat.CAPTION_NB_IMAGES}</p>
        {if not empty($cat.DESCRIPTION)}
          <p>{$cat.DESCRIPTION}</p>
        {/if}
      </div>
    </a>
    {/strip}
  </div>
{/foreach}
<!-- end mainpage_categories.tpl -->
