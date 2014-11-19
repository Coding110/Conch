<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:31:32
         compiled from "./themes/becktu/template/comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:855735095466c914018b25-05987585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f34bf4fa4fcbf5ccce3a6e735f85ff2322167ea' => 
    array (
      0 => './themes/becktu/template/comments.tpl',
      1 => 1415948783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '855735095466c914018b25-05987585',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'U_HOME' => 0,
    'LEVEL_SEPARATOR' => 0,
    'F_ACTION' => 0,
    'F_KEYWORD' => 0,
    'F_AUTHOR' => 0,
    'categories' => 0,
    'categories_selected' => 0,
    'since_options' => 0,
    'since_options_selected' => 0,
    'sort_by_options' => 0,
    'sort_by_options_selected' => 0,
    'sort_order_options' => 0,
    'sort_order_options_selected' => 0,
    'item_number_options' => 0,
    'item_number_options_selected' => 0,
    'navbar' => 0,
    'comments' => 0,
    'derivative_params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c91407ac67_27668986',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c91407ac67_27668986')) {function content_5466c91407ac67_27668986($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">

<div class="titrePage">
	<ul class="categoryActions">
	</ul>
	<!--<h2><a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><?php echo l10n('Home');?>
</a><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
<?php echo l10n('User comments');?>
</h2>-->
</div>
<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 <div class="container">
  <form class="filter" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="get">
  <div class="register-info">
   <h3><div class="glyphicon glyphicon-info-sign" style="top:7px"></div><span class="icon"></span><?php echo l10n('User comments');?>
</h3>
   <div class="user-info">
   <div style="position:relative;right:20px;text-align:right;width:100%"><input type="submit" class="btn btn-primary"  value="<?php echo l10n('Filter and display');?>
"></div>
  <fieldset>
   <!--<legend><?php echo l10n('Filter');?>
</legend>-->
    <div style="font-size:22px;font-weight:normal;padding:0px 0px 15px 0px;width:18%"><span><?php echo l10n('Filter');?>
</span></div>
    <label style="width:20%;"><?php echo l10n('Keyword');?>
<input type="text" class="form-control" style="display: inline;width:60%;"  name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['F_KEYWORD']->value;?>
"></label>

    <label style="width:20%;"><?php echo l10n('Author');?>
<input type="text" class="form-control" style="display: inline;width:60%;"  name="author" value="<?php echo $_smarty_tpl->tpl_vars['F_AUTHOR']->value;?>
"></label>

    <label style="width:30%;">
      <?php echo l10n('Album');?>

      <select name="cat" class="form-control" style="display: inline;width:75%;" >
        <option value="0">------------</option>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['categories']->value,'selected'=>$_smarty_tpl->tpl_vars['categories_selected']->value),$_smarty_tpl);?>

      </select>
    </label>

    <label style="position:relative;width:20%;">
      <?php echo l10n('Since');?>

      <select name="since"  class="form-control" style="display: inline;width:75%;">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['since_options']->value,'selected'=>$_smarty_tpl->tpl_vars['since_options_selected']->value),$_smarty_tpl);?>

      </select>
    </label>
  </fieldset>
  <fieldset>
   <!-- <legend><?php echo l10n('Display');?>
</legend>-->
   <div style="font-size:22px;font-weight:normal;padding:0px 0px 15px 0px;width:18%"><span><?php echo l10n('Display');?>
</span></div>
    <label  style="position:relative;float:left;left:33px;width:25%;">
      <?php echo l10n('Sort by');?>

      <select name="sort_by" class="form-control" style="display: inline;width:55%;>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sort_by_options']->value,'selected'=>$_smarty_tpl->tpl_vars['sort_by_options_selected']->value),$_smarty_tpl);?>

      </select>
    </label>

    <label  style="position:relative;float:left;left:33px;width:25%;">
      <?php echo l10n('Sort order');?>

      <select name="sort_order" class="form-control" style="display: inline;width:55%;">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['sort_order_options']->value,'selected'=>$_smarty_tpl->tpl_vars['sort_order_options_selected']->value),$_smarty_tpl);?>

      </select>
    </label>

    <label style="position:relative;float:left;left:33px;width:25%;">
      <?php echo l10n('Number of items');?>

      <select name="items_number" class="form-control" style="display: inline;width:55%;">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['item_number_options']->value,'selected'=>$_smarty_tpl->tpl_vars['item_number_options_selected']->value),$_smarty_tpl);?>

      </select>
    </label>
  </fieldset>
   </div>
   </div>
   
   </form>

 </div>
   <?php if (!empty($_smarty_tpl->tpl_vars['navbar']->value)){?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['comments']->value)){?>
	<div id="comments">
<?php echo $_smarty_tpl->getSubTemplate ('comment_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('comment_derivative_params'=>$_smarty_tpl->tpl_vars['derivative_params']->value), 0);?>

	</div>
<?php }?>
</div> <!-- content -->

<?php }} ?>