<?php

define('PHP_EMFS_VERSION', '0.1');
$prefixeTable = "piwigo_";

if (!defined('EMFS_FOLDERS_TABLE'))
	define('EMFS_FOLDERS_TABLE', $prefixeTable.'emfs_folders');
if (!defined('EMFS_FILES_TABLE'))
	define('EMFS_FILES_TABLE', $prefixeTable.'emfs_files');
if (!defined('EMFS_MAILS_TABLE'))
	define('EMFS_MAILS_TABLE', $prefixeTable.'emfs_mails');
if (!defined('EMFS_TASKS_TABLE'))
	define('EMFS_TASKS_TABLE', $prefixeTable.'emfs_tasks');

?>
