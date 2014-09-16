<div id="mailconfig">

{if empty($mc_submit)}
	<!--<h3>{$mcTitle}</h3>-->
	<form method="post" action="{$mc_action_url}" id="mailconfig">

        <!--<legend>{'mail config'|@translate}</legend>-->
        <div class="form-group">
          <label for="username">{'mail username'|@translate}</label>
          <input type="text" name="username" id="username">
        </div>

        <div class="form-group">
          <label for="password">{'mail password'|@translate}</label>
          <input type="password" name="password" id="password">
        </div>

        <div class="form-group">
          <button type="submit" name="login">{'mail submit'|@translate}</button><p></p>
		</div>

	</form>

{else}

	<h3>{$mc_result}</h3>
	<div>{$mc_mail}</div>

{/if}

</div>
