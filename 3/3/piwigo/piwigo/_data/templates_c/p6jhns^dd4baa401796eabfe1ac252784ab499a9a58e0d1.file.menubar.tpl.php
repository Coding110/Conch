<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 14:30:16
         compiled from "./admin/themes/default/template/menubar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8246905525466f2f85c7124-87799340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd4baa401796eabfe1ac252784ab499a9a58e0d1' => 
    array (
      0 => './admin/themes/default/template/menubar.tpl',
      1 => 1367990587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8246905525466f2f85c7124-87799340',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'F_ACTION' => 0,
    'blocks' => 0,
    'block' => 0,
    'themeconf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466f2f861ef87_87851420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466f2f861ef87_87851420')) {function content_5466f2f861ef87_87851420($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.math.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.ui.sortable')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.sortable'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
	jQuery(".menuPos").hide();
	jQuery(".drag_button").show();
	jQuery(".menuLi").css("cursor","move");
	jQuery(".menuUl").sortable({
		axis: "y",
		opacity: 0.8
	});
	jQuery("input[name^='hide_']").click(function() {
		men = this.name.split('hide_');
		if (this.checked) {
			jQuery("#menu_"+men[1]).addClass('menuLi_hidden');
		} else {
			jQuery("#menu_"+men[1]).removeClass('menuLi_hidden');
		}
	});
	jQuery("#menuOrdering").submit(function(){
		ar = jQuery('.menuUl').sortable('toArray');
		for(i=0;i<ar.length;i++) {
			men = ar[i].split('menu_');
			document.getElementsByName('pos_' + men[1])[0].value = i+1;
		}
	});
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ui.sortable'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="titrePage">
  <h2><?php echo l10n('Menu Management');?>
</h2>
</div>

<form id="menuOrdering" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="post">
  <ul class="menuUl">
<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blocks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value){
$_smarty_tpl->tpl_vars['block']->_loop = true;
?>
    <li class="menuLi <?php if ($_smarty_tpl->tpl_vars['block']->value['pos']<0){?>menuLi_hidden<?php }?>" id="menu_<?php echo $_smarty_tpl->tpl_vars['block']->value['reg']->get_id();?>
">
      <p>
        <span>
          <strong><?php echo l10n('Hide');?>
 <input type="checkbox" name="hide_<?php echo $_smarty_tpl->tpl_vars['block']->value['reg']->get_id();?>
" <?php if ($_smarty_tpl->tpl_vars['block']->value['pos']<0){?>checked="checked"<?php }?>></strong>
        </span>

        <img src="<?php echo $_smarty_tpl->tpl_vars['themeconf']->value['admin_icon_dir'];?>
/cat_move.png" class="drag_button" style="display:none;" alt="<?php echo l10n('Drag to re-order');?>
" title="<?php echo l10n('Drag to re-order');?>
">
        <strong><?php echo l10n($_smarty_tpl->tpl_vars['block']->value['reg']->get_name());?>
</strong> (<?php echo $_smarty_tpl->tpl_vars['block']->value['reg']->get_id();?>
)
      </p>

<?php if ($_smarty_tpl->tpl_vars['block']->value['reg']->get_owner()!='piwigo'){?>
      <p class="menuAuthor">
        <?php echo l10n('Author');?>
: <i><?php echo $_smarty_tpl->tpl_vars['block']->value['reg']->get_owner();?>
</i>
      </p>
<?php }?>
      <p class="menuPos">
        <label>
          <?php echo l10n('Position');?>
 :
          <input type="text" size="4" name="pos_<?php echo $_smarty_tpl->tpl_vars['block']->value['reg']->get_id();?>
" maxlength="4" value="<?php echo smarty_function_math(array('equation'=>"abs(pos)",'pos'=>$_smarty_tpl->tpl_vars['block']->value['pos']),$_smarty_tpl);?>
">
        </label>
      </p>
    </li>
<?php } ?>
  </ul>
  <p class="menuSubmit">
    <input type="submit" name="submit" value="<?php echo l10n('Submit');?>
">
    <input type="submit" name="reset" value="<?php echo l10n('Reset');?>
">
  </p>

</form>
<?php }} ?>