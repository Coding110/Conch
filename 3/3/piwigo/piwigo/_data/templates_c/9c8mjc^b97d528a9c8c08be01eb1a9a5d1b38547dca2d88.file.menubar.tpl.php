<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 10:51:06
         compiled from "./themes/becktu/template/menubar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6717332035466c8c7c2b510-55947473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b97d528a9c8c08be01eb1a9a5d1b38547dca2d88' => 
    array (
      0 => './themes/becktu/template/menubar.tpl',
      1 => 1416106264,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6717332035466c8c7c2b510-55947473',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c7c88ab4_02765049',
  'variables' => 
  array (
    'blocks' => 0,
    'ROOT_URL' => 0,
    'ishome_page' => 0,
    'block' => 0,
    'id' => 0,
    'USERNAME' => 0,
    'U_REGISTER' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c7c88ab4_02765049')) {function content_5466c8c7c88ab4_02765049($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['blocks']->value)){?>
<div id="menubar">
 <div class="col-md-4">
  <div><a href="./"><img src="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
themes/becktu/images/Becktu-logo-2.0.2.png" height="50px" width="100px" alt=""/></a></div>
</div>
  <div id="head_1" style="<?php if (isset($_smarty_tpl->tpl_vars['ishome_page']->value)){?> display:none<?php }?>">
<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blocks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value){
$_smarty_tpl->tpl_vars['block']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['block']->key;
?>
<?php if ("menubar_identification.tpl"!=$_smarty_tpl->tpl_vars['block']->value->template&&"menubar_menu.tpl"!=$_smarty_tpl->tpl_vars['block']->value->template){?>
	<dl id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
<?php if (!empty($_smarty_tpl->tpl_vars['block']->value->template)){?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent($_smarty_tpl->tpl_vars['block']->value->template,$_smarty_tpl->tpl_vars['id']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
		<?php echo $_smarty_tpl->tpl_vars['block']->value->raw_content;?>

<?php }?>
	</dl>
<?php }?>
<?php } ?>
  </div>	
  <div style="<?php if (isset($_smarty_tpl->tpl_vars['ishome_page']->value)){?>postion:relative;float:left;height:20px;width:25%;<?php }else{ ?>display:none<?php }?>"></div>
   <div class="uploadPhoto">
      <a class="btn btn-primary"  href=" <?php if (isset($_smarty_tpl->tpl_vars['USERNAME']->value)){?><?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
index.php?/add_photos<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
identification.php<?php }?>"><?php echo l10n('Upload Photos');?>
</a>
   </div>
	<div class="user">
	 <div class="userInfo">
	 <div id="u_register">
<?php if (isset($_smarty_tpl->tpl_vars['U_REGISTER']->value)){?>
	    <a role="menuitem" href="<?php echo $_smarty_tpl->tpl_vars['U_REGISTER']->value;?>
" title="<?php echo l10n('Create a new account');?>
" rel="nofollow"><?php echo l10n('Register');?>
</a>	
<?php }?>
	  </div>
	 <div style="position:relative;float:right;">
<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blocks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value){
$_smarty_tpl->tpl_vars['block']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['block']->key;
?>
<?php if ("menubar_identification.tpl"==$_smarty_tpl->tpl_vars['block']->value->template){?>
<?php if (!empty($_smarty_tpl->tpl_vars['block']->value->template)){?>
<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent($_smarty_tpl->tpl_vars['block']->value->template,$_smarty_tpl->tpl_vars['id']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
		<?php echo $_smarty_tpl->tpl_vars['block']->value->raw_content;?>

<?php }?>
<?php }?>
<?php } ?>
     </div>
	</div>


 <form class="navbar-search" action="<?php echo $_smarty_tpl->tpl_vars['ROOT_URL']->value;?>
qsearch.php" method="get" id="quicksearch" onsubmit="return this.q.value!='' && this.q.value!=qsearch_prompt;">
	<!--<input class="search-query" type="text" name="q" id="qsearchInput" onfocus="if (value==qsearch_prompt) value='';" onblur="if (value=='') value=qsearch_prompt;" style="width:90%">-->
     <input type="text" class="search-query" placeholder="Search" />
 </form>
 </div>
 
</div><div id="menuSwitcher">
  </div>
<?php }?>
<?php }} ?>