<!-- begin password.tpl -->
<div class="row">
  <ol class="breadcrumb">
    <li><a href="{$U_HOME}">{'Home'|@translate}</a></li>
    <li class="active">{'About'|@translate}</li>
  </ol>
  {include file='infos_errors.tpl'}

{if $action ne 'none'}
<form id="lostPassword" action="{$form_action}?action={$action}{if isset($key)}&amp;key={$key}{/if}" method="post">
  <input type="hidden" name="pwg_token" value="{$PWG_TOKEN}">

  {if $action eq 'lost'}
  <div class="alert alert-info">{'Please enter your username or email address.'|@translate} {'You will receive a link to create a new password via email.'|@translate}</div>

  <fieldset>
  <div id="legend">
    <legend class="">Reset Password</legend>
  </div>
  <div class="control-group">
    <label class="control-label" for="username_or_email">{'Username or email'|@translate}</label>
    <div class="controls">
      <input type="text" id="username_or_email" name="username_or_email" size="40" maxlength="40"{if isset($username_or_email)} value="{$username_or_email}"{/if}>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button class="btn btn-primary" type="submit" name="submit">{'Change my password'|@translate}</button>
    </div>
  </div>
  {elseif $action eq 'reset'}

  <div class="alert alert-info">{'Hello'|@translate} <em>{$username}</em>. {'Enter your new password below.'|@translate}</div>

  <div class="control-group">
    <label class="control-label" for="use_new_pwd">{'New password'|@translate}</label>
    <div class="controls">
      <input type="password" name="use_new_pwd" id="use_new_pwd" value="">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="passwordConf">{'Confirm Password'|@translate}</label>
    <div class="controls">
      <input type="password" name="passwordConf" id="passwordConf" value="">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button class="btn btn-primary" type="submit" name="submit">{'Submit'|@translate}</button>
    </div>
  </div>
  {/if}

</form>
{/if} {* $action ne 'none' *}

</div>
<!-- end password.tpl -->
