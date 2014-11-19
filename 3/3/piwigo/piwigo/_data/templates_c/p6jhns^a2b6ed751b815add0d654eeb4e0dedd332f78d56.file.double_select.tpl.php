<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:31:12
         compiled from "./admin/themes/default/template/double_select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13389828125466f330d7dc66-90864531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2b6ed751b815add0d654eeb4e0dedd332f78d56' => 
    array (
      0 => './admin/themes/default/template/double_select.tpl',
      1 => 1292334937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13389828125466f330d7dc66-90864531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L_CAT_OPTIONS_TRUE' => 0,
    'category_option_true' => 0,
    'category_option_true_selected' => 0,
    'L_CAT_OPTIONS_FALSE' => 0,
    'category_option_false' => 0,
    'category_option_false_selected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f330dabbb4_80918167',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f330dabbb4_80918167')) {function content_5466f330dabbb4_80918167($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?>
<?php echo $_smarty_tpl->getSubTemplate ('include/dbselect.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table class="doubleSelect">
  <tr>
    <td>
      <h3><?php echo $_smarty_tpl->tpl_vars['L_CAT_OPTIONS_TRUE']->value;?>
</h3>
      <select class="categoryList" name="cat_true[]" multiple="multiple" size="30">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_option_true']->value,'selected'=>$_smarty_tpl->tpl_vars['category_option_true_selected']->value),$_smarty_tpl);?>

      </select>
      <p><input class="submit" type="submit" value="&raquo;" name="falsify" style="font-size:15px;"></p>
    </td>

    <td>
      <h3><?php echo $_smarty_tpl->tpl_vars['L_CAT_OPTIONS_FALSE']->value;?>
</h3>
      <select class="categoryList" name="cat_false[]" multiple="multiple" size="30">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_option_false']->value,'selected'=>$_smarty_tpl->tpl_vars['category_option_false_selected']->value),$_smarty_tpl);?>

      </select>
      <p><input class="submit" type="submit" value="&laquo;" name="trueify" style="font-size:15px;"></p>
    </td>
  </tr>
</table>
<?php }} ?>