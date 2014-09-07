<!-- begin menubar_specials.tpl -->
<section id="menubar_specials">
  <header class="panel-heading">
    <h4>{'Links'|@translate}</h4>
  </header>
  <div class="panel-body">
    <ul class="menubar">
      {foreach from=$block->data item=link}
        <li><a href="{$link.URL}" title="{$link.TITLE}"{if isset($link.REL)} {$link.REL}{/if}>{$link.NAME}</a></li>
      {/foreach}
    </ul>
  </div>
</section>
<!-- end menubar_specials -->
