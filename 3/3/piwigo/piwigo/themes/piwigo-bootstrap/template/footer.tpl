<!-- begin footer.tpl -->
</section>
<nav id="sidebar">
  {$MENUBAR}
</nav>
<div class="clearfix"></div>
<footer class="footer">
  <div class="panel panel-default">
    <div class="panel-body">
      {if isset($debug.TIME)}
        {'Page generated in'|@translate} {$debug.TIME} ({$debug.NB_QUERIES} {'SQL queries in'|@translate} {$debug.SQL_TIME}) -
      {/if}
      {*
        Please, do not remove this copyright. If you really want to,
        contact us on http://piwigo.org to find a solution on how
        to show the origin of the script...
      *}
      {'Powered by'|@translate} <a href="{$PHPWG_URL}" class="Piwigo">Piwigo</a>
      {$VERSION}
      {if isset($CONTACT_MAIL)}
        - <a href="mailto:{$CONTACT_MAIL}?subject={'A comment on your site'|@translate|@escape:url}">{'Contact webmaster'|@translate}</a>
      {/if}
      {if isset($TOGGLE_MOBILE_THEME_URL)}
        - {'View in'|@translate} : <a href="{$TOGGLE_MOBILE_THEME_URL}">{'Mobile'|@translate}</a> | <b>{'Desktop'|@translate}</b>
      {/if}

      {get_combined_scripts load='footer'}

      {if isset($footer_elements)}
        {foreach from=$footer_elements item=v}
          {$v}
        {/foreach}
      {/if}
    </div>
  </div>
</footer> {* copyright *}
{if isset($debug.QUERIES_LIST)}
  <div id="debug">
    {$debug.QUERIES_LIST}
  </div>
{/if}
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</div>
</body>
</html>
<!-- end footer.tpl -->
