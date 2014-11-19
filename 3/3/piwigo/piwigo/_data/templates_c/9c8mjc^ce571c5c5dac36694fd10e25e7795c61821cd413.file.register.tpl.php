<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:39:21
         compiled from "./themes/becktu/template/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7763882005466cae99ab952-30066885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce571c5c5dac36694fd10e25e7795c61821cd413' => 
    array (
      0 => './themes/becktu/template/register.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7763882005466cae99ab952-30066885',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'U_HOME' => 0,
    'LEVEL_SEPARATOR' => 0,
    'F_ACTION' => 0,
    'F_LOGIN' => 0,
    'F_EMAIL' => 0,
    'F_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466cae99f0957_97284879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466cae99f0957_97284879')) {function content_5466cae99f0957_97284879($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="registerPage">

<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">

<div class="titrePage">
	<ul class="categoryActions">
	</ul>
	<!--<h2><a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><?php echo l10n('Home');?>
</a><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
<?php echo l10n('Registration');?>
</h2>-->
</div>

<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 <div class="container">
  <div class="register-info">
        <h3><div class="glyphicon glyphicon-info-sign" style="top:7px"></div><span class="icon"></span>注册帐号</h3>
          <div class="user-info">
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" class="properties" name="register_form">			  
			  <span></span>
              <ul>
                <li><span><?php echo l10n('Username');?>
</span>
				  <input type="text" name="login" id="login" class="user-name  error form-control " value="<?php echo $_smarty_tpl->tpl_vars['F_LOGIN']->value;?>
" >
                </li>
               
                <li><span><?php echo l10n('Password');?>
</span>
				   <input type="password" name="password" id="password" class="password error form-control" >
                </li>
                <li><span> <?php echo l10n('Confirm Password');?>
</span>
				  <input type="password" name="password_conf" id="password_conf" class="password error form-control" >
                </li>
				
                <li><span><?php echo l10n('Email address');?>
</span>
				  <input type="text"  name="mail_address" id="mail_address"  class="email error form-control" value="<?php echo $_smarty_tpl->tpl_vars['F_EMAIL']->value;?>
" >	
                </li>
                    <li>
				<span class="property">
				<label for="send_password_by_mail"><?php echo l10n('Send my connection settings by email');?>
</label>
				</span>
				<input type="checkbox" style="position:relative;float:left;margin-top:8px;" name="send_password_by_mail" id="send_password_by_mail" value="1" checked="checked">
				</li>   
	            <li>
				    <input type="hidden" name="key" value="<?php echo $_smarty_tpl->tpl_vars['F_KEY']->value;?>
" >
					<input class="btn btn-primary" style="color:#fff" type="submit" name="submit" value="<?php echo l10n('Register');?>
">
	                <input class="btn btn-primary" style="color:#fff" type="reset" value="<?php echo l10n('Reset');?>
">
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
<?php }} ?>