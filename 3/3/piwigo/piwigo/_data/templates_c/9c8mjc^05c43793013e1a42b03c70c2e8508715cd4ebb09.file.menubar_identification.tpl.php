<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:15
         compiled from "./themes/becktu/template/menubar_identification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11749465355466c8c7cf6df5-91889127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05c43793013e1a42b03c70c2e8508715cd4ebb09' => 
    array (
      0 => './themes/becktu/template/menubar_identification.tpl',
      1 => 1414659143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11749465355466c8c7cf6df5-91889127',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'U_LOGIN' => 0,
    'USERNAME' => 0,
    'U_PROFILE' => 0,
    'U_ADMIN' => 0,
    'U_LOGOUT' => 0,
    'AUTHORIZE_REMEMBERING' => 0,
    'U_LOST_PASSWORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c7d2b056_05798946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c7d2b056_05798946')) {function content_5466c8c7d2b056_05798946($_smarty_tpl) {?><div id="user" class="dropdown show-on-hover">
   <button type="button" class="btn btn-default dropdown-toggle-login" id="dropdownMenu1" 
      data-toggle="dropdown">     
<?php if (isset($_smarty_tpl->tpl_vars['U_LOGIN']->value)){?>
     	<?php echo l10n('Login');?>

<?php }else{ ?>
	   <?php if (isset($_smarty_tpl->tpl_vars['USERNAME']->value)){?><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
<?php }?>
<?php }?>
      <span class="caret"></span>
    </button>
<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
 <?php if (isset($_smarty_tpl->tpl_vars['USERNAME']->value)){?> <li role="presentation"><a role="menuitem" href="./index.php?home_page"><?php echo l10n('home page');?>
</a></li> <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['U_PROFILE']->value)){?> <li role="presentation"><a role="menuitem" href="<?php echo $_smarty_tpl->tpl_vars['U_PROFILE']->value;?>
" title="<?php echo l10n('customize the appareance of the gallery');?>
"><?php echo l10n('Customize');?>
</a></li> <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['U_ADMIN']->value)){?> <li role="presentation"><a role="menuitem" href="<?php echo $_smarty_tpl->tpl_vars['U_ADMIN']->value;?>
" title="<?php echo l10n('available for administrators only');?>
"><?php echo l10n('Administration');?>
</a></li> <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['U_LOGOUT']->value)){?> <li role="presentation"><a role="menuitem" href="<?php echo $_smarty_tpl->tpl_vars['U_LOGOUT']->value;?>
"><?php echo l10n('Logout');?>
</a></li> <?php }?> 
<?php if (isset($_smarty_tpl->tpl_vars['U_LOGIN']->value)){?>
 <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['U_LOGIN']->value;?>
" id="quickconnect"> <fieldset> <li role="presentation"> <!--<label for="username"><?php echo l10n('Username');?>
</label><br>--> <div class="input-group"> <span class="input-group-addon glyphicon glyphicon-user" style="position:relative;float:left;width:25%;left:1px;"></span> <input class="form-control" type="text" name="username" id="username" value="" style="float:right;width:75%"> </div> </li> <li><span></span>&nbsp;</li> <li><span></span>&nbsp;</li> <li> <!--<label for="password"><?php echo l10n('Password');?>
</label><br>--> <div class="input-group"> <span class="input-group-addon glyphicon glyphicon-lock" style="position:relative;float:left;width:25%;left:1px;"></span> <input class="form-control" type="password" name="password" id="password" style="float:right;width:75%"> </div> </li> <li> <?php if ($_smarty_tpl->tpl_vars['AUTHORIZE_REMEMBERING']->value){?> <div><label for="remember_me"> <input type="checkbox" name="remember_me" id="remember_me" value="1" style="position:relative;top:3px;"> <?php echo l10n('Auto login');?>
 </label></div> <?php }?> </li> <li role="presentation"> <div style="position:relative;float:left;"> <input class="btn btn-default" type="submit" name="login" value="<?php echo l10n('Submit');?>
"> <input type="hidden" name="redirect" value="<?php echo urlencode($_SERVER['REQUEST_URI']);?>
"> </div> <div style="position:relative;float:left;left:10px;top:7px;"> <a href="<?php echo $_smarty_tpl->tpl_vars['U_LOST_PASSWORD']->value;?>
" ><?php echo l10n('Forgot your password?');?>
</a> </div> </li> </fieldset> </form> 
<?php }?>
</ul>
</div><?php }} ?>