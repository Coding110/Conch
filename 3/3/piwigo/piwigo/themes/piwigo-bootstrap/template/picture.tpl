<!-- begin picture.tpl -->
{if isset($current.unique_derivatives) && count($current.unique_derivatives)>1}
{footer_script require='jquery'}{literal}
function changeImgSrc(url,typeSave,typeMap)
{
  var theImg = document.getElementById("theMainImage");
  if (theImg)
  {
    theImg.removeAttribute("width");theImg.removeAttribute("height");
    theImg.src = url;
    theImg.useMap = "#map"+typeMap;
  }
  jQuery('.switchCheck').css('visibility','hidden');
  jQuery('#derivativeChecked'+typeSave).css('visibility','visible');
  document.cookie = 'picture_deriv='+typeSave+';path={/literal}{$COOKIE_PATH}{literal}';
}
jQuery("#derivativeSwitchLink").click(function() {
  var elt = jQuery("#derivativeSwitchBox");
  elt.css("left", Math.min( jQuery(this).offset().left, jQuery(window).width() - elt.outerWidth(true) - 5))
    .css("top", jQuery(this).offset().top + jQuery(this).outerHeight(true))
    .toggle();
});
jQuery("#derivativeSwitchBox").on("mouseleave click", function() {
  jQuery(this).hide();
});
{/literal}{/footer_script}
{/if}

<div class="top-navs">
  {if !empty($PLUGIN_PICTURE_BEFORE)}{$PLUGIN_PICTURE_BEFORE}{/if}
  <ol class="breadcrumb">
    <li>{$SECTION_TITLE}</li>
    <li class="active">{$current.TITLE}</li>
  </ol>
  {include file='infos_errors.tpl'}
  <nav class="navbar navbar-default" id ="picture-bar" role="navigation">
    <div class="navbar-header">
      <div class="navbar-brand">{$current.TITLE} ({$PHOTO})</div>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        {include file='picture_nav_buttons.tpl'|@get_extent:'picture_nav_buttons'}
        <li class="dropdown"><a title="{'Photo sizes'|@translate}" rel="nofollow" data-toggle="dropdown" href="#"><span class="icon-fullscreen" alt="{'Photo sizes'|@translate}"></span></a>
          <ul class="dropdown-menu">
            {foreach from=$current.unique_derivatives item=derivative key=derivative_type}
              <li>
                <a href="javascript:changeImgSrc('{$derivative->get_url()|@escape:javascript}','{$derivative_type}','{$derivative->get_type()}')"><span class="icon-check switchCheck" id="derivativeChecked{$derivative_type}"{if $derivative->get_type() ne $current.selected_derivative->get_type()} style="visibility:hidden"{/if}></span> &nbsp; {$derivative->get_type()|@translate} ({$derivative->get_size_hr()})</a>
              </li>
            {/foreach}
          </ul>
        </li>
        {if isset($U_SLIDESHOW_START)}
          <li><a href="{$U_SLIDESHOW_START}" title="{'slideshow'|@translate}"><span class="icon-film" alt="{'slideshow'|@translate}"></span></a></li>
        {/if}
        {if isset($U_METADATA)}
          <li><a href="{$U_METADATA}" title="{'Show file metadata'|@translate}"><span class="icon-camera"></span></a></li>
        {/if}
        {if isset($current.U_DOWNLOAD)}
          <li><a href="{$current.U_DOWNLOAD}" title="{'Download this file'|@translate}"><span class="icon-download"></span></a></li>
        {/if}
        {if isset($PLUGIN_PICTURE_ACTIONS)}{$PLUGIN_PICTURE_ACTIONS}{/if}
        {if isset($favorite)}
          {if $favorite.IS_FAVORITE}
            <li><a href="{$favorite.U_FAVORITE}" title="{'delete this photo from your favorites'|@translate}"><span class="icon-star"></span></a></li>
          {else}
            <li><a href="{$favorite.U_FAVORITE}" title="{'add this photo to your favorites'|@translate}"><span class="icon-star-empty"></span></a></li>
          {/if}
        {/if}
        {if isset($U_SET_AS_REPRESENTATIVE)}
          <li><a href="{$U_SET_AS_REPRESENTATIVE}" title="{'set as album representative'|@translate}"><span class="icon-picture"></span></a></li>
        {/if}
        {if isset($U_PHOTO_ADMIN)}
          <li><a href="{$U_PHOTO_ADMIN}" title="{'Modify information'|@translate}"><span class="icon-edit"></span></a></li>
        {/if}
      </ul>
    </div>
  </nav>
</div>

