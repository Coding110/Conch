<!-- begin popuphelp.tpl -->
<div class="row">
{include file='infos_errors.tpl'}
<nav class="navbar" role="navigation">
  <div class="navbar-header">
    <div class="navbar-brand"><a href="#" onclick="window.close();"><span class="glyphicon glyphicon-remove-sign"></span></a> {$PAGE_TITLE}</div>
  <div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li><a href="#" onclick="window.close();" title="{'Close this window'|@translate}"><span class="glyphicon glyphicon-remove-sign"></span></a></li>
    </ul>
  </div>
</nav>

{$HELP_CONTENT}

</div> <!-- content -->

<!-- end popuphelp.tpl -->
