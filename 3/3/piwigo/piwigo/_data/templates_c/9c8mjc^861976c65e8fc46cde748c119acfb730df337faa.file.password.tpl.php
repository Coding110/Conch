<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:39:08
         compiled from "./themes/becktu/template/password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13733195775466cadc14abb8-46339042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '861976c65e8fc46cde748c119acfb730df337faa' => 
    array (
      0 => './themes/becktu/template/password.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13733195775466cadc14abb8-46339042',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'U_HOME' => 0,
    'LEVEL_SEPARATOR' => 0,
    'title' => 0,
    'form_action' => 0,
    'action' => 0,
    'key' => 0,
    'PWG_TOKEN' => 0,
    'username_or_email' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cadc1a0aa9_18295503',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cadc1a0aa9_18295503')) {function content_5466cadc1a0aa9_18295503($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">
  <div class="titrePage">
    <ul class="categoryActions">
    </ul>

   <!-- <h2><a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><?php echo l10n('Home');?>
</a><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>-->
  </div>

<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


 <div class="container">
  <div class="register-info">
        <h3><span class="icon"></span><?php echo l10n('Forgot your password?');?>
</h3>
          <div class="user-info">
            <form id="lostPassword" action="<?php echo $_smarty_tpl->tpl_vars['form_action']->value;?>
?action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['key']->value)){?>&amp;key=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
<?php }?>" method="post">			  
			  <span><input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
"></span>
<?php if ($_smarty_tpl->tpl_vars['action']->value=='lost'){?>
              <ul>
                <li>                
                  <?php echo l10n('Please enter your username or email address.');?>
 <?php echo l10n('You will receive a link to create a new password via email.');?>

                </li>
                 <li>
                 <span style="width:30%;"><?php echo l10n('Username or email');?>
</span>
                  <input type="text" id="username_or_email" class="user-name  error form-control" name="username_or_email" size="40" maxlength="40"<?php if (isset($_smarty_tpl->tpl_vars['username_or_email']->value)){?> value="<?php echo $_smarty_tpl->tpl_vars['username_or_email']->value;?>
"<?php }?>>
                </li>  
                <li>
				  <input tabindex="4" class="btn btn-primary" type="submit" name="submit" value="<?php echo l10n('Change my password');?>
">			
	            </li>        
	           </ul>
<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='reset'){?>
	             <ul>
	                <li>                
	                  <?php echo l10n('Hello');?>
 <em><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</em>. <?php echo l10n('Enter your new password below.');?>

	                </li>
	                <li><span> <?php echo l10n('New password');?>
</span>
					   <input type="password" class="password error form-control" name="use_new_pwd" id="use_new_pwd" value="">
	                </li>
	                <li><span><?php echo l10n('Confirm Password');?>
</span>
					  <input type="password"  class="password error form-control" name="passwordConf" id="passwordConf" value="">
	                </li> 
	                <li>
	                  <input type="submit" class="btn btn-primary" name="submit" value="<?php echo l10n('Submit');?>
			
		            </li>           
	           </ul>
<?php }?>
            </form>
          </div>       
    </div>
</div>

<script type="text/javascript">
<?php if ($_smarty_tpl->tpl_vars['action']->value=='lost'){?>
try{document.getElementById('username_or_email').focus();}catch(e){}
<?php }elseif($_smarty_tpl->tpl_vars['action']->value=='reset'){?>
try{document.getElementById('use_new_pwd').focus();}catch(e){}
<?php }?>
</script>

</div> <!-- content -->
<?php }} ?>