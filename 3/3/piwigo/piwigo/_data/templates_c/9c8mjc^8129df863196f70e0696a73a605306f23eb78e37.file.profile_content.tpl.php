<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:25
         compiled from "./themes/becktu/template/profile_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13373366345466c8d1e36912-90481460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8129df863196f70e0696a73a605306f23eb78e37' => 
    array (
      0 => './themes/becktu/template/profile_content.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13373366345466c8d1e36912-90481460',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'F_ACTION' => 0,
    'REDIRECT' => 0,
    'USERNAME' => 0,
    'SPECIAL_USER' => 0,
    'NB_IMAGE_PAGE' => 0,
    'template_options' => 0,
    'template_selection' => 0,
    'language_options' => 0,
    'language_selection' => 0,
    'RECENT_PERIOD' => 0,
    'radio_options' => 0,
    'EXPAND' => 0,
    'NB_COMMENTS' => 0,
    'NB_HITS' => 0,
    'PWG_TOKEN' => 0,
    'ALLOW_USER_CUSTOMIZATION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8d1ea6606_24902709',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8d1ea6606_24902709')) {function content_5466c8d1ea6606_24902709($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
if (!is_callable('smarty_function_html_radios')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_radios.php';
?><div class="container">
 <div class="register-info">
  <form method="post" name="profile" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" id="profile" class="properties">
        <h3><div class="glyphicon glyphicon-info-sign" style="top:7px"></div><span class="icon"></span><?php echo l10n('Registration');?>
</h3>
          <div class="user-info">      			  
			  <span><input type="hidden" name="redirect" value="<?php echo $_smarty_tpl->tpl_vars['REDIRECT']->value;?>
"></span>
              <ul>
                <li><span><?php echo l10n('Username');?>
</span>
				   <input type="text" class="email error form-control" disabled="disabled" value="<?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
">
                </li>
                <?php if (!$_smarty_tpl->tpl_vars['SPECIAL_USER']->value){?> 
               	<li><span><?php echo l10n('Email address');?>
</span>	
                  <input type="password" class="email error form-control" name="password" id="password" value="">
                </li>
                 <li><span><?php echo l10n('Password');?>
</span>
				   <input type="password" name="password" id="password" class="password error form-control" >
                </li>
                <li><span><?php echo l10n('New password');?>
</span>
                  <input type="password" class="password error form-control" name="use_new_pwd" id="use_new_pwd" value="">
                </li>
                <li><span><?php echo l10n('Confirm Password');?>
</span>
                  <input type="password" class="password error form-control" name="passwordConf" id="passwordConf" value="">
                </li>
<?php }?>
	           </ul>
	         </div>   
        <h3><div class="glyphicon glyphicon-info-sign" style="top:7px;"></div><span class="icon"></span><?php echo l10n('Preferences');?>
</h3>
           <div class="user-info">  
            <ul>
              <li><span><?php echo l10n('Number of photos per page');?>
</span>
                 <input type="text" size="4" maxlength="3" name="nb_image_page" class="email error form-control"  id="nb_image_page" value="<?php echo $_smarty_tpl->tpl_vars['NB_IMAGE_PAGE']->value;?>
">
              </li>
             <!-- <li>
                <div style="width:78%">
                <span><?php echo l10n('Theme');?>
</span>
                  <?php echo smarty_function_html_options(array('name'=>'theme','options'=>$_smarty_tpl->tpl_vars['template_options']->value,'selected'=>$_smarty_tpl->tpl_vars['template_selection']->value),$_smarty_tpl);?>

                </div>
              </li>
              <li>
                <div style="width:83%">
                <span><?php echo l10n('Language');?>
</span>
                  <?php echo smarty_function_html_options(array('name'=>'language','options'=>$_smarty_tpl->tpl_vars['language_options']->value,'selected'=>$_smarty_tpl->tpl_vars['language_selection']->value),$_smarty_tpl);?>

                </div>
              </li>-->
               <li>
                <div style="width:91%">
                <span style="width:20%"><?php echo l10n('Recent period');?>
</span>
                  <input type="text" size="3" maxlength="2" class="password error form-control" name="recent_period" id="recent_period" value="<?php echo $_smarty_tpl->tpl_vars['RECENT_PERIOD']->value;?>
">
                </div>
               </li>
		       <li>
		        <div style="width:72%">
			        <span style="width:17%;text-align:left;"><?php echo l10n('Expand all albums');?>
</span>
			        <?php echo smarty_function_html_radios(array('name'=>'expand','options'=>$_smarty_tpl->tpl_vars['radio_options']->value,'selected'=>$_smarty_tpl->tpl_vars['EXPAND']->value),$_smarty_tpl);?>

			     </div>
		      </li>
		       <li>
		        <div style="width:74%">
			        <span style="width:14%;text-align:left;"><?php echo l10n('Show number of comments');?>
</span>
			         <?php echo smarty_function_html_radios(array('name'=>'show_nb_comments','options'=>$_smarty_tpl->tpl_vars['radio_options']->value,'selected'=>$_smarty_tpl->tpl_vars['NB_COMMENTS']->value),$_smarty_tpl);?>

			     </div>
			    </li>
			    <li>
			    <div style="width:74%">
			        <span style="width:14%;text-align:left;"><?php echo l10n('Show number of hits');?>
</span>
			        <?php echo smarty_function_html_radios(array('name'=>'show_nb_hits','options'=>$_smarty_tpl->tpl_vars['radio_options']->value,'selected'=>$_smarty_tpl->tpl_vars['NB_HITS']->value),$_smarty_tpl);?>

			    </div>
		      </li>
            </ul>
           </div>
            <h3><div class="glyphicon"></div><span class="icon"></span></h3>
            <div class="user-info">  
               <ul>
                 <li>
                        <input type="hidden" name="pwg_token" class="btn btn-primary" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">
					    <input  type="submit" class="btn btn-primary" name="validate" value="<?php echo l10n('Submit');?>
">
					    <input  type="reset" class="btn btn-primary" name="reset" value="<?php echo l10n('Reset');?>
">
<?php if ($_smarty_tpl->tpl_vars['ALLOW_USER_CUSTOMIZATION']->value){?>
					    <input  type="submit" class="btn btn-primary" name="reset_to_default" value="<?php echo l10n('Reset to default values');?>
">
<?php }?>
                 </li>
               </ul>
            </div>
            </form>
    
    </div>
</div><?php }} ?>