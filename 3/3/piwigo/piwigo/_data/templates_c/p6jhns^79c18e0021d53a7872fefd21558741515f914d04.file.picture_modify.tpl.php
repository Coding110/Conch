<?php /* Smarty version Smarty-3.1.13, created on 2014-11-16 15:18:03
         compiled from "./admin/themes/default/template/picture_modify.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18012782854684fab3681e2-39678618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79c18e0021d53a7872fefd21558741515f914d04' => 
    array (
      0 => './admin/themes/default/template/picture_modify.tpl',
      1 => 1385719985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18012782854684fab3681e2-39678618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tags' => 0,
    'tag' => 0,
    'TITLE' => 0,
    'TABSHEET_TITLE' => 0,
    'F_ACTION' => 0,
    'TN_SRC' => 0,
    'INTRO' => 0,
    'U_JUMPTO' => 0,
    'PATH' => 0,
    'U_SYNC' => 0,
    'U_DELETE' => 0,
    'NAME' => 0,
    'AUTHOR' => 0,
    'DATE_CREATION_DAY_VALUE' => 0,
    'month_list' => 0,
    'DATE_CREATION_MONTH_VALUE' => 0,
    'DATE_CREATION_YEAR_VALUE' => 0,
    'DATE_CREATION_TIME_VALUE' => 0,
    'associate_options' => 0,
    'associate_options_selected' => 0,
    'represent_options' => 0,
    'represent_options_selected' => 0,
    'tag_selection' => 0,
    'DESCRIPTION' => 0,
    'level_options' => 0,
    'level_options_selected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54684fab4468f8_44971965',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54684fab4468f8_44971965')) {function content_54684fab4468f8_44971965($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ('include/autosize.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('include/dbselect.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('include/datepicker.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.chosen','load'=>'footer','path'=>'themes/default/js/plugins/chosen.jquery.min.js'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>"themes/default/js/plugins/chosen.css"),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function() {
  jQuery(".chzn-select").chosen();
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_css'][0][0]->func_combine_css(array('path'=>'themes/default/js/plugins/jquery.tokeninput.css'),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.tokeninput','load'=>'async','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.tokeninput.js'),$_smarty_tpl);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.tokeninput')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.tokeninput'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery(document).ready(function() {
  jQuery("#tags").tokenInput(
    [<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tag']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->iteration++;
 $_smarty_tpl->tpl_vars['tag']->last = $_smarty_tpl->tpl_vars['tag']->iteration === $_smarty_tpl->tpl_vars['tag']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tags']['last'] = $_smarty_tpl->tpl_vars['tag']->last;
?>{"name":"<?php echo strtr($_smarty_tpl->tpl_vars['tag']->value['name'], array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
","id":"<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['tags']['last']){?>,<?php }?><?php } ?>],
    {
      hintText: '<?php echo l10n('Type in a search term');?>
',
      noResultsText: '<?php echo l10n('No results');?>
',
      searchingText: '<?php echo l10n('Searching...');?>
',
      newText: ' (<?php echo l10n('new');?>
)',
      animateDropdown: false,
      preventDuplicates: true,
      allowFreeTagging: true
    }
  );
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.tokeninput'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

pwg_initialization_datepicker("#date_creation_day", "#date_creation_month", "#date_creation_year", "#date_creation_linked_date", "#date_creation_action_set");
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<h2><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
 &#8250; <?php echo l10n('Edit photo');?>
 <?php echo $_smarty_tpl->tpl_vars['TABSHEET_TITLE']->value;?>
</h2>

<form action="<?php echo $_smarty_tpl->tpl_vars['F_ACTION']->value;?>
" method="post" id="catModify">

  <fieldset>
    <legend><?php echo l10n('Informations');?>
</legend>

    <table>

      <tr>
        <td id="albumThumbnail">
          <img src="<?php echo $_smarty_tpl->tpl_vars['TN_SRC']->value;?>
" alt="<?php echo l10n('Thumbnail');?>
" class="Thumbnail">
        </td>
        <td id="albumLinks" style="width:400px;vertical-align:top;">
          <ul style="padding-left:15px;margin:0;">
            <li><?php echo $_smarty_tpl->tpl_vars['INTRO']->value['file'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['INTRO']->value['add_date'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['INTRO']->value['added_by'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['INTRO']->value['size'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['INTRO']->value['stats'];?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['INTRO']->value['id'];?>
</li>
          </ul>
        </td>
        <td class="photoLinks">
          <ul>
<?php if (isset($_smarty_tpl->tpl_vars['U_JUMPTO']->value)){?>
            <li><a class="icon-eye" href="<?php echo $_smarty_tpl->tpl_vars['U_JUMPTO']->value;?>
"><?php echo l10n('jump to photo');?>
 →</a></li>
<?php }?>
<?php if (!url_is_remote($_smarty_tpl->tpl_vars['PATH']->value)){?>
            <li><a class="icon-arrows-cw" href="<?php echo $_smarty_tpl->tpl_vars['U_SYNC']->value;?>
"><?php echo l10n('Synchronize metadata');?>
</a></li>

            <li><a class="icon-trash" href="<?php echo $_smarty_tpl->tpl_vars['U_DELETE']->value;?>
" onclick="return confirm('<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
');"><?php echo l10n('delete photo');?>
</a></li>
<?php }?>
          </ul>
        </td>
      </tr>
    </table>

  </fieldset>

  <fieldset>
    <legend><?php echo l10n('Properties');?>
</legend>

    <p>
      <strong><?php echo l10n('Title');?>
</strong>
      <br>
      <input type="text" class="large" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['NAME']->value, ENT_QUOTES, 'UTF-8', true);?>
">
    </p>

    <p>
      <strong><?php echo l10n('Author');?>
</strong>
      <br>
      <input type="text" class="large" name="author" value="<?php echo $_smarty_tpl->tpl_vars['AUTHOR']->value;?>
">
    </p>

    <p>
      <strong><?php echo l10n('Creation date');?>
</strong>
      <br>
      <select id="date_creation_day" name="date_creation_day">
        <option value="0">--</option>
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['day'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['day']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['name'] = 'day';
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total']);
?>
        <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['day']['index'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['day']['index']==$_smarty_tpl->tpl_vars['DATE_CREATION_DAY_VALUE']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['day']['index'];?>
</option>
<?php endfor; endif; ?>
      </select>

      <select id="date_creation_month" name="date_creation_month">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['month_list']->value,'selected'=>$_smarty_tpl->tpl_vars['DATE_CREATION_MONTH_VALUE']->value),$_smarty_tpl);?>

      </select>

      <input id="date_creation_year" name="date_creation_year" type="text" size="4" maxlength="4" value="<?php echo $_smarty_tpl->tpl_vars['DATE_CREATION_YEAR_VALUE']->value;?>
">
      <input id="date_creation_linked_date" name="date_creation_linked_date" type="hidden" size="10" disabled="disabled">
      <input name="date_creation_time" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['DATE_CREATION_TIME_VALUE']->value;?>
">
      <a href="#" id="unset_date_creation" style="display:none">unset</a>
    </p>

    <p>
      <strong><?php echo l10n('Linked albums');?>
</strong>
      <br>
      <select data-placeholder="Select albums..." class="chzn-select" multiple style="width:700px;" name="associate[]">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['associate_options']->value,'selected'=>$_smarty_tpl->tpl_vars['associate_options_selected']->value),$_smarty_tpl);?>

      </select>
    </p>

    <p>
      <strong><?php echo l10n('Representation of albums');?>
</strong>
      <br>
      <select data-placeholder="Select albums..." class="chzn-select" multiple style="width:700px;" name="represent[]">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['represent_options']->value,'selected'=>$_smarty_tpl->tpl_vars['represent_options_selected']->value),$_smarty_tpl);?>

      </select>
    </p>

    <p>
      <strong><?php echo l10n('Tags');?>
</strong>
      <br>
<select id="tags" name="tags">
<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tag_selection']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
  <option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
" class="selected"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
<?php } ?>
</select>
    </p>

    <p>
      <strong><?php echo l10n('Description');?>
</strong>
      <br>
      <textarea name="description" id="description" class="description"><?php echo $_smarty_tpl->tpl_vars['DESCRIPTION']->value;?>
</textarea>
    </p>

    <p>
      <strong><?php echo l10n('Who can see this photo?');?>
</strong>
      <br>
      <select name="level" size="1">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['level_options']->value,'selected'=>$_smarty_tpl->tpl_vars['level_options_selected']->value),$_smarty_tpl);?>

      </select>
   </p>

  <p style="margin:40px 0 0 0">
    <input class="submit" type="submit" value="<?php echo l10n('Save Settings');?>
" name="submit">
  </p>
</fieldset>

</form>
<?php }} ?>