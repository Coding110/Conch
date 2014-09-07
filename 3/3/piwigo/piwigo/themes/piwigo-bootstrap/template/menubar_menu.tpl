<!-- begin menubar_menu.tpl -->
<section id="menubar_menu">
  <header class="panel-heading">
    <h4>{'Menu'|@translate}</h4>
  </header>
  <div class="panel-body">
    {if isset($block->data.qsearch) and  $block->data.qsearch==true}
      <form action="{$ROOT_URL}qsearch.php" method="get" id="quicksearch" role="form">
        <div class="input-group">
          <input type="text" class="form-control" name="q" placeholder="Quick Search">
          <span class="input-group-btn">
            <button class="btn btn-default"><span class="icon-search"></span></button>
          </span>
        </div>
      </form>
    {/if}
    <ul class="menubar">
      {foreach from=$block->data item=link}
        {if is_array($link)}
          <li><a href="{$link.URL}" title="{$link.TITLE}"{if isset($link.REL)} {$link.REL}{/if}>{$link.NAME}</a></li>
        {/if}
      {/foreach}
    </ul>
  </div>
</section>
<!-- end menubar_menu.tpl -->
