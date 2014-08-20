<!-- begin identification.tpl -->
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{$U_HOME}">{'Home'|@translate}</a></li>
    <li class="active">{'Identification'|@translate}</li>
  </ol>
  {include file='infos_errors.tpl'}
  <form action="{$F_LOGIN_ACTION}" method="post" name="login_form">
    <fieldset>
      <div id="legend">
        <legend class="">Login</legend>
      </div>
      <div class="control-group">
        <!-- Username -->
        <label class="control-label"  for="username">Username</label>
        <div class="controls">
          <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
        </div>
      </div>

      <div class="control-group">
        <!-- Password-->
        <label class="control-label" for="password">Password</label>
        <div class="controls">
          <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        </div>
      </div>
      {if $authorize_remembering }
      <div class="control-group">
        <div class="controls">
          <label class="checkbox">
            <input type="checkbox" name="remember_me" value="1"> {'Remember me'|@translate}
          </label>
        </div>
      </div>
      {/if}
      <div class="control-group">
        <!-- Button -->
        <div class="controls">
          <button name="login" class="btn btn-primary">Login</button>
        </div>
      </div>
    </fieldset>
	  <p>
    {if isset($U_REGISTER)}
		  <a href="{$U_REGISTER}" title="{'Register'|@translate}">{'Register'|@translate}</a> |
    {/if}
    {if isset($U_LOST_PASSWORD)}
		  <a href="{$U_LOST_PASSWORD}" title="{'Forgot your password?'|@translate}">{'Forgot your password?'|@translate}</a>
    {/if}
	  </p>
    <input type="hidden" name="redirect" value="{$U_REDIRECT|@urlencode}">

  </form>

</div>
<!-- end identification.tpl -->
