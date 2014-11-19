<?php /* Smarty version Smarty-3.1.13, created on 2014-11-17 09:15:39
         compiled from "./admin/themes/default/template/photos_add_applications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164950330254694c3bae4fa4-44695055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a01c2e16f229a0a27fbaa5c495a9a969d489ffa' => 
    array (
      0 => './admin/themes/default/template/photos_add_applications.tpl',
      1 => 1337636681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164950330254694c3bae4fa4-44695055',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TABSHEET_TITLE' => 0,
    'URL_DOWNLOAD_WINDOWS' => 0,
    'URL_DOWNLOAD_MAC' => 0,
    'URL_DOWNLOAD_LINUX' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54694c3bcb3b37_89398395',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54694c3bcb3b37_89398395')) {function content_54694c3bcb3b37_89398395($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('include/colorbox.inc.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('footer_script', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

jQuery().ready(function(){
  jQuery(".illustration a").colorbox({rel:'group1'});
});
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['footer_script'][0][0]->block_footer_script(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php $_smarty_tpl->smarty->_tag_stack[] = array('html_head', array()); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<style type="text/css">
.illustration {float:left; margin-right:10px;}
fieldset p {text-align:left;margin-top:0}
</style>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['html_head'][0][0]->block_html_head(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="titrePage">
  <h2><?php echo l10n('Upload Photos');?>
 <?php echo $_smarty_tpl->tpl_vars['TABSHEET_TITLE']->value;?>
</h2>
</div>

<fieldset>
  <legend>pLoader</legend>

<div class="illustration"><a href="http://piwigo.org/screenshots/applications/ploader.png" title="pLoader"><img src="http://piwigo.org/screenshots/applications/thumbnail/ploader.jpg"></a></div>
<p><?php echo l10n('pLoader stands for <em>Piwigo Uploader</em>. From your computer, pLoader prepares your photos and transfer them to your Piwigo photo gallery.');?>
</p>

<p><?php echo l10n('Available versions for');?>

<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DOWNLOAD_WINDOWS']->value;?>
">Windows</a>,
<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DOWNLOAD_MAC']->value;?>
">Mac</a>,
<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DOWNLOAD_LINUX']->value;?>
">Linux</a>
</p>

</fieldset>

<fieldset>
  <legend><?php echo l10n('Piwigo for iOS (iPhone, iPad, iPod Touch)');?>
</legend>
<div class="illustration"><a href="http://piwigo.org/screenshots/applications/piwigo-ios.jpg" title="<?php echo l10n('Piwigo for iOS (iPhone, iPad, iPod Touch)');?>
"><img src="http://piwigo.org/screenshots/applications/thumbnail/piwigo-ios.jpg"></a></div>
<p><?php echo l10n('<em>Piwigo for iOS</em> application empowers you to connect to your Piwigo gallery from your iPhone, iPad or iPod Touch, create some albums and upload several photos at once.');?>
</p>

<p>
<?php echo l10n('Available on');?>
 <a target="_blank" href="http://itunes.apple.com/us/app/piwigo/id472225196">Apple AppStore</a>
</p>
</fieldset>

<fieldset>
  <legend><?php echo l10n('Piwigo for Android');?>
</legend>
<div class="illustration"><a href="http://piwigo.org/screenshots/applications/piwigo-android.jpg" title="<?php echo l10n('Piwigo for Android');?>
"><img src="http://piwigo.org/screenshots/applications/thumbnail/piwigo-android.jpg"></a></div>
<p><?php echo l10n('<em>Piwigo for Android</em> application empowers you to connect your Android phone or table to your Piwigo gallery, create some albums and upload several photos at once.');?>
</p>

<p>
<?php echo l10n('Available on');?>
 <a target="_blank" href="https://play.google.com/store/apps/details?id=org.piwigo">Google Play</a>
</p>
</fieldset>

<fieldset>
  <legend>Lightroom</legend>

<div class="illustration"><a href="http://piwigo.org/screenshots/applications/lightroom.png" title="<?php echo l10n('Piwigo Publish plugin for Lightroom');?>
"><img src="http://piwigo.org/screenshots/applications/thumbnail/lightroom.jpg"></a></div>
<p>
<?php echo l10n('Adobe Photoshop Lightroom is a photography software designed to manage large quantities of digital images and doing post production work.');?>

<?php echo l10n('The Piwigo publish Plug-in allows you to export and synchronize photos from Lightroom directly to your Piwigo photo gallery.');?>

</p>

<p>
<?php echo l10n('Available on');?>
 <a target="_blank" href="http://alloyphoto.com/plugins/piwigo/">alloyphoto.com</a>
</p>
</fieldset>

<fieldset>
  <legend>Shotwell</legend>

<div class="illustration"><a href="http://piwigo.org/screenshots/applications/shotwell.png" title="<?php echo l10n('Piwigo publish plugin for Shotwell');?>
"><img src="http://piwigo.org/screenshots/applications/thumbnail/shotwell.jpg"></a></div>
<p><?php echo l10n('Shotwell is an open source digital photo organizer that runs on Linux. It is the default photo manager in Ubuntu and Fedora.');?>
</p>

<p>
<?php echo l10n('On your Linux, simply install Shotwell with your package manager and the activate Piwigo publishing option.');?>

<a href="http://yorba.org/shotwell/" target="_blank"><?php echo l10n('Learn more');?>
</a>
</p>
</fieldset>

<fieldset>
  <legend>digiKam</legend>
<div class="illustration"><a href="http://piwigo.org/screenshots/applications/digikam.png" title="<?php echo l10n('Piwigo publish plugin for digiKam');?>
"><img src="http://piwigo.org/screenshots/applications/thumbnail/digikam.jpg"></a></div>
<p>
<?php echo l10n('digiKam is an advanced digital photo management free software for Linux, Windows, and MacOSX.');?>

<?php echo l10n('digiKam is designed for photographers who want to view, manage, edit, enhance, organize, tag, and share photographs.');?>

</p>

<p>
<?php echo l10n('To export your photos from digiKam to Piwigo, simply install digiKam and the Kipi-plugins.');?>

<a href="http://digikam.org/" target="_blank"><?php echo l10n('Learn more');?>
</a>
</p>
</fieldset>

<fieldset>
  <legend>iPhoto</legend>

<div class="illustration"><a href="http://piwigo.org/screenshots/applications/iphoto.jpg" title="<?php echo l10n('Piwigo export plugin for iPhoto');?>
"><img src="http://piwigo.org/screenshots/applications/thumbnail/iphoto.jpg"></a></div>
<p><?php echo l10n('iPhoto is the default photo manager on MacOSX. The Piwigo export plugin let you create new albums and export your photos directly from iPhoto to your Piwigo photo gallery.');?>
</p>

<p>
<a target="_blank" href="http://piwigo.org/ext/extension_view.php?eid=592"><?php echo l10n('Learn more');?>
</a>
</p>
</fieldset>

<fieldset>
  <legend>Aperture</legend>

<div class="illustration"><a href="http://piwigo.org/screenshots/applications/aperture.png" title="<?php echo l10n('Piwigo export plugin for Aperture');?>
"><img src="http://piwigo.org/screenshots/applications/thumbnail/aperture.jpg"></a></div>
<p>
<?php echo l10n('Aperture is a powerful tool to refine images and manage massive libraries on Mac.');?>

<?php echo l10n('Aperture is designed for professional photographers with iPhoto simplicity.');?>

<?php echo l10n('The Piwigo export plugin allows you to create albums and export photos.');?>

</p>

<p>
<a target="_blank" href="http://piwigo.org/ext/extension_view.php?eid=598"><?php echo l10n('Learn more');?>
</a>
</p>
</fieldset>

<fieldset>
  <legend>ReGalAndroid</legend>

<div class="illustration"><a href="http://piwigo.org/screenshots/applications/regalandroid.png" title="ReGalAndroid"><img src="http://piwigo.org/screenshots/applications/thumbnail/regalandroid.jpg"></a></div>
<p>
<?php echo l10n('ReGalAndroid (RemoteGallery client for Android) is an open source (GPL v3) Piwigo client for the Android platform.');?>

<?php echo l10n('Features include gallery browsing, album creation and photo upload.');?>

</p>

<p>
<?php echo l10n('Available on');?>
 <a target="_blank" href="https://play.google.com/store/apps/details?id=net.dahanne.android.regalandroid">Google Play</a>
</p>
</fieldset>
<?php }} ?>