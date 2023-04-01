DROP TABLE IF EXISTS `tbl_rooms`;
CREATE TABLE `tbl_rooms` (
    `room_id` int(8) unsigned NOT NULL auto_increment,
    `room_price` varchar(180) NOT NULL default '',
    `room_status` varchar(180) NOT NULL default '',
    PRIMARY KEY (`room_id`)

) ENGINE=MyISAM AUTO_INCREMENT=10000001;