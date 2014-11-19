<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:24:28
         compiled from "./themes/becktu/template/identification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21428112915466f19c9a05b6-33518789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0fdf7a92e9302b835e09a6a3261c62116208854' => 
    array (
      0 => './themes/becktu/template/identification.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21428112915466f19c9a05b6-33518789',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'U_HOME' => 0,
    'LEVEL_SEPARATOR' => 0,
    'F_LOGIN_ACTION' => 0,
    'authorize_remembering' => 0,
    'U_REDIRECT' => 0,
    'U_REGISTER' => 0,
    'U_LOST_PASSWORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f19c9f1d97_17927113',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f19c9f1d97_17927113')) {function content_5466f19c9f1d97_17927113($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">

<div class="titrePage">
	<ul class="categoryActions">
	</ul>
	<!--<h2><a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><?php echo l10n('Home');?>
</a><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
<?php echo l10n('Identification');?>
</h2>-->
</div>

<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


 <div class="container">
  <div class="register-info">
        <h3><div class="glyphicon glyphicon-info-sign" style="top:7px"></div><span class="icon"></span>登陆信息</h3>
          <div class="user-info">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['F_LOGIN_ACTION']->value;?>
" class="properties" name="login_form">			  
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
<?php if ($_smarty_tpl->tpl_vars['authorize_remembering']->value){?>
                <li>
				<span>
				 <label for="remember_me"><?php echo l10n('Auto login');?>
</label>
				</span>
				 <input tabindex="3" type="checkbox" name="remember_me" id="remember_me" value="1">
				</li>  
<?php }?>
	            <li>
				    <input type="hidden" name="redirect" value="<?php echo urlencode($_smarty_tpl->tpl_vars['U_REDIRECT']->value);?>
">
				    <input tabindex="4" class="btn btn-primary" type="submit" name="login" value="<?php echo l10n('Submit');?>
">			</li>			
	            </li>
	            <li>
<?php if (isset($_smarty_tpl->tpl_vars['U_REGISTER']->value)){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['U_REGISTER']->value;?>
" title="<?php echo l10n('Register');?>
" class="pwg-state-default pwg-button">
				  <span><?php echo l10n('Register');?>
</span>
				</a>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['U_LOST_PASSWORD']->value)){?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['U_LOST_PASSWORD']->value;?>
" title="<?php echo l10n('Forgot your password?');?>
" class="pwg-state-default pwg-button">
						</span><span><?php echo l10n('Forgot your password?');?>
</span>
					</a>
<?php }?>
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
<?php }} ?>