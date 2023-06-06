DROP TABLE IF EXISTS `tbl_rooms`;
CREATE TABLE `tbl_rooms` (

    `room_id` int(8) unsigned NOT NULL,
    `room_price` varchar(180) NOT NULL default '',
    `room_status` varchar(180) NOT NULL default '',
    `room_vacancy` varchar(180) NOT NULL default

) ENGINE=MyISAM AUTO_INCREMENT=10000001;