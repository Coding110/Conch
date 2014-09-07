<!-- begin tags.tpl -->
<div class="row">
  {include file='infos_errors.tpl'}
  <nav class="navbar" role="navigation">
    <div class="navbar-header">
	    <span class="navbar-brand"><a href="{$U_HOME}">{'Home'|@translate}</a>{$LEVEL_SEPARATOR}{'Tags'|@translate}</span>
    </div>
    <div class="collapse navbar-collapse">
	    <ul class="nav navbar-nav">
        {if $display_mode == 'letters'}
		      <li><a href="{$U_CLOUD}" title="{'show tag cloud'|@translate}"><span class="glyphicon glyphicon-cloud"></span></a></li>
        {/if}
        {if $display_mode == 'cloud'}
		      <li><a href="{$U_LETTERS}" title="{'group by letters'|@translate}"><span class="glyphicon glyphicon-font"></span></a></li>
        {/if}
	    </ul>
    </div>
  </nav>

  {if $display_mode == 'cloud' and isset($tags)}
    <div id="fullTagCloud">
	    {foreach from=$tags item=tag}
	      <span><a href="{$tag.URL}" class="tagLevel{$tag.level}" title="{$pwg->l10n_dec('%d photo', '%d photos', $tag.counter)}">{$tag.name}</a></span>
	    {/foreach}
    </div>
  {/if}

  {if $display_mode == 'letters' and isset($letters)}
    <table>
	    <tr>
		    <td valign="top">
	        {foreach from=$letters item=letter}
            <fieldset class="tagLetter">
	            <legend class="tagLetterLegend">{$letter.TITLE}</legend>
	            <table class="tagLetterContent">
		            {foreach from=$letter.tags item=tag}
		              <tr class="tagLine">
			              <td><a href="{$tag.URL}" title="{$tag.name}">{$tag.name}</a></td>
			              <td class="nbEntries">{$pwg->l10n_dec('%d photo', '%d photos', $tag.counter)}</td>
		              </tr>
		            {/foreach}
	            </table>
            </fieldset>
		        {if isset($letter.CHANGE_COLUMN) }
		          </td>
		          <td valign="top">
		        {/if}
	        {/foreach}
		    </td>
	    </tr>
    </table>
  {/if}
</div>
</div>
