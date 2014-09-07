<!-- begin slideshow.tpl -->
<div class="row">
  <nav class="navbar" role="navigation">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">{$current.TITLE} ({$PHOTO})</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        {if isset($U_SLIDESHOW_STOP) }
          <li><a href="{$U_SLIDESHOW_STOP}" title="{'stop the slideshow'|@translate}"><span class="glyphicon glyphicon-stop"></span></a></li>
        {/if}
        {include file='picture_nav_buttons.tpl'|@get_extent:'picture_nav_buttons'}
      </ul>
    </div>
  </nav>

  {$ELEMENT_CONTENT}
  {if isset($COMMENT_IMG)}
    <p>{$COMMENT_IMG}</p>
  {/if}
</div>
</div>
<!-- end slideshow.tpl -->
