{if isset($MENUBAR)}{$MENUBAR}{/if}
<div id="registerPage">

<div id="content" class="content{if isset($MENUBAR)} contentWithMenu{/if}">

<div class="titrePage">
	<ul class="categoryActions">
	</ul>
	<!--<h2><a href="{$U_HOME}">{'Home'|@translate}</a>{$LEVEL_SEPARATOR}{'Registration'|@translate}</h2>-->
</div>

{include file='infos_errors.tpl'}
 <div class="container">
  <div class="register-info">
        <h3><div class="glyphicon glyphicon-info-sign" style="top:7px"></div><span class="icon"></span>注册帐号</h3>
          <div class="user-info">
            <form method="post" action="{$F_ACTION}" class="properties" name="register_form">			  
			  <span></span>
              <ul>
                <li><span>{'Username'|@translate}</span>
				  <input type="text" name="login" id="login" class="user-name  error form-control " value="{$F_LOGIN}" >
                </li>
               
                <li><span>{'Password'|@translate}</span>
				   <input type="password" name="password" id="password" class="password error form-control" >
                </li>
                <li><span> {'Confirm Password'|@translate}</span>
				  <input type="password" name="password_conf" id="password_conf" class="password error form-control" >
                </li>
				
                <li><span>{'Email address'|@translate}</span>
				  <input type="text"  name="mail_address" id="mail_address"  class="email error form-control" value="{$F_EMAIL}" >	
                </li>
                    <li>
				<span class="property">
				<label for="send_password_by_mail">{'Send my connection settings by email'|@translate}</label>
				</span>
				<input type="checkbox" style="position:relative;float:left;margin-top:8px;" name="send_password_by_mail" id="send_password_by_mail" value="1" checked="checked">
				</li>   
	            <li>
				    <input type="hidden" name="key" value="{$F_KEY}" >
					<input class="btn btn-primary" style="color:#fff" type="submit" name="submit" value="{'Register'|@translate}">
	                <input class="btn btn-primary" style="color:#fff" type="reset" value="{'Reset'|@translate}">
				</li>			
	           </ul>

            </form>
          </div>       
    </div>
</div>
<script type="text/javascript"><!--
document.register_form.login.focus();
//--></script>

</div> <!-- content -->
</div> <!-- registerPage -->
