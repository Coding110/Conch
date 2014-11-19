<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 11:31:02
         compiled from "./admin/themes/default/template/intro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8461222675466c8f63a9334-86692837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8b78accf8593165c94ad9c1ace723dbcea385be' => 
    array (
      0 => './admin/themes/default/template/intro.tpl',
      1 => 1382474908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8461222675466c8f63a9334-86692837',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PHPWG_URL' => 0,
    'PWG_VERSION' => 0,
    'U_CHECK_UPGRADE' => 0,
    'SUBSCRIBE_BASE_URL' => 0,
    'EMAIL' => 0,
    'OS' => 0,
    'PHP_VERSION' => 0,
    'U_PHPINFO' => 0,
    'PHP_DATATIME' => 0,
    'DB_ENGINE' => 0,
    'DB_VERSION' => 0,
    'DB_DATATIME' => 0,
    'GRAPHICS_LIBRARY' => 0,
    'DB_ELEMENTS' => 0,
    'first_added' => 0,
    'DB_CATEGORIES' => 0,
    'DB_IMAGE_CATEGORY' => 0,
    'DB_TAGS' => 0,
    'DB_IMAGE_TAG' => 0,
    'DB_USERS' => 0,
    'DB_GROUPS' => 0,
    'DB_COMMENTS' => 0,
    'NB_PENDING_COMMENTS' => 0,
    'U_COMMENTS' => 0,
    'DB_RATES' => 0,
    'ENABLE_SYNCHRONIZATION' => 0,
    'U_CAT_UPDATE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5466c8f642ec79_87116923',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466c8f642ec79_87116923')) {function content_5466c8f642ec79_87116923($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['combine_script'][0][0]->func_combine_script(array('id'=>'jquery.cluetip','load'=>'async','require'=>'jquery','path'=>'themes/default/js/plugins/jquery.cluetip.js'),$_smarty_tpl);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array('require'=>'jquery.cluetip')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.cluetip'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

var piwigo_need_update_msg = '<a href="admin.php?page=updates"><?php echo strtr(l10n('A new version of Piwigo is available.'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
</a>';
var ext_need_update_msg = '<a href="admin.php?page=updates&amp;tab=ext"><?php echo strtr(l10n('Some upgrades are available for extensions.'), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
</a>';


jQuery().ready(function(){
	jQuery('.cluetip').cluetip({
		width: 300,
		splitTitle: '|',
		positionBy: 'bottomTop'
	});
  jQuery.ajax({
    type: 'GET',
    url: 'ws.php',
    dataType: 'json',
    data: { method: 'pwg.extensions.checkUpdates', format: 'json' },
    timeout: 5000,
    success: function (data) {
      if (data['stat'] != 'ok')
        return;
      piwigo_update = data['result']['piwigo_need_update'];
      ext_update = data['result']['ext_need_update']
      if ((piwigo_update || ext_update) && !jQuery(".warnings").is('div'))
        jQuery("#content").prepend('<div class="warnings"><ul></ul></div>');
      if (piwigo_update)
        jQuery(".warnings ul").append('<li>'+piwigo_need_update_msg+'</li>');
      if (ext_update)
        jQuery(".warnings ul").append('<li>'+ext_need_update_msg+'</li>');
    }
  });
});

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array('require'=>'jquery.cluetip'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<h2><?php echo l10n('Piwigo Administration');?>
</h2>
<dl style="padding-top: 30px;">
  <dt><?php echo l10n('Piwigo version');?>
</dt>
  <dd>
    <ul>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['PHPWG_URL']->value;?>
" class="externalLink">Piwigo</a> <?php echo $_smarty_tpl->tpl_vars['PWG_VERSION']->value;?>
</li>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['U_CHECK_UPGRADE']->value;?>
"><?php echo l10n('Check for upgrade');?>
</a></li>
<?php if (isset($_smarty_tpl->tpl_vars['SUBSCRIBE_BASE_URL']->value)){?>
      <li><a href="<?php echo $_smarty_tpl->tpl_vars['SUBSCRIBE_BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['EMAIL']->value;?>
" class="externalLink cluetip" title="<?php echo l10n('Piwigo Announcements Newsletter');?>
|<?php echo nl2br(htmlspecialchars(l10n('Keep in touch with Piwigo project, subscribe to Piwigo Announcement Newsletter. You will receive emails when a new release is available (sometimes including a security bug fix, it\'s important to know and upgrade) and when major events happen to the project. Only a few emails a year.')));?>
"><?php echo l10n('Subscribe %s to Piwigo Announcements Newsletter',$_smarty_tpl->tpl_vars['EMAIL']->value);?>
</a></li>
<?php }?>
    </ul>
  </dd>

  <dt><?php echo l10n('Environment');?>
</dt>
  <dd>
    <ul>
      <li><?php echo l10n('Operating system');?>
: <?php echo $_smarty_tpl->tpl_vars['OS']->value;?>
</li>
      <li>PHP: <?php echo $_smarty_tpl->tpl_vars['PHP_VERSION']->value;?>
 (<a href="<?php echo $_smarty_tpl->tpl_vars['U_PHPINFO']->value;?>
" class="externalLink"><?php echo l10n('Show info');?>
</a>)  [<?php echo $_smarty_tpl->tpl_vars['PHP_DATATIME']->value;?>
]</li>
      <li><?php echo $_smarty_tpl->tpl_vars['DB_ENGINE']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['DB_VERSION']->value;?>
 [<?php echo $_smarty_tpl->tpl_vars['DB_DATATIME']->value;?>
]</li>
<?php if (isset($_smarty_tpl->tpl_vars['GRAPHICS_LIBRARY']->value)){?>
      <li><?php echo l10n('Graphics Library');?>
: <?php echo $_smarty_tpl->tpl_vars['GRAPHICS_LIBRARY']->value;?>
</li>
<?php }?>
    </ul>
  </dd>

  <dt><?php echo l10n('Database');?>
</dt>
  <dd>
    <ul>
      <li>
        <?php echo $_smarty_tpl->tpl_vars['DB_ELEMENTS']->value;?>

<?php if (isset($_smarty_tpl->tpl_vars['first_added']->value)){?>
        (<?php echo $_smarty_tpl->tpl_vars['first_added']->value['DB_DATE'];?>
)
<?php }?>
      </li>
      <li><?php echo $_smarty_tpl->tpl_vars['DB_CATEGORIES']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['DB_IMAGE_CATEGORY']->value;?>
)</li>
      <li><?php echo $_smarty_tpl->tpl_vars['DB_TAGS']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['DB_IMAGE_TAG']->value;?>
)</li>
      <li><?php echo $_smarty_tpl->tpl_vars['DB_USERS']->value;?>
