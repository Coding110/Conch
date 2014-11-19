<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:25:05
         compiled from "./admin/themes/default/template/extend_for_templates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78922005754670de1829376-43616951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3fd0cb6e97544c81a8d732a73ea4042d875556c' => 
    array (
      0 => './admin/themes/default/template/extend_for_templates.tpl',
      1 => 1372109911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78922005754670de1829376-43616951',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'extents' => 0,
    'tpl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670de1882619_56190544',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670de1882619_56190544')) {function content_54670de1882619_56190544($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><div class="titrePage"><h2><?php echo l10n('Extend for templates');?>
</h2>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['extents']->value)){?>
<h4><?php echo l10n('Replacement of original templates by customized templates from template-extension subfolder');?>
</h4>
<form method="post" name="extend_for_templates" id="extend_for_templates" action="">
  <table class="table2">
    <tr class="throw">
      <th><?php echo l10n('Replacers (customized templates)');?>
</th>
      <th><?php echo l10n('Original templates');?>
</th>
      <th><?php echo l10n('Optional URL keyword');?>
</th>
      <th><?php echo l10n('Bound Theme');?>
</th>
    </tr>
<?php  $_smarty_tpl->tpl_vars['tpl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tpl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['extents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['extent_loop']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tpl']->key => $_smarty_tpl->tpl_vars['tpl']->value){
$_smarty_tpl->tpl_vars['tpl']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['extent_loop']['index']++;
?>
    <tr class="<?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['foreach']['extent_loop']['index'])){?>row1<?php }else{ ?>row2<?php }?>">
      <td>
        <input type="hidden" name="reptpl[]" value="<?php echo $_smarty_tpl->tpl_vars['tpl']->value['replacer'];?>
">
        <?php echo $_smarty_tpl->tpl_vars['tpl']->value['replacer'];?>

      </td>
      <td>
        <?php echo smarty_function_html_options(array('name'=>'original[]','output'=>$_smarty_tpl->tpl_vars['tpl']->value['original_tpl'],'values'=>$_smarty_tpl->tpl_vars['tpl']->value['original_tpl'],'selected'=>$_smarty_tpl->tpl_vars['tpl']->value['selected_tpl']),$_smarty_tpl);?>

      </td>
      <td>
        <?php echo smarty_function_html_options(array('name'=>'url[]','output'=>$_smarty_tpl->tpl_vars['tpl']->value['url_parameter'],'values'=>$_smarty_tpl->tpl_vars['tpl']->value['url_parameter'],'selected'=>$_smarty_tpl->tpl_vars['tpl']->value['selected_url']),$_smarty_tpl);?>

      </td>
      <td>
        <?php echo smarty_function_html_options(array('name'=>'bound[]','output'=>$_smarty_tpl->tpl_vars['tpl']->value['bound_tpl'],'values'=>$_smarty_tpl->tpl_vars['tpl']->value['bound_tpl'],'selected'=>$_smarty_tpl->tpl_vars['tpl']->value['selected_bound']),$_smarty_tpl);?>

      </td>
    </tr>
<?php } ?>
  </table>
  <p>
    <input type="submit" value="<?php echo l10n('Submit');?>
" name="submit">
  </p>
</form>
<?php }?>
<?php }} ?>