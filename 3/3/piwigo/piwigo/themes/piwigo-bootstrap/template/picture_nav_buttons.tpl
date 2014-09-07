<!-- begin picture_nav_buttons -->
{if $DISPLAY_NAV_BUTTONS or isset($slideshow)}
  {if isset($slideshow.U_START_PLAY)}
    <li><a href="{$slideshow.U_START_PLAY}" title="{'Play of slideshow'|@translate}"><span class="glyphicon glyphicon-play"></span></a></li>
  {/if}
  {if isset($slideshow.U_STOP_PLAY)}
    <li><a href="{$slideshow.U_STOP_PLAY}" title="{'Pause of slideshow'|@translate}"><span class="glyphicon glyphicon-pause"></span></a></li>
  {/if}
  {if isset($U_UP) and !isset($slideshow)}
    <li><a href="{$U_UP}" title="{'Thumbnails'|@translate}"><span class="glyphicon glyphicon-th"></span></a></li>
  {/if}
  {if isset($slideshow)}
    {if isset($slideshow.U_INC_PERIOD)}
      <li><a href="{$slideshow.U_INC_PERIOD}" title="{'Reduce diaporama speed'|@translate}"><span class="glyphicon glyphicon-fast-backward"></span></a></li>
    {/if}
    {if isset($slideshow.U_DEC_PERIOD)}
      <li><a href="{$slideshow.U_DEC_PERIOD}" title="{'Accelerate diaporama speed'|@translate}"><span class="glyphicon glyphicon-fast-forward"></span></a></li>
    {/if}
  {/if}
  {if isset($slideshow.U_START_REPEAT)}
    <li><a href="{$slideshow.U_START_REPEAT}" title="{'Repeat the slideshow'|@translate}"><span class="glyphicon glyphicon-repeat"></span></a></li>
  {/if}
  {if isset($slideshow.U_STOP_REPEAT)}
    <li><a href="{$slideshow.U_STOP_REPEAT}" title="{'Not repeat the slideshow'|@translate}"><span class="glyphicon glyphicon-remove-circle"></span></a></li>
  {/if}
  {if isset($first)}
    <li><a href="{$first.U_IMG}" title="{'First'|@translate} : {$first.TITLE}"><span class="glyphicon glyphicon-backward"></span></a></li>
  {/if}
  {if isset($previous)}
    <li><a href="{$previous.U_IMG}" title="{'Previous'|@translate} : {$previous.TITLE|@escape}"><span class="glyphicon glyphicon-arrow-left"></span></a></li>
  {/if}
  {if isset($next)}
    <li><a href="{$next.U_IMG}" title="{'Next'|@translate} : {$next.TITLE|@escape}"><span class="glyphicon glyphicon-arrow-right"></span></a></li>
  {/if}
  {if isset($last)}
    <li><a href="{$last.U_IMG}" title="{'Last'|@translate} : {$last.TITLE}"><span class="glyphicon glyphicon-forward"></span></a></li>
  {/if}
{/if}
{strip}
{footer_script}
document.onkeydown = function(e){ldelim}
  e=e||window.event;
  if (e.altKey) return true;
  var target=e.target||e.srcElement;
  if (target && target.type) return true;{* an input editable element *}
  var keyCode=e.keyCode||e.which, docElem=document.documentElement, url;
  switch(keyCode){ldelim}
{if isset($next)}
  case 63235: case 39: if (e.ctrlKey || docElem.scrollLeft==docElem.scrollWidth-docElem.clientWidth)url="{$next.U_IMG}"; break;
{/if}
{if isset($previous)}
  case 63234: case 37: if (e.ctrlKey || docElem.scrollLeft==0)url="{$previous.U_IMG}"; break;
{/if}
{if isset($first)}
  {* Home *}case 36: if (e.ctrlKey)url="{$first.U_IMG}"; break;
{/if}
{if isset($last)}
  {* End *}case 35: if (e.ctrlKey)url="{$last.U_IMG}"; break;
{/if}
{if isset($U_UP) and !isset($slideshow)}
  {* Up *}case 38: if (e.ctrlKey)url="{$U_UP}"; break;
{/if}
{if isset($slideshow.U_START_PLAY)}
  {* Pause *}case 32: url="{$slideshow.U_START_PLAY}"; break;
{/if}
{if isset($slideshow.U_STOP_PLAY)}
  {* Play *}case 32: url="{$slideshow.U_STOP_PLAY}"; break;
{/if}
  }
  if (url) {ldelim}window.location=url.replace("&amp;","&"); return false;}
  return true;
}
{/footer_script}
{/strip}
<!-- end picture_nav_buttons -->
