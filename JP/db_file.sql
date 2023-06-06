DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(8) unsigned NOT NULL auto_increment, 
  `user_lastname` varchar(180) NOT NULL default '',
  `user_firstname` varchar(180) NOT NULL default '',
  `user_email` varchar(180) NOT NULL default '',
  `user_password` varchar(180) NOT NULL default '',
  `user_date_added` date NOT NULL default '0000-00-00',
  `user_time_added` time NOT NULL default '00:00:00',	
  `user_date_updated` date NOT NULL default '0000-00-00',
  `user_time_updated` time NOT NULL default '00:00:00',
  `user_status` int(1) NOT NULL default '0',
  `user_token` varchar(255) NOT NULL default '',
  `user_access` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;