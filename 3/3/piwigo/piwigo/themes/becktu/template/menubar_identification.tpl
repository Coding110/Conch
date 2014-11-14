<div id="user" class="dropdown show-on-hover">
   <button type="button" class="btn btn-default dropdown-toggle-login" id="dropdownMenu1" 
      data-toggle="dropdown">     
	{if isset($U_LOGIN)}
     	{'Login'|@translate}
	{else}
	   {if isset($USERNAME)}{$USERNAME}{/if}
	{/if}
    
      <span class="caret"></span>
    </button>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
{strip}
	{if isset($USERNAME)}
	<li role="presentation"><a role="menuitem" href="./index.php?home_page">{'home page'|@translate}</a></li>
	{/if}
	{if isset($U_PROFILE)}
	<li role="presentation"><a role="menuitem" href="{$U_PROFILE}" title="{'customize the appareance of the gallery'|@translate}">{'Customize'|@translate}</a></li>
	{/if}
	{if isset($U_ADMIN)}
	<li role="presentation"><a role="menuitem" href="{$U_ADMIN}" title="{'available for administrators only'|@translate}">{'Administration'|@translate}</a></li>
	{/if}
	{if isset($U_LOGOUT)}
	<li role="presentation"><a role="menuitem" href="{$U_LOGOUT}">{'Logout'|@translate}</a></li>
	{/if}
{/strip}
{if isset($U_LOGIN)}
{strip}
	<form method="post" action="{$U_LOGIN}" id="quickconnect">
 <fieldset>
	<li role="presentation">
	<!--<label for="username">{'Username'|@translate}</label><br>-->
	 <div class="input-group">
         <span class="input-group-addon glyphicon glyphicon-user" style="position:relative;float:left;width:25%;left:1px;"></span>
         <input class="form-control" type="text" name="username" id="username" value="" style="float:right;width:75%">
      </div>
	</li>
	<li><span></span>&nbsp;</li>
	<li><span></span>&nbsp;</li>
	<li> 
	<!--<label for="password">{'Password'|@translate}</label><br>-->   
     <div class="input-group">
         <span class="input-group-addon glyphicon glyphicon-lock" style="position:relative;float:left;width:25%;left:1px;"></span>
         <input class="form-control" type="password" name="password" id="password" style="float:right;width:75%">
      </div>
    </li>
    <li> 
	{if $AUTHORIZE_REMEMBERING}
	<div><label for="remember_me">
	<input type="checkbox" name="remember_me" id="remember_me" value="1" style="position:relative;top:3px;"> {'Auto login'|@translate}
	</label></div>
	{/if}
    </li>
    <li role="presentation">
	<div style="position:relative;float:left;">
	   <input class="btn btn-default" type="submit" name="login" value="{'Submit'|@translate}">
	   <input type="hidden" name="redirect" value="{$smarty.server.REQUEST_URI|@urlencode}">
	</div>
	<div style="position:relative;float:left;left:10px;top:7px;">
		<a href="{$U_LOST_PASSWORD}" >{'Forgot your password?'|@translate}</a>
    </div>
   </li>
   </fieldset>
	</form>
{/strip}
	{/if}
</ul>
</div>