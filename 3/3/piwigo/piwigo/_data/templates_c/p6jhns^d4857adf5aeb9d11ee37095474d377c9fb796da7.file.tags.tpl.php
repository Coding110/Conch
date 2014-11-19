<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 16:26:32
         compiled from "./admin/themes/default/template/tags.tpl" */ ?>
<?php /*%%SmartyHeaderCode:89686452554670e38243d92-84122193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4857adf5aeb9d11ee37095474d377c9fb796da7' => 
    array (
      0 => './admin/themes/default/template/tags.tpl',
      1 => 1389529006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89686452554670e38243d92-84122193',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'F_ACTION' => 0,
    'EDIT_TAGS_LIST' => 0,
    'tags' => 0,
    'tag' => 0,
    'DUPLIC_TAGS_LIST' => 0,
    'MERGE_TAGS_LIST' => 0,
    'all_tags' => 0,
    'PWG_TOKEN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670e38306f29_82452380',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670e38306f29_82452380')) {function content_54670e38306f29_82452380($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('include/tag_selection.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('html_style', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.showInfo { text-indent:5px; }
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_style'][0][0]->block_html_style(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery('.showInfo').tipTip({
  'delay' : 0,
  'fadeIn' : 200,
  'fadeOut' : 200,
  'maxWidth':'300px',
  'keepAlive':true,
  'activation':'click'
});

function displayDeletionWarnings() {
  jQuery(".warningDeletion").show();
  jQuery("input[name=destination_tag]:checked").parent("label").children(".warningDeletion").hide();
}

displayDeletionWarnings();

jQuery("#mergeTags label").click(function() {
  displayDeletionWarnings();
});

jQuery("input[name=merge]").click(function() {
  if (jQuery("ul.tagSelection input[type=checkbox]:checked").length < 2) {
    alert("<?php echo l10n('Select at least two tags for merging');?>
");
    return false;
  }
});

$("#searchInput").on("keydown", function(e) {
  var $this = $(this),
      timer = $this.data("timer");

  if (timer) {
    clearTimeout(timer);
  }

  $this.data("timer", setTimeout(function() {
    var val = $this.val();
    if (!val) {
      $(".tagSelection>li").show();
      $("#filterIcon").css("visibility","hidden");
    }
    else {
      $("#filterIcon").css("visibility","visible");
      var regex = new RegExp( val.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&"), "i" );
      $(".tagSelection>li").each(function() {
        var $li = $(this),
            text = $.trim( $("label", $li).text() );
        $li.toggle(regex.test(text));
      });
    }

  }, 300) );

  if (e.keyCode == 13) { // Enter
    e.preventDefault();
  }
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<div class="titrePage">
  <h2><?php echo l10n('Manage tags');?>
</h2>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="post">
<?php if (isset($_smarty_tpl->tpl_vars['EDIT_TAGS_LIST']->value)){?>
  <fieldset>
    <legend><?php echo l10n('Edit tags');?>
</legend>
    <input type="hidden" name="edit_list" value="<?php echo $_smarty_tpl->tpl_vars['EDIT_TAGS_LIST']->value;?>
">
    <table class="table2">
      <tr class="throw">
        <th><?php echo l10n('Current name');?>
</th>
        <th><?php echo l10n('New name');?>
</th>
      </tr>
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['tag']->value['NAME'];?>
</td>
        <td><input type="text" name="tag_name-<?php echo $_smarty_tpl->tpl_vars['tag']->value['ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['NAME'];?>
" size="50"></td>
      </tr>
<?php } ?>
    </table>

    <p>
      <input type="submit" name="edit_submit" value="<?php echo l10n('Submit');?>
">
      <input type="submit" name="edit_cancel" value="<?php echo l10n('Cancel');?>
">
    </p>
  </fieldset>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['DUPLIC_TAGS_LIST']->value)){?>
  <fieldset>
    <legend><?php echo l10n('Edit tags');?>
</legend>
    <input type="hidden" name="edit_list" value="<?php echo $_smarty_tpl->tpl_vars['DUPLIC_TAGS_LIST']->value;?>
">
    <table class="table2">
      <tr class="throw">
        <th><?php echo l10n('Source tag');?>
</th>
        <th><?php echo l10n('Name of the duplicate');?>
</th>
      </tr>
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['tag']->value['NAME'];?>
</td>
        <td><input type="text" name="tag_name-<?php echo $_smarty_tpl->tpl_vars['tag']->value['ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['NAME'];?>
" size="50"></td>
      </tr>
<?php } ?>
    </table>

    <p>
      <input type="submit" name="duplic_submit" value="<?php echo l10n('Submit');?>
">
      <input type="submit" name="duplic_cancel" value="<?php echo l10n('Cancel');?>
">
    </p>
  </fieldset>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['MERGE_TAGS_LIST']->value)){?>
  <fieldset id="mergeTags">
    <legend><?php echo l10n('Merge tags');?>
</legend>
    <?php echo l10n('Select the destination tag');?>


    <p>
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tagloop']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tagloop']['index']++;
?>
    <label><input type="radio" name="destination_tag" value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['ID'];?>
"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['tagloop']['index']==0){?> checked="checked"<?php }?>> <?php echo $_smarty_tpl->tpl_vars['tag']->value['NAME'];?>
<span class="warningDeletion"> <?php echo l10n('(this tag will be deleted)');?>
</span></label><br>
<?php } ?>
    </p>

    <p>
      <input type="hidden" name="merge_list" value="<?php echo $_smarty_tpl->tpl_vars['MERGE_TAGS_LIST']->value;?>
">
      <input type="submit" name="merge_submit" value="<?php echo l10n('Confirm merge');?>
">
      <input type="submit" name="merge_cancel" value="<?php echo l10n('Cancel');?>
">
    </p>
  </fieldset>
<?php }?>
  <fieldset>
    <legend><?php echo l10n('Add a tag');?>
</legend>

    <label>
      <?php echo l10n('New tag');?>

      <input type="text" name="add_tag" size="50">
    </label>

    <p><input class="submit" type="submit" name="add" value="<?php echo l10n('Submit');?>
"></p>
  </fieldset>

  <fieldset>
    <legend><?php echo l10n('Tag selection');?>
</legend>

<?php if (count($_smarty_tpl->tpl_vars['all_tags']->value)){?>
    <div><label><span class="icon-filter" style="visibility:hidden" id="filterIcon"></span><?php echo l10n('Search');?>
: <input id="searchInput" type="text" size="12"></label></div>
<?php }?>
    <ul class="tagSelection">
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
      <li>
        <?php $_smarty_tpl->_capture_stack[0][] = array('showInfo', null, null); ob_start(); ?> <b><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</b> (<?php echo l10n_dec('%d photo','%d photos',$_smarty_tpl->tpl_vars['tag']->value['counter']);?>
)<br> <a href="<?php echo $_smarty_tpl->tpl_vars['tag']->value['U_VIEW'];?>
"><?php echo l10n('View in gallery');?>
</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['tag']->value['U_EDIT'];?>
"><?php echo l10n('Manage photos');?>
</a> <?php if (!empty($_smarty_tpl->tpl_vars['tag']->value['alt_names'])){?><br><?php echo $_smarty_tpl->tpl_vars['tag']->value['alt_names'];?>
<?php }?> <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <a class="icon-info-circled-1 showInfo" title="<?php echo htmlspecialchars(Smarty::$_smarty_vars['capture']['showInfo']);?>
"></a>
        <label>
          <input type="checkbox" name="tags[]" value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>

        </label>
      </li>
<?php } ?>
    </ul>

    <p>
      <input type="hidden" name="pwg_token" value="<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
">
      <input type="submit" name="edit" value="<?php echo l10n('Edit selected tags');?>
">
      <input type="submit" name="duplicate" value="<?php echo l10n('Duplicate selected tags');?>
">
      <input type="submit" name="merge" value="<?php echo l10n('Merge selected tags');?>
">
      <input type="submit" name="delete" value="<?php echo l10n('Delete selected tags');?>
" onclick="return confirm('<?php echo l10n('Are you sure?');?>
');">
    </p>
  </fieldset>

</form>
<?php }} ?>