</li>
      <li><?php echo $_smarty_tpl->tpl_vars['DB_GROUPS']->value;?>
</li>
<?php if (isset($_smarty_tpl->tpl_vars['DB_COMMENTS']->value)){?>
      <li>
        <?php echo $_smarty_tpl->tpl_vars['DB_COMMENTS']->value;?>
<?php if ($_smarty_tpl->tpl_vars['NB_PENDING_COMMENTS']->value>0){?> (<a href="<?php echo $_smarty_tpl->tpl_vars['U_COMMENTS']->value;?>
"><?php echo l10n('%d waiting for validation',$_smarty_tpl->tpl_vars['NB_PENDING_COMMENTS']->value);?>
</a>)<?php }?>
      </li>
<?php }?>
			<li><?php echo $_smarty_tpl->tpl_vars['DB_RATES']->value;?>
</li>
    </ul>
  </dd>
</dl>

<?php if ($_smarty_tpl->tpl_vars['ENABLE_SYNCHRONIZATION']->value){?>
<form name="QuickSynchro" action="<?php echo $_smarty_tpl->tpl_vars['U_CAT_UPDATE']->value;?>
" method="post" id="QuickSynchro" style="display: block; text-align:right;">
<div>
<input type="hidden" name="sync" value="files" checked="checked">
<input type="hidden" name="display_info" value="1" checked="checked">
<input type="hidden" name="add_to_caddie" value="1" checked="checked">
<input type="hidden" name="privacy_level" value="0" checked="checked">
<input type="hidden" name="sync_meta" checked="checked">
<input type="hidden" name="simulate" value="0">
<input type="hidden" name="subcats-included" value="1" checked="checked">
</div>
<div class="bigbutton">
<span class="bigtext"><?php echo l10n('Quick Local Synchronization');?>
</span>
<input type="submit" value="<?php echo l10n('Quick Local Synchronization');?>
" name="submit">
</div>
</form>
<?php }?><?php }} ?>