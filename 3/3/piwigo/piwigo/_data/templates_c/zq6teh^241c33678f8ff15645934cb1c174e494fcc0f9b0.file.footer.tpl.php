<?php /* Smarty version Smarty-3.1.13, created on 2014-11-15 15:44:05
         compiled from "./themes/default/template/mail/text/html/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30006003454670445603e79-87714990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '241c33678f8ff15645934cb1c174e494fcc0f9b0' => 
    array (
      0 => './themes/default/template/mail/text/html/footer.tpl',
      1 => 1383679409,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30006003454670445603e79-87714990',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'GALLERY_URL' => 0,
    'GALLERY_TITLE' => 0,
    'PHPWG_URL' => 0,
    'VERSION' => 0,
    'CONTACT_MAIL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54670445619b17_13258678',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54670445619b17_13258678')) {function content_54670445619b17_13258678($_smarty_tpl) {?>            
          </td></tr>

          <tr><td id="footer">
            

      
            <?php echo l10n('Sent by');?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['GALLERY_URL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['GALLERY_TITLE']->value;?>
</a>
            - <?php echo l10n('Powered by');?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['PHPWG_URL']->value;?>
" class="Piwigo">Piwigo</a>
            <?php if (!empty($_smarty_tpl->tpl_vars['VERSION']->value)){?><?php echo $_smarty_tpl->tpl_vars['VERSION']->value;?>
<?php }?>
            
            - <?php echo l10n('Contact');?>

            <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['CONTACT_MAIL']->value;?>
?subject=<?php echo rawurlencode(l10n('A comment on your site'));?>
"><?php echo l10n('Webmaster');?>
</a>
            
          </td></tr>
        </table>

      </td></tr>
    </table>
  </body>
</html><?php }} ?>