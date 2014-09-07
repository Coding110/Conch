<!-- begin menubar_links.tpl -->
<section id="menubar_links">
  <header class="panel-heading">
    <h4>{'Links'|@translate}</h4>
  </header>
  <div class="panel-body">
    <ul class="menubar">
      {foreach from=$block->data item=link}
        <li>
          <a href="{$link.URL}" {if isset($link.new_window)} onclick="window.open(this.href, '{$link.new_window.NAME}','{$link.new_window.FEATURES}'); return false;"{/if}>{$link.LABEL}</a>
        </li>
      {/foreach}
    </ul>
  </div>
</section>
<!-- end menubar_links.tpl -->
