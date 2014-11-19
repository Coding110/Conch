<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:31:28
         compiled from "./themes/becktu/template/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4005271585466c91080c983-60435676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db3f011751162ac74096ea774b53463cfeee07cf' => 
    array (
      0 => './themes/becktu/template/search.tpl',
      1 => 1414394359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4005271585466c91080c983-60435676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUBAR' => 0,
    'U_HELP' => 0,
    'U_HOME' => 0,
    'LEVEL_SEPARATOR' => 0,
    'F_SEARCH_ACTION' => 0,
    'TAG_SELECTION' => 0,
    'START_DAY_SELECTED' => 0,
    'month_list' => 0,
    'START_MONTH_SELECTED' => 0,
    'END_DAY_SELECTED' => 0,
    'END_MONTH_SELECTED' => 0,
    'category_options' => 0,
    'category_options_selected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c9108b1735_01156845',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c9108b1735_01156845')) {function content_5466c9108b1735_01156845($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/piwigo/include/smarty/libs/plugins/modifier.date_format.php';
?>





<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?><?php echo $_smarty_tpl->tpl_vars['MENUBAR']->value;?>
<?php }?>
<div id="content" class="content<?php if (isset($_smarty_tpl->tpl_vars['MENUBAR']->value)){?> contentWithMenu<?php }?>">

	<div class="titrePage">
		<ul class="categoryActions">
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'core.scripts','load'=>'async','path'=>'themes/default/js/scripts.js'),$_smarty_tpl);?>

			<li><a href="<?php echo $_smarty_tpl->tpl_vars['U_HELP']->value;?>
" onclick="popuphelp(this.href); return false;" title="<?php echo l10n('Help');?>
" class="pwg-state-default pwg-button">
				<span class="pwg-icon pwg-icon-help"></span><span class="pwg-button-text"><?php echo l10n('Help');?>
</span>
			</a></li>
		</ul>
		<h2><a href="<?php echo $_smarty_tpl->tpl_vars['U_HOME']->value;?>
"><?php echo l10n('Home');?>
</a><?php echo $_smarty_tpl->tpl_vars['LEVEL_SEPARATOR']->value;?>
<?php echo l10n('Search');?>
</h2>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ('infos_errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form class="filter" method="post" name="search" action="<?php echo $_smarty_tpl->tpl_vars['F_SEARCH_ACTION']->value;?>
">
<fieldset>
  <legend><?php echo l10n('Filter');?>
</legend>
  <label><?php echo l10n('Search for words');?>

    <input type="text" name="search_allwords" size="35">
  </label>
  <ul>
    <li><label>
      <input type="radio" name="mode" value="AND" checked="checked"><?php echo l10n('Search for all terms');?>

    </label></li>
    <li><label>
      <input type="radio" name="mode" value="OR"><?php echo l10n('Search for any term');?>

    </label></li>
  </ul>
  <label><?php echo l10n('Search for Author');?>

    <input type="text" name="search_author" size="35">
  </label>
</fieldset>

<?php if (isset($_smarty_tpl->tpl_vars['TAG_SELECTION']->value)){?>
<fieldset>
  <legend><?php echo l10n('Search tags');?>
</legend>
  <?php echo $_smarty_tpl->tpl_vars['TAG_SELECTION']->value;?>

  <label><span><input type="radio" name="tag_mode" value="AND" checked="checked"> <?php echo l10n('All tags');?>
</span></label>
  <label><span><input type="radio" name="tag_mode" value="OR"> <?php echo l10n('Any tag');?>
</span></label>
</fieldset>
<?php }?>

<fieldset>
  <legend><?php echo l10n('Search by date');?>
</legend>
  <ul>
    <li><label><?php echo l10n('Kind of date');?>
</label></li>
    <li><label>
      <input type="radio" name="date_type" value="date_creation" checked="checked"><?php echo l10n('Creation date');?>

    </label></li>
    <li><label>
      <input type="radio" name="date_type" value="date_available"><?php echo l10n('Post date');?>

    </label></li>
  </ul>
  <ul>
    <li><label><?php echo l10n('Date');?>
</label></li>
    <li>
      <select id="start_day" name="start_day">
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
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['day']['index']==$_smarty_tpl->tpl_vars['START_DAY_SELECTED']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['day']['index'];?>
</option>
<?php endfor; endif; ?>
      </select>
      <select id="start_month" name="start_month">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['month_list']->value,'selected'=>$_smarty_tpl->tpl_vars['START_MONTH_SELECTED']->value),$_smarty_tpl);?>

      </select>
      <input id="start_year" name="start_year" type="text" size="4" maxlength="4" >
      <input id="start_linked_date" name="start_linked_date" type="hidden" size="10" disabled="disabled">
    </li>
    <li>
      <a class="date_today" href="#" onClick="document.search.start_day.value=<?php echo smarty_modifier_date_format(time(),"%d");?>
;document.search.start_month.value=<?php echo smarty_modifier_date_format(time(),"%m");?>
;document.search.start_year.value=<?php echo smarty_modifier_date_format(time(),"%Y");?>
;return false;"><?php echo l10n('today');?>
</a>
    </li>
  </ul>
  <ul>
    <li><label><?php echo l10n('End-Date');?>
</label></li>
    <li>
      <select id="end_day" name="end_day">
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
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['day']['index']==$_smarty_tpl->tpl_vars['END_DAY_SELECTED']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['day']['index'];?>
</option>
<?php endfor; endif; ?>
      </select>
      <select id="end_month" name="end_month">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['month_list']->value,'selected'=>$_smarty_tpl->tpl_vars['END_MONTH_SELECTED']->value),$_smarty_tpl);?>

      </select>
      <input id="end_year" name="end_year" type="text" size="4" maxlength="4" >
      <input id="end_linked_date" name="end_linked_date" type="hidden" size="10" disabled="disabled">
    </li>
    <li>
      <a class="date_today" href="#" onClick="document.search.end_day.value=<?php echo smarty_modifier_date_format(time(),"%d");?>
;document.search.end_month.value=<?php echo smarty_modifier_date_format(time(),"%m");?>
;document.search.end_year.value=<?php echo smarty_modifier_date_format(time(),"%Y");?>
;return false;"><?php echo l10n('today');?>
</a>
    </li>
  </ul>
</fieldset>

<fieldset>
  <legend><?php echo l10n('Search in albums');?>
</legend>
  <label><?php echo l10n('Albums');?>

    <select class="categoryList" name="cat[]" multiple="multiple" size="15">
      <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['category_options']->value,'selected'=>$_smarty_tpl->tpl_vars['category_options_selected']->value),$_smarty_tpl);?>

    </select>
  </label>
  <ul>
    <li><label><?php echo l10n('Search in sub-albums');?>
</label></li>
    <li><label>
      <input type="radio" name="subcats-included" value="1" checked="checked"><?php echo l10n('Yes');?>

    </label></li>
    <li><label>
      <input type="radio" name="subcats-included" value="0"><?php echo l10n('No');?>

    </label></li>
  </ul>
</fieldset>
<p>
  <input class="submit" type="submit" name="submit" value="<?php echo l10n('Submit');?>
">
  <input class="submit" type="reset" value="<?php echo l10n('Reset');?>
">
</p>
</form>

<script type="text/javascript"><!--
document.search.search_allwords.focus();
//--></script>

</div> <!-- content -->
<?php }} ?>