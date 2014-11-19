<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 20:31:58
         compiled from "./admin/themes/default/template/comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8230375805468993edc9373-19752253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3e2de98aebc60bc818ea643e0f89cecfa53d511' => 
    array (
      0 => './admin/themes/default/template/comments.tpl',
      1 => 1385643991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8230375805468993edc9373-19752253',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TABSHEET_TITLE' => 0,
    'F_ACTION' => 0,
    'filter' => 0,
    'nb_total' => 0,
    'nb_pending' => 0,
    'navbar' => 0,
    'comments' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5468993ee2f527_52984174',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5468993ee2f527_52984174')) {function content_5468993ee2f527_52984174($_smarty_tpl) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function(){
  function highlighComments() {
    jQuery(".checkComment").each(function() {
      var parent = jQuery(this).parent('tr');
      if (jQuery(this).children("input[type=checkbox]").is(':checked')) {
        jQuery(parent).addClass('selectedComment'); 
      }
      else {
        jQuery(parent).removeClass('selectedComment'); 
      }
    });
  }

  jQuery(".checkComment").click(function(event) {
    var checkbox = jQuery(this).children("input[type=checkbox]");
    if (event.target.type !== 'checkbox') {
      jQuery(checkbox).prop('checked', !jQuery(checkbox).prop('checked'));
    }
    highlighComments();
  });

  jQuery("#commentSelectAll").click(function () {
    jQuery(".checkComment input[type=checkbox]").prop('checked', true);
    highlighComments();
    return false;
  });

  jQuery("#commentSelectNone").click(function () {
    jQuery(".checkComment input[type=checkbox]").prop('checked', false);
    highlighComments();
    return false;
  });

  jQuery("#commentSelectInvert").click(function () {
    jQuery(".checkComment input[type=checkbox]").each(function() {
      jQuery(this).prop('checked', !$(this).prop('checked'));
    });
    highlighComments();
    return false;
  });

});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<h2><?php echo l10n('User comments');?>
 <?php echo $_smarty_tpl->tpl_vars['TABSHEET_TITLE']->value;?>
</h2>

<div class="commentFilter">
  <a href="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
&amp;filter=all" class="<?php if ($_smarty_tpl->tpl_vars['filter']->value=='all'){?>commentFilterSelected<?php }?>"><?php echo l10n('All');?>
</a> (<?php echo $_smarty_tpl->tpl_vars['nb_total']->value;?>
)
  | <a href="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
&amp;filter=pending" class="<?php if ($_smarty_tpl->tpl_vars['filter']->value=='pending'){?>commentFilterSelected<?php }?>"><?php echo l10n('Waiting');?>
</a> (<?php echo $_smarty_tpl->tpl_vars['nb_pending']->value;?>
)
<?php if (!empty($_smarty_tpl->tpl_vars['navbar']->value)){?><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['get_extent'][0][0]->get_extent('navigation_bar.tpl','navbar'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
</div>



<?php if (!empty($_smarty_tpl->tpl_vars['comments']->value)){?>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" id="pendingComments">
  
<table>
<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['comment']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['comment']['index']++;
?>
  <tr valign="top" class="<?php if ((1 & $_smarty_tpl->getVariable('smarty')->value['foreach']['comment']['index'])){?>row2<?php }else{ ?>row1<?php }?>">
    <td style="width:50px;" class="checkComment">
      <input type="checkbox" name="comments[]" value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['ID'];?>
">
    </td>
    <td>
  <div class="comment">
    <a class="illustration" href="<?php echo $_smarty_tpl->tpl_vars['comment']->value['U_PICTURE'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['comment']->value['TN_SRC'];?>
"></a>
    <p class="commentHeader"><?php if ($_smarty_tpl->tpl_vars['comment']->value['IS_PENDING']){?><span class="pendingFlag"><?php echo l10n('Waiting');?>
</span> - <?php }?><strong><?php echo $_smarty_tpl->tpl_vars['comment']->value['AUTHOR'];?>
</strong> - <em><?php echo $_smarty_tpl->tpl_vars['comment']->value['DATE'];?>
</em></p>
    <blockquote><?php echo $_smarty_tpl->tpl_vars['comment']->value['CONTENT'];?>
</blockquote>
  </div>
    </td>
  </tr>
<?php } ?>
</table>

  <p class="checkActions">
    <?php echo l10n('Select:');?>

    <a href="#" id="commentSelectAll"><?php echo l10n('All');?>
</a>,
    <a href="#" id="commentSelectNone"><?php echo l10n('None');?>
</a>,
    <a href="#" id="commentSelectInvert"><?php echo l10n('Invert');?>
</a>
  </p>

  <p class="bottomButtons">
    <input type="submit" name="validate" value="<?php echo l10n('Validate');?>
">
    <input type="submit" name="reject" value="<?php echo l10n('Reject');?>
">
  </p>

</form>
<?php }?>
<?php }} ?>