<div class="the-image">
  {$ELEMENT_CONTENT}
  {if isset($COMMENT_IMG)}
    <p class="imageComment">{$COMMENT_IMG}</p>
  {/if}
  {if isset($U_SLIDESHOW_STOP)}
    <p>[ <a href="{$U_SLIDESHOW_STOP}">{'stop the slideshow'|@translate}</a> ]</p>
  {/if}

  {* Not supported yet *}
  {*if $DISPLAY_NAV_THUMB
    <ul class="pager">
      {if isset($previous)}
        <li><a class="navThumb" id="linkPrev" href="{$previous.U_IMG}" title="{'Previous'|@translate} : {$previous.TITLE|@escape}" rel="prev"><img src="{$previous.derivatives.square->get_url()}" alt="{$previous.TITLE|@escape}"></a></li>
      {/if}
      {if isset($next)}
        <li><a class="navThumb" id="linkNext" href="{$next.U_IMG}" title="{'Next'|@translate} : {$next.TITLE|@escape}" rel="next"><img src="{$next.derivatives.square->get_url()}" alt="{$next.TITLE|@escape}"></a>
      {/if}
    </ul>
  {/if}*}

</div>

<br>

<div class="image-meta">
  <header class="panel-heading">
    <h4>{'Image Info'|@translate}</h4>
  </header>
  <div class="panel-body">
    <dl class="dl-horizontal">
      {if $display_info.author and isset($INFO_AUTHOR)}
        <dt>{'Author'|@translate}</dt>
        <dd>{$INFO_AUTHOR}</dd>
      {/if}
      {if $display_info.created_on and isset($INFO_CREATION_DATE)}
        <dt>{'Created on'|@translate}</dt>
        <dd>{$INFO_CREATION_DATE}</dd>
      {/if}
      {if $display_info.posted_on}
        <dt>{'Posted on'|@translate}</dt>
        <dd>{$INFO_POSTED_DATE}</dd>
      {/if}
      {if $display_info.dimensions and isset($INFO_DIMENSIONS)}
        <dt>{'Dimensions'|@translate}</dt>
        <dd>{$INFO_DIMENSIONS}</dd>
      {/if}
      {if $display_info.file}
        <dt>{'File'|@translate}</dt>
        <dd>{$INFO_FILE}</dd>
      {/if}
      {if $display_info.filesize and isset($INFO_FILESIZE)}
        <dt>{'Filesize'|@translate}</dt>
        <dd>{$INFO_FILESIZE}</dd>
      {/if}
      {if $display_info.tags and isset($related_tags)}
        <dt>{'Tags'|@translate}</dt>
        <dd>
          {foreach from=$related_tags item=tag name=tag_loop}{if !$smarty.foreach.tag_loop.first}, {/if}<a href="{$tag.URL}">{$tag.name}</a>{/foreach}
        </dd>
      {/if}
      {if $display_info.categories and isset($related_categories)}
        <dt>{'Albums'|@translate}</dt>
        <dd>
          {foreach from=$related_categories item=cat name=cat_loop}{if !$smarty.foreach.cat_loop.first}, {/if}{$cat}{/foreach}
        </dd>
      {/if}
      {if $display_info.visits}
        <dt>{'Visits'|@translate}</dt>
        <dd>{$INFO_VISITS}</dd>
      {/if}
      {if $display_info.rating_score and isset($rate_summary)}
        <dt>{'Rating score'|@translate}</dt>
        <dd>
          {if $rate_summary.count}
            {if $rate_summary.count == 1}
              {assign var='rate_text' value='%d rate'|@translate}
            {else}
              {assign var='rate_text' value='%d rates'|@translate}
            {/if}
            {$rate_summary.score} ({$pwg->sprintf($rate_text, $rate_summary.count)})
          {else}
            {'no rating'|@translate}
          {/if}
        </dd>
      {/if}
      {if isset($rating)}
        <dt>
          {if isset($rating.USER_RATE)}{'Update your rating'|@translate}{else}{'Rate this photo'|@translate}{/if}
        </dt>
        <dd>
          <form action="{$rating.F_ACTION}" method="post" id="rateForm">
            <div>
              {foreach from=$rating.marks item=mark name=rate_loop}
                {if isset($rating.USER_RATE) && $mark==$rating.USER_RATE}
                  <input type="button" name="rate" value="{$mark}" class="rateButtonSelected" title="{$mark}">
                {else}
                  <input type="submit" name="rate" value="{$mark}" class="rateButton" title="{$mark}">
                {/if}
              {/foreach}
              {strip}{combine_script id='core.scripts' load='async' path='themes/default/js/scripts.js'}
              {combine_script id='rating' load='async' require='core.scripts' path='themes/default/js/rating.js'}
              {footer_script}
                var _pwgRatingAutoQueue = _pwgRatingAutoQueue||[];
                _pwgRatingAutoQueue.push( {ldelim}rootUrl: '{$ROOT_URL}', image_id: {$current.id},
                onSuccess : function(rating) {ldelim}
                  var e = document.getElementById("updateRate");
                  if (e) e.innerHTML = "{'Update your rating'|@translate|@escape:'javascript'}";
                  e = document.getElementById("ratingScore");
                  if (e) e.innerHTML = rating.score;
                  e = document.getElementById("ratingCount");
                  if (e) {ldelim}
                    if (rating.count == 1) {ldelim}
                      e.innerHTML = "({'%d rate'|@translate|@escape:'javascript'})".replace( "%d", rating.count);
                    } else {ldelim}
                      e.innerHTML = "({'%d rates'|@translate|@escape:'javascript'})".replace( "%d", rating.count);
                    }
                  {rdelim}
                {rdelim}{rdelim} );
              {/footer_script}
              {/strip}
            </div>
          </form>
        </dd>
      {/if}
      {if $display_info.privacy_level and isset($available_permission_levels)}
        <dt><a id="privacyLevelLink" href="javascript:togglePrivacyLevelBox()">{'Who can see this photo?'|@translate}</a></dt>
        <dd>
          {combine_script id='core.scripts' load='async' path='themes/default/js/scripts.js'}
          {footer_script require='jquery'}
          {literal}function setPrivacyLevel(rootUrl, id, level)
          {
            var y = new PwgWS(rootUrl);
            y.callService(
              "pwg.images.setPrivacyLevel", {image_id: id, level:level} ,
              {
                method: "POST",
                onFailure: function(num, text) { alert(num + " " + text); },
                onSuccess: function(result) {
                  jQuery('#privacyLevelBox .switchCheck').css('visibility','hidden');
                  jQuery('#levelCheck'+level).css('visibility','visible');
                }
              }
            );
          }
          function togglePrivacyLevelBox()
          {
            var elt = document.getElementById("privacyLevelBox"),
            ePos = document.getElementById("privacyLevelLink");
            if (elt.style.display == "none")
            {
              elt.style.left = (ePos.offsetLeft)+"px";
              elt.style.top = (ePos.offsetTop+ePos.offsetHeight)+"px";
              elt.style.display="block";
            }
            else
              elt.style.display="none";
          }
          {/literal}
          {/footer_script}
          <div id="privacyLevelBox" class="switchBox" onclick="togglePrivacyLevelBox()" style="display:none" onmouseout="e=event.toElement||event.relatedTarget;e.parentNode==this||e==this||togglePrivacyLevelBox()">
            {foreach from=$available_permission_levels item=label key=level}
              <span id="levelCheck{$level}" class="switchCheck" {if $level != $current.level} style="visibility:hidden"{/if}>&#x2714; </span>
              <a id="switchLevel{$level}" href="javascript:setPrivacyLevel('{$ROOT_URL}', {$current.id}, {$level})">{$label}</a><br>
            {/foreach}
          </div>
        </dd>
      {/if}
    </dl>
    {if isset($metadata)}
      <dl class="dl-horizontal">
        {foreach from=$metadata item=meta}
          <h4>{$meta.TITLE}</h4>
          {foreach from=$meta.lines item=value key=label}
            <dt>{$label}</dt>
            <dd>{$value}</dd>
          {/foreach}
        {/foreach}
      </dl>
    {/if}
  </div>
