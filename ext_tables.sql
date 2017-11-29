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
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,

	content_element int(11) DEFAULT '0' NOT NULL,
	parent_record int(11) DEFAULT '0' NOT NULL,
	parent_table varchar(255) DEFAULT '' NOT NULL,

	type varchar(100) DEFAULT '' NOT NULL,
	caption varchar(255) DEFAULT '' NOT NULL,
	description text,
	mp3 int(11) DEFAULT '0' NOT NULL,
	ogg int(11) DEFAULT '0' NOT NULL,
	h264 int(11) DEFAULT '0' NOT NULL,
	ogv int(11) DEFAULT '0' NOT NULL,
	web_m int(11) DEFAULT '0' NOT NULL,

	l10n_diffsource mediumblob,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);
