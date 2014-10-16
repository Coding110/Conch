{if isset($MENUBAR)}{$MENUBAR}{/if}
<div id="content" class="content{if isset($MENUBAR)} contentWithMenu{/if}">
  <div class="titrePage">
    <ul class="categoryActions">
    </ul>

   <!-- <h2><a href="{$U_HOME}">{'Home'|@translate}</a>{$LEVEL_SEPARATOR}{$title}</h2>-->
  </div>

{include file='infos_errors.tpl'}

 <div class="container">
  <div class="register-info">
        <h3><span class="icon"></span>{'Forgot your password?'|translate}</h3>
          <div class="user-info">
            <form id="lostPassword" action="{$form_action}?action={$action}{if isset($key)}&amp;key={$key}{/if}" method="post">			  
			  <span><input type="hidden" name="pwg_token" value="{$PWG_TOKEN}"></span>
			  {if $action eq 'lost'}
              <ul>
                <li>                
                  {'Please enter your username or email address.'|@translate} {'You will receive a link to create a new password via email.'|@translate}
                </li>
                 <li>
                 <span style="width:30%;">{'Username or email'|@translate}</span>
                  <input type="text" id="username_or_email" class="user-name  error form-control" name="username_or_email" size="40" maxlength="40"{if isset($username_or_email)} value="{$username_or_email}"{/if}>
                </li>  
                <li>
				  <input tabindex="4" class="btn btn-primary" type="submit" name="submit" value="{'Change my password'|@translate}">			
	            </li>        
	           </ul>
	           {elseif $action eq 'reset'}
	             <ul>
	                <li>                
	                  {'Hello'|@translate} <em>{$username}</em>. {'Enter your new password below.'|@translate}
	                </li>
	                <li><span> {'New password'|@translate}</span>
					   <input type="password" class="password error form-control" name="use_new_pwd" id="use_new_pwd" value="">
	                </li>
	                <li><span>{'Confirm Password'|@translate}</span>
					  <input type="password"  class="password error form-control" name="passwordConf" id="passwordConf" value="">
	                </li> 
	                <li>
	                  <input type="submit" class="btn btn-primary" name="submit" value="{'Submit'|@translate}			
		            </li>           
	           </ul>
	           {/if}
            </form>
          </div>       
    </div>
</div>

<script type="text/javascript">
{if $action eq 'lost'}
{literal}try{document.getElementById('username_or_email').focus();}catch(e){}{/literal}
{elseif $action eq 'reset'}
{literal}try{document.getElementById('use_new_pwd').focus();}catch(e){}{/literal}
{/if}
</script>

</div> <!-- content -->
