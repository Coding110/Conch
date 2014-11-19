<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:30:08
         compiled from "./admin/themes/default/template/plugins_installed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6279127365466c8c06b4ff6-00666326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa887236991383000fb8e51e585313a1363fec21' => 
    array (
      0 => './admin/themes/default/template/plugins_installed.tpl',
      1 => 1382180651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6279127365466c8c06b4ff6-00666326',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PWG_TOKEN' => 0,
    'show_details' => 0,
    'base_url' => 0,
    'plugins' => 0,
    'field_name' => 0,
    'plugin' => 0,
    'author' => 0,
    'version' => 0,
    'active_plugins' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8c077c521_40340495',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8c077c521_40340495')) {function content_5466c8c077c521_40340495($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/var/www/html/piwigo/include/smarty/libs/plugins/function.counter.php';
?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.ajaxmanager','load'=>'footer','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.ajaxmanager.js'),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.ajaxmanager')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ajaxmanager'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

/* incompatible message */
var incompatible_msg = '<?php echo strtr(l10n('WARNING! This plugin does not seem to be compatible with this version of Piwigo.'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
';
var activate_msg = '\n<?php echo strtr(l10n('Do you want to activate anyway?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
';

/* group action */
var pwg_token = '<?php echo $_smarty_tpl->tpl_vars['PWG_TOKEN']->value;?>
';
var confirmMsg  = '<?php echo strtr(l10n('Are you sure?'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
';

var queuedManager = jQuery.manageAjax.create('queued', { 
  queue: true,  
  maxRequests: 1
});
var nb_plugins = jQuery('div.active').size();
var done = 0;

jQuery(document).ready(function() {
  /* group action */
  jQuery('div.deactivate_all a').click(function() {
    if (confirm(confirmMsg)) {
      jQuery('div.active').each(function() {
        performPluginDeactivate(jQuery(this).attr('id'));
      });
    }
  });
  function performPluginDeactivate(id) {
   queuedManager.add({
      type: 'GET',
      dataType: 'json',
      url: 'ws.php',
      data: { method: 'pwg.plugins.performAction', action: 'deactivate', plugin: id, pwg_token: pwg_token, format: 'json' },
      success: function(data) {
        if (data['stat'] == 'ok') jQuery("#"+id).removeClass('active').addClass('inactive');
        done++;
        if (done == nb_plugins) location.reload();
      }
    });
  };

  /* incompatible plugins */
  jQuery(document).ready(function() {
    jQuery.ajax({
      method: 'GET',
      url: 'admin.php',
      data: { page: 'plugins_installed', incompatible_plugins: true },
      dataType: 'json',
      success: function(data) {
        for (i=0;i<data.length;i++) {
          
<?php if ($_smarty_tpl->tpl_vars['show_details']->value){?>
            jQuery('#'+data[i]+' .pluginBoxNameCell').prepend('<a class="warning" title="'+incompatible_msg+'"></a>')
<?php }else{ ?>
            jQuery('#'+data[i]+' .pluginMiniBoxNameCell').prepend('<span class="warning" title="'+incompatible_msg+'"></span>')
<?php }?>
          
          jQuery('#'+data[i]).addClass('incompatible');
          jQuery('#'+data[i]+' .activate').attr('onClick', 'return confirm(incompatible_msg + activate_msg);');
        }
        jQuery('.warning').tipTip({
          'delay' : 0,
          'fadeIn' : 200,
          'fadeOut' : 200,
          'maxWidth':'250px'
        });
      }
    });
  });
  
  /* TipTips */
  jQuery('.plugin-restore').tipTip({
    'delay' : 0,
    'fadeIn' : 200,
    'fadeOut' : 200
  });
  jQuery('.showInfo').tipTip({
    'delay' : 0,
    'fadeIn' : 200,
    'fadeOut' : 200,
    'maxWidth':'300px',
    'keepAlive':true,
    'activation':'click'
  });
});

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.ajaxmanager'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="titrePage">
  <h2><?php echo l10n('Plugins');?>
</h2>
</div>

<div class="showDetails">
<?php if ($_smarty_tpl->tpl_vars['show_details']->value){?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
&amp;show_details=0"><?php echo l10n('hide details');?>
</a>
<?php }else{ ?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
&amp;show_details=1"><?php echo l10n('show details');?>
</a>
<?php }?>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['plugins']->value)){?>

<?php if (isset($_smarty_tpl->tpl_vars['field_name'])) {$_smarty_tpl->tpl_vars['field_name'] = clone $_smarty_tpl->tpl_vars['field_name'];
$_smarty_tpl->tpl_vars['field_name']->value = 'null'; $_smarty_tpl->tpl_vars['field_name']->nocache = null; $_smarty_tpl->tpl_vars['field_name']->scope = 0;
} else $_smarty_tpl->tpl_vars['field_name'] = new Smarty_variable('null', null, 0);?> 
<?php echo smarty_function_counter(array('start'=>0,'assign'=>'i'),$_smarty_tpl);?>
 
<?php  $_smarty_tpl->tpl_vars['plugin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plugin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plugin']->key => $_smarty_tpl->tpl_vars['plugin']->value){
$_smarty_tpl->tpl_vars['plugin']->_loop = true;
?>
    
<?php if ($_smarty_tpl->tpl_vars['field_name']->value!=$_smarty_tpl->tpl_vars['plugin']->value['STATE']){?>
<?php if ($_smarty_tpl->tpl_vars['field_name']->value!='null'){?>
  </fieldset>
<?php }?>
  <fieldset class="pluginBoxes">
    <legend>
<?php if ($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='active'){?>
      <?php echo l10n('Active Plugins');?>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='inactive'){?>
      <?php echo l10n('Inactive Plugins');?>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='missing'){?>
      <?php echo l10n('Missing Plugins');?>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='merged'){?>
      <?php echo l10n('Obsolete Plugins');?>

<?php }?>
    </legend>
  <?php if (isset($_smarty_tpl->tpl_vars['field_name'])) {$_smarty_tpl->tpl_vars['field_name'] = clone $_smarty_tpl->tpl_vars['field_name'];
$_smarty_tpl->tpl_vars['field_name']->value = $_smarty_tpl->tpl_vars['plugin']->value['STATE']; $_smarty_tpl->tpl_vars['field_name']->nocache = null; $_smarty_tpl->tpl_vars['field_name']->scope = 0;
} else $_smarty_tpl->tpl_vars['field_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['plugin']->value['STATE'], null, 0);?>
<?php }?>
  
<?php if (!empty($_smarty_tpl->tpl_vars['plugin']->value['AUTHOR'])){?>
<?php if (!empty($_smarty_tpl->tpl_vars['plugin']->value['AUTHOR_URL'])){?>
      <?php if (isset($_smarty_tpl->tpl_vars['author'])) {$_smarty_tpl->tpl_vars['author'] = clone $_smarty_tpl->tpl_vars['author'];
$_smarty_tpl->tpl_vars['author']->value = sprintf("<a href='%s'>%s</a>",$_smarty_tpl->tpl_vars['plugin']->value['AUTHOR_URL'],$_smarty_tpl->tpl_vars['plugin']->value['AUTHOR']); $_smarty_tpl->tpl_vars['author']->nocache = null; $_smarty_tpl->tpl_vars['author']->scope = 0;
} else $_smarty_tpl->tpl_vars['author'] = new Smarty_variable(sprintf("<a href='%s'>%s</a>",$_smarty_tpl->tpl_vars['plugin']->value['AUTHOR_URL'],$_smarty_tpl->tpl_vars['plugin']->value['AUTHOR']), null, 0);?>
<?php }else{ ?>
      <?php if (isset($_smarty_tpl->tpl_vars['author'])) {$_smarty_tpl->tpl_vars['author'] = clone $_smarty_tpl->tpl_vars['author'];
$_smarty_tpl->tpl_vars['author']->value = (('<u>').($_smarty_tpl->tpl_vars['plugin']->value['AUTHOR'])).('</u>'); $_smarty_tpl->tpl_vars['author']->nocache = null; $_smarty_tpl->tpl_vars['author']->scope = 0;
} else $_smarty_tpl->tpl_vars['author'] = new Smarty_variable((('<u>').($_smarty_tpl->tpl_vars['plugin']->value['AUTHOR'])).('</u>'), null, 0);?>
<?php }?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['show_details']->value){?>
    <div id="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['ID'];?>
" class="pluginBox <?php echo $_smarty_tpl->tpl_vars['plugin']->value['STATE'];?>
">
      <table>
        <tr>
          <td class="pluginBoxNameCell">
            <?php echo $_smarty_tpl->tpl_vars['plugin']->value['NAME'];?>

          </td>
          <td><?php echo $_smarty_tpl->tpl_vars['plugin']->value['DESC'];?>
</td>
        </tr>
        <tr class="pluginActions">
          <td>
<?php if ($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='active'){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=deactivate"><?php echo l10n('Deactivate');?>
</a>
            | <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=restore" class="plugin-restore" title="<?php echo l10n('Restore default configuration. You will lose your plugin settings!');?>
" onclick="return confirm(confirmMsg);"><?php echo l10n('Restore');?>
</a>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='inactive'){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=activate" class="activate"><?php echo l10n('Activate');?>
</a>
            | <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=delete" onclick="return confirm(confirmMsg);"><?php echo l10n('Delete');?>
</a>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='missing'){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=uninstall" onclick="return confirm(confirmMsg);"><?php echo l10n('Uninstall');?>
</a>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='merged'){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=delete"><?php echo l10n('Delete');?>
</a>
<?php }?>
          </td>
          <td>
            <?php echo l10n('Version');?>
 <?php echo $_smarty_tpl->tpl_vars['plugin']->value['VERSION'];?>

            
<?php if (!empty($_smarty_tpl->tpl_vars['author']->value)){?>
            | <?php echo l10n('By %s',$_smarty_tpl->tpl_vars['author']->value);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'])){?>
            | <a class="externalLink" href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'];?>
"><?php echo l10n('Visit plugin site');?>
</a>
<?php }?>
          </td>
        </tr>
      </table>
    </div> 
    
<?php }else{ ?>
<?php if (!empty($_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'])){?>
      <?php if (isset($_smarty_tpl->tpl_vars['version'])) {$_smarty_tpl->tpl_vars['version'] = clone $_smarty_tpl->tpl_vars['version'];
$_smarty_tpl->tpl_vars['version']->value = (((("<a class='externalLink' href='").($_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'])).("'>")).($_smarty_tpl->tpl_vars['plugin']->value['VERSION'])).("</a>"); $_smarty_tpl->tpl_vars['version']->nocache = null; $_smarty_tpl->tpl_vars['version']->scope = 0;
} else $_smarty_tpl->tpl_vars['version'] = new Smarty_variable((((("<a class='externalLink' href='").($_smarty_tpl->tpl_vars['plugin']->value['VISIT_URL'])).("'>")).($_smarty_tpl->tpl_vars['plugin']->value['VERSION'])).("</a>"), null, 0);?>
<?php }else{ ?>
      <?php if (isset($_smarty_tpl->tpl_vars['version'])) {$_smarty_tpl->tpl_vars['version'] = clone $_smarty_tpl->tpl_vars['version'];
$_smarty_tpl->tpl_vars['version']->value = $_smarty_tpl->tpl_vars['plugin']->value['VERSION']; $_smarty_tpl->tpl_vars['version']->nocache = null; $_smarty_tpl->tpl_vars['version']->scope = 0;
} else $_smarty_tpl->tpl_vars['version'] = new Smarty_variable($_smarty_tpl->tpl_vars['plugin']->value['VERSION'], null, 0);?>
<?php }?>
    <div id="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['ID'];?>
" class="pluginMiniBox <?php echo $_smarty_tpl->tpl_vars['plugin']->value['STATE'];?>
">
      <div class="pluginMiniBoxNameCell">
        <?php echo $_smarty_tpl->tpl_vars['plugin']->value['NAME'];?>

        <a class="icon-info-circled-1 showInfo" title="<?php if (!empty($_smarty_tpl->tpl_vars['author']->value)){?><?php echo l10n('By %s',$_smarty_tpl->tpl_vars['author']->value);?>
 | <?php }?><?php echo l10n('Version');?>
 <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
<br/><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['plugin']->value['DESC'], ENT_QUOTES, 'UTF-8', true);?>
"></a>
      </div>
      <div class="pluginActions">
        <div>
<?php if ($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='active'){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=deactivate"><?php echo l10n('Deactivate');?>
</a>
          | <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=restore" class="plugin-restore" title="<?php echo l10n('Restore default configuration. You will lose your plugin settings!');?>
" onclick="return confirm(confirmMsg);"><?php echo l10n('Restore');?>
</a>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='inactive'){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=activate" class="activate"><?php echo l10n('Activate');?>
</a>
          | <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=delete" onclick="return confirm(confirmMsg);"><?php echo l10n('Delete');?>
</a>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='missing'){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=uninstall" onclick="return confirm(confirmMsg);"><?php echo l10n('Uninstall');?>
</a>

<?php }elseif($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='merged'){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['plugin']->value['U_ACTION'];?>
&amp;action=delete"><?php echo l10n('Delete');?>
</a>
<?php }?>
        </div>
      </div>
    </div> 
    
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['plugin']->value['STATE']=='active'){?>
  <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['active_plugins']->value==$_smarty_tpl->tpl_vars['i']->value){?>
    <div class="deactivate_all"><a><?php echo l10n('Deactivate all');?>
</a></div>
    <?php echo smarty_function_counter(array(),$_smarty_tpl);?>

<?php }?>
<?php }?>
  
<?php } ?>
  </fieldset>

<?php }?>
<?php }} ?>