</div>

{if isset($COMMENT_COUNT)}
  <div class="comments">
    <header class="panel-heading">
      <h4>{$pwg->l10n_dec('%d comment', '%d comments',$COMMENT_COUNT)}</h4>
    </header>
    <div class="panel-body">
      {if isset($comments)}
        <div id="pictureCommentList">
          {if (($COMMENT_COUNT > 2) || !empty($navbar))}
            <div id="pictureCommentNavBar">
              {if $COMMENT_COUNT > 2}
                <a href="{$COMMENTS_ORDER_URL}#comments" rel="nofollow" class="commentsOrder">{$COMMENTS_ORDER_TITLE}</a>
              {/if}
              {if !empty($navbar) }{include file='navigation_bar.tpl'|@get_extent:'navbar'}{/if}
            </div>
          {/if}
        {include file='comment_list.tpl'}
        </div>
      {/if}
      <div class="comment-form">
        {if isset($comment_add)}
          <h4>{'Add a comment'|@translate}</h4>
          <br>
          <form method="post" action="{$comment_add.F_ACTION}">
            {if $comment_add.SHOW_AUTHOR}
              <div class="form-group">
                <label for="author" class="control-label">{'Author'|@translate}{if $comment_add.AUTHOR_MANDATORY} ({'required'|@translate}){/if}</label>
                <input class="form-control" type="text" name="author" value="{$comment_add.AUTHOR}">
              </div>
            {/if}
            {if $comment_add.SHOW_EMAIL}
              <div class="form-group">
                <label class="control-label" for="email">{'Email'|@translate}{if $comment_add.EMAIL_MANDATORY} ({'required'|@translate}){/if}</label>
                <input class="form-control" type="text" name="email" value="{$comment_add.EMAIL}">
              </div>
            {/if}
            <div class="form-group">
              <label for="website_url">{'Website'|@translate}</label>
              <input type="text" name="website_url" value="{$comment_add.WEBSITE_URL}">
            </div>
            <div class="form-group">
              <label class="control-label" for="content">{'Comment'|@translate} ({'required'|@translate})</label>
              <textarea class="form-control" name="content">{$comment_add.CONTENT}</textarea>
            </div>
            <input type="hidden" name="key" value="{$comment_add.KEY}">
            <button class="btn btn-primary" type="submit">{'Submit'|@translate}</button>
          </form>
        {/if}
      </div>
    {/if}
  </div>
</div>

{if !empty($PLUGIN_PICTURE_AFTER)}{$PLUGIN_PICTURE_AFTER}{/if}
<!-- end picture.tpl -->
