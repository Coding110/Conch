{if isset($MENUBAR)}{$MENUBAR}{/if}
<div id="content" class="content{if isset($MENUBAR)} contentWithMenu{/if}">

<div class="titrePage">
	<ul class="categoryActions">
	</ul>
	<!--<h2><a href="{$U_HOME}">{'Home'|@translate}</a>{$LEVEL_SEPARATOR}{'Identification'|@translate}</h2>-->
</div>

{include file='infos_errors.tpl'}

 <div class="container">
  <div class="register-info">
        <h3><div class="glyphicon glyphicon-info-sign" style="top:7px"></div><span class="icon"></span>登陆信息</h3>
          <div class="user-info">
            <form method="post" action="{$F_LOGIN_ACTION}" class="properties" name="login_form">			  
			  <span></span>
              <ul>
                <li>
			         <span class="input-group-addon glyphicon glyphicon-user" style="position:relative;width:5%;left:21px;"></span>
			          <input tabindex="1" class="user-name  error form-control " style="position:relative;top:1px;width:35%" type="text" name="username" id="username" size="25" maxlength="40">             
                </li>
               
                <li>
                   <span class="input-group-addon glyphicon glyphicon-lock" style="position:relative;width:5%;left:21px;"></span>
			        <input tabindex="2" name="password" type="password"  class="password error form-control" style="position:relative;top:1px;width:35%" id="password" size="25" maxlength="25">             
                  </li>
                {if $authorize_remembering }
                <li>
				<span>
				 <label for="remember_me">{'Auto login'|@translate}</label>
				</span>
				 <input tabindex="3" type="checkbox" name="remember_me" id="remember_me" value="1">
				</li>  
				{/if} 
	            <li>
				    <input type="hidden" name="redirect" value="{$U_REDIRECT|@urlencode}">
				    <input tabindex="4" class="btn btn-primary" type="submit" name="login" value="{'Submit'|@translate}">			</li>			
	            </li>
	            <li>
	            {if isset($U_REGISTER)}
				<a href="{$U_REGISTER}" title="{'Register'|@translate}" class="pwg-state-default pwg-button">
				  <span>{'Register'|@translate}</span>
				</a>
				{/if}
				{if isset($U_LOST_PASSWORD)}
					<a href="{$U_LOST_PASSWORD}" title="{'Forgot your password?'|@translate}" class="pwg-state-default pwg-button">
						</span><span>{'Forgot your password?'|@translate}</span>
					</a>
				{/if}
				  </li>
	           </ul>

            </form>
          </div>       
    </div>
</div>

<script type="text/javascript"><!--
document.login_form.username.focus();
//--></script>

</div> <!-- content -->
