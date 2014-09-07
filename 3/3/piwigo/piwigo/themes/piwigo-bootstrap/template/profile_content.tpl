<!-- begin profile_content.tpl -->
<form method="post" name="profile" action="{$F_ACTION}" id="profile">
    <legend>{'Profile'|@translate}</legend>
    <input type="hidden" name="redirect" value="{$REDIRECT}">

    <div class="control-group">
      <div class="controls">
        <label>{'Username'|@translate}</label><br>
        {$USERNAME}<br><br>
      </div>
    </div>
    {if not $SPECIAL_USER} {* can modify password + email*}
    <div class="control-group">
      <div class="controls">
      <label for="mail_address">{'Email address'|@translate}</label><br>
        <input type="text" name="mail_address" id="mail_address" value="{$EMAIL}"><br><br>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
      <label for="password">{'Password'|@translate}</label><br>
        <input type="password" name="password" id="password" value=""><br><br>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
      <label for="use_new_pwd">{'New password'|@translate}</label><br>
        <input type="password" name="use_new_pwd" id="use_new_pwd" value=""><br><br>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
      <label for="passwordConf">{'Confirm Password'|@translate}</label><br>
        <input type="password" name="passwordConf" id="passwordConf" value=""><br><br>
      </div>
    </div>
    {/if}
  {if $ALLOW_USER_CUSTOMIZATION}
    <legend>{'Preferences'|@translate}</legend>
    <div class="control-group">
      <div class="controls">
      <label for="nb_image_page">{'Number of photos per page'|@translate}</label><br>
        <input type="text" size="4" maxlength="3" name="nb_image_page" id="nb_image_page" value="{$NB_IMAGE_PAGE}"><br><br>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
      <label for="template">{'Interface theme'|@translate}</label><br>
        {html_options name=theme options=$template_options selected=$template_selection}<br>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
      <label for="Language">{'Language'|@translate}</label><br>
        {html_options name=language options=$language_options selected=$language_selection}<br>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
      <label for="Recent period">{'Recent period'|@translate}</label><br>
        <input type="text" size="3" maxlength="2" name="recent_period" id="recent_period" value="{$RECENT_PERIOD}"><br><br>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
      <label for="expand">{'Expand all albums'|@translate}</label><br>
        {html_radios name='expand' options=$radio_options selected=$EXPAND}<br><br>
      {if $ACTIVATE_COMMENTS}
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <label for="show_nb_comments">{'Show number of comments'|@translate}</label><br>
          {html_radios name='show_nb_comments' options=$radio_options selected=$NB_COMMENTS}<br><br>
      {/if}
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <label for="show_nb_hits">{'Show number of hits'|@translate}</label><br>
          {html_radios name='show_nb_hits' options=$radio_options selected=$NB_HITS}<br><br>
      </div>
    </div>
  {/if}

  <div class="control-group">
    <div class="controls">
      <input type="hidden" name="pwg_token" value="{$PWG_TOKEN}">
      <button class="btn btn-primary" type="submit" name="validate">{'Submit'|@translate}</button>
      <button class="btn btn-primary" type="reset" name="reset">{'Reset'|@translate}</button>
    {if $ALLOW_USER_CUSTOMIZATION}
      <button class="btn btn-primary" type="submit" name="reset_to_default">{'Reset to default values'|@translate}</button>
    {/if}
  </p>

</form>
<!-- end profile_content.tpl -->
