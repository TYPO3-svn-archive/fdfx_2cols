#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_fdfx2cols_leftcolumn mediumtext NOT NULL,
	tx_fdfx2cols_type tinyint(3) unsigned DEFAULT '0' NOT NULL,
	tx_fdfx2cols_order tinyint(3) unsigned DEFAULT '0' NOT NULL,
	tx_fdfx2cols_height varchar(10) DEFAULT '100px' NOT NULL,
);