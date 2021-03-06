
--
--	Tables structure of Becktu
--


--
-- Table structure for table `piwigo_emfs_folders`
--

--DROP TABLE IF EXISTS `piwigo_emfs_folders`;
--CREATE TABLE `piwigo_emfs_folders` (
--	`id` int(11) NOT NULL AUTO_INCREMENT,
--	--  封面
--	`cover` varchar(255), 
--	`mailfolder` varchar(255) NOT NULL,
--	-- same as 'category_id'
--	`aliasfolder` varchar(255),
--	`mailid` int(11) NOT NULL,
--	`shareable` int(11),
--	`createtime` datetime,
--	PRIMARY KEY  (`id`)
--) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table `piwigo_emfs_files`
--

DROP TABLE IF EXISTS `piwigo_emfs_files`;
CREATE TABLE `piwigo_emfs_files` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	-- same as 'image_id'
	`fid` mediumint(8) unsigned NOT NULL,
	-- emfs_folders' id
	--`folderid` int(11) NOT NULL, 
	`mailfolder` varchar(255) NOT NULL,
	`mailuids` varchar(255),
	`mailuid_preview` varchar(128),
	`mailuid_net` varchar(128),
	-- file status: 0 - No file, 1 - file is fine, 2 - file is not ready (e.g. uploading), 3 - file error
	`status` int(4),
	`shareable` int(11),
	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Table structure for table `piwigo_emfs_mails`
--

DROP TABLE IF EXISTS `piwigo_emfs_mails`;
CREATE TABLE `piwigo_emfs_mails` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	-- same as 'user_id'
	`uid` smallint(5) unsigned NOT NULL, 
	`email` varchar(128),
	`passwd` text,
	`imapserver` varchar(255),
	`imapport` int(11),
	PRIMARY KEY  (`id`),
	UNIQUE KEY `email_ui1` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Table structure for table `piwigo_emfs_task`
--

DROP TABLE IF EXISTS `piwigo_emfs_tasks`;
CREATE TABLE `piwigo_emfs_tasks` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	-- same as 'user_id'
	`uid` smallint(5) unsigned NOT NULL, 
	-- same as 'image_id'
	`fid` mediumint(8) unsigned NOT NULL,
	-- same as 'cat_id'
	`catid` smallint(5) unsigned NOT NULL, 
	-- aorignal image file path
	`orig_file` varchar(255),
	-- network image file path
	`net_file` varchar(255),
	-- thumbnail image file path
	`th_file` varchar(255),
	`add_time` datetime,
	`exec_time` datetime,
	`status` int(11), -- 0 - not upload, 1 - uploading, 2 - uploaded, 3 - error
	--`username` varchar(128),
	`owner` varchar(128),
	`orig_filename` varchar(255),
	PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

