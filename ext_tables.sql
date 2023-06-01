#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_html5mediakit_media int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_html5mediakit_domain_model_mediacontentelement'
#
CREATE TABLE tx_html5mediakit_domain_model_media (
	content_element int(11) unsigned DEFAULT '0' NOT NULL,
	parent_record int(11) unsigned DEFAULT '0' NOT NULL,
	parent_table varchar(255) DEFAULT '' NOT NULL,

	type varchar(100) DEFAULT '' NOT NULL,
	subtitle tinyint(3) unsigned DEFAULT '0' NOT NULL,
	caption varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	mp3 tinyint(3) unsigned DEFAULT '0' NOT NULL,
	ogg tinyint(3) unsigned DEFAULT '0' NOT NULL,
	h264 tinyint(3) unsigned DEFAULT '0' NOT NULL,
	ogv tinyint(3) unsigned DEFAULT '0' NOT NULL,
	poster tinyint(3) unsigned DEFAULT '0' NOT NULL,
	web_m tinyint(3) unsigned DEFAULT '0' NOT NULL
);
