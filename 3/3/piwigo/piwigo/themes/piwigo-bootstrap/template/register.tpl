<!-- begin register.tpl -->
{if isset($MENUBAR)}{$MENUBAR}{/if}
<div class="row" id="registerPage">

<div class="row">
  <ol class="breadcrumb">
    <li><a href="{$U_HOME}">{'Home'|@translate}</a></li>
    <li class="active">{'Registration'|@translate}</li>
  </ol>
  {include file='infos_errors.tpl'}

  <form method="post" action="{$F_ACTION}" class="properties" name="register_form">
  <fieldset>
    <legend>{'Enter your personnal informations'|@translate}</legend>
    <div class="control-group">
      <label class="control-label" for="login">* {'Username'|@translate}</label>
      <div class="controls">
        <input type="text" name="login" id="login" value="{$F_LOGIN}" >
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="password">* {'Password'|@translate}</label>
      <div class="controls">
        <input type="password" name="password" id="password" >
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="password_conf">* {'Confirm Password'|@translate}</label>
      <div class="controls">
        <input type="password" name="password_conf" id="password_conf" >
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="mail_address">{if $obligatory_user_mail_address}* {/if}{'Email address'|@translate}</label>
      <div class="controls">
        <input type="text" name="mail_address" id="mail_address" value="{$F_EMAIL}" >
        {if not $obligatory_user_mail_address}
          ({'useful when password forgotten'|@translate})
        {/if}
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="send_password_by_mail">{'Send my connection settings by email'|@translate}</label>
      <div class="controls">
        <input type="checkbox" name="send_password_by_mail" id="send_password_by_mail" value="1" checked="checked">
      </div>
    </div>

  </fieldset>

  <div class="control-group">
    <div class="controls">
		  <input type="hidden" name="key" value="{$F_KEY}" >
      <button class="submit" type="submit" name="submit">{'Register'|@translate}</button>
      <button class="submit" type="reset">{'Reset'|@translate}</button>
    </div>
  </div>

</form>

</div>
</div>
<!-- end register.tpl -->
