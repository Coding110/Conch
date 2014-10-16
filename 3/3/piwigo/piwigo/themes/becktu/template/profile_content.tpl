<div class="container">
 <div class="register-info">
  <form method="post" name="profile" action="{$F_ACTION}" id="profile" class="properties">
        <h3><div class="glyphicon glyphicon-info-sign" style="top:7px"></div><span class="icon"></span>{'Registration'|@translate}</h3>
          <div class="user-info">      			  
			  <span><input type="hidden" name="redirect" value="{$REDIRECT}"></span>
              <ul>
                <li><span>{'Username'|@translate}</span>
				   <input type="text" class="email error form-control" disabled="disabled" value="{$USERNAME}">
                </li>
                {if not $SPECIAL_USER} {* can modify password + email*}
               	<li><span>{'Email address'|@translate}</span>	
                  <input type="password" class="email error form-control" name="password" id="password" value="">
                </li>
                 <li><span>{'Password'|@translate}</span>
				   <input type="password" name="password" id="password" class="password error form-control" >
                </li>
                <li><span>{'New password'|@translate}</span>
                  <input type="password" class="password error form-control" name="use_new_pwd" id="use_new_pwd" value="">
                </li>
                <li><span>{'Confirm Password'|@translate}</span>
                  <input type="password" class="password error form-control" name="passwordConf" id="passwordConf" value="">
                </li>
                {/if}
	           </ul>
	         </div>   
        <h3><div class="glyphicon glyphicon-info-sign" style="top:7px;"></div><span class="icon"></span>{'Preferences'|@translate}</h3>
           <div class="user-info">  
            <ul>
              <li><span>{'Number of photos per page'|@translate}</span>
                 <input type="text" size="4" maxlength="3" name="nb_image_page" class="email error form-control"  id="nb_image_page" value="{$NB_IMAGE_PAGE}">
              </li>
             <!-- <li>
                <div style="width:78%">
                <span>{'Theme'|@translate}</span>
                  {html_options name=theme options=$template_options selected=$template_selection}
                </div>
              </li>
              <li>
                <div style="width:83%">
                <span>{'Language'|@translate}</span>
                  {html_options name=language options=$language_options selected=$language_selection}
                </div>
              </li>-->
               <li>
                <div style="width:91%">
                <span style="width:20%">{'Recent period'|@translate}</span>
                  <input type="text" size="3" maxlength="2" class="password error form-control" name="recent_period" id="recent_period" value="{$RECENT_PERIOD}">
                </div>
               </li>
		       <li>
		        <div style="width:72%">
			        <span style="width:17%;text-align:left;">{'Expand all albums'|@translate}</span>
			        {html_radios name='expand' options=$radio_options selected=$EXPAND}
			     </div>
		      </li>
		       <li>
		        <div style="width:74%">
			        <span style="width:14%;text-align:left;">{'Show number of comments'|@translate}</span>
			         {html_radios name='show_nb_comments' options=$radio_options selected=$NB_COMMENTS}
			     </div>
			    </li>
			    <li>
			    <div style="width:74%">
			        <span style="width:14%;text-align:left;">{'Show number of hits'|@translate}</span>
			        {html_radios name='show_nb_hits' options=$radio_options selected=$NB_HITS}
			    </div>
		      </li>
            </ul>
           </div>
            <h3><div class="glyphicon"></div><span class="icon"></span></h3>
            <div class="user-info">  
               <ul>
                 <li>
                        <input type="hidden" name="pwg_token" class="btn btn-primary" value="{$PWG_TOKEN}">
					    <input  type="submit" class="btn btn-primary" name="validate" value="{'Submit'|@translate}">
					    <input  type="reset" class="btn btn-primary" name="reset" value="{'Reset'|@translate}">
					    {if $ALLOW_USER_CUSTOMIZATION}
					    <input  type="submit" class="btn btn-primary" name="reset_to_default" value="{'Reset to default values'|@translate}">
                        {/if}
                 </li>
               </ul>
            </div>
            </form>
    
    </div>
</div>