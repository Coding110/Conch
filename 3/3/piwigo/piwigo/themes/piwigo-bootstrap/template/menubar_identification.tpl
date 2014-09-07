<!-- begin menubar_identification -->
<section id="menubar_identification">
  <header class="panel-heading">
    <h4>{'Identification'|@translate}</h4>
  </header>
  <div class="panel-body">
    {if isset($USERNAME)}
      <p>{'Hello'|@translate} {$USERNAME} !</p>
    {/if}
    <ul class="menubar">
      {if isset($U_LOGOUT)}
        <li><a href="{$U_LOGOUT}">{'Logout'|@translate}</a></li>
      {/if}
      {if isset($U_PROFILE)}
        <li><a href="{$U_PROFILE}" title="{'customize the appareance of the gallery'|@translate}">{'Customize'|@translate}</a></li>
      {/if}
      {if isset($U_ADMIN)}
        <li><a href="{$U_ADMIN}" title="{'available for administrators only'|@translate}">{'Administration'|@translate}</a></li>
      {/if}
    </ul>
    {if isset($U_LOGIN)}
      <form method="post" action="{$U_LOGIN}" id="quickconnect">
        <legend>{'Login'|@translate}</legend>
        <div class="form-group">
          <label for="username">{'Username'|@translate}</label>
          <input type="text" name="username" id="username">
        </div>

        <div class="form-group">
          <label for="password">{'Password'|@translate}</label>
          <input type="password" name="password" id="password">
        </div>

        {if $AUTHORIZE_REMEMBERING}
          <div class="form-group">
            <label for="remember_me">
            <input type="checkbox" name="remember_me" id="remember_me" value="1"> {'Remember Me'|@translate}
          </div>
        {/if}

        <div class="form-group">
          <input type="hidden" name="redirect" value="{$smarty.server.REQUEST_URI|@urlencode}">
          <p><button type="submit" name="login" class="btn btn-primary">{'Submit'|@translate}</button> <a href="{$U_LOST_PASSWORD}" title="{'Forgot your password?'|@translate}">Forgot Password?</a>
        </div>

      </form>
    {/if}
  </div>
  {if isset($U_REGISTER) and isset($U_LOGIN)}
    <footer class="panel-footer">
        <a href="{$U_REGISTER}" title="{'Create a new account'|@translate}" rel="nofollow">Register</span></a>
    </footer>
  {/if}

</section>
<!-- end menubar_identification -->
