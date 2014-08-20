<!-- begin redirect.tpl -->
{html_head}
<style type="text/css">#the_page {ldelim}text-align:center;} </style>
{/html_head}

<div class="alert alert-info">>
	{$REDIRECT_MSG}
</div>

<div class="panel panel-default">
  <div class="panel-body">
	  <a href="{$page_refresh.U_REFRESH}">{'Click here if your browser does not automatically forward you'|@translate}</a>
  </div>
</div>
<!-- end redirect.tpl -->
