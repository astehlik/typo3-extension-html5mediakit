<?php

$customFileTcaFieldSettings = array(
	'appearance' => array(
		'createNewRelationLinkTitle' => 'Datei auswählen',
		'useSortable' => FALSE,
		'headerThumbnail' => array(
			'field' => '',
			'width' => '0',
			'height' => '0',
		),
		'enabledControls' => array(
			'info' => FALSE,
			'new' => FALSE,
			'dragdrop' => FALSE,
			'sort' => FALSE,
			'hide' => FALSE,
			'delete' => TRUE,
			'localize' => FALSE,
		),
	),
	'foreign_types' => array(
		'0' => array(
			'showitem' => '--palette--;;filePalette'
		),
		\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
			'showitem' => '--palette--;;filePalette'
		),
		\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
			'showitem' => '--palette--;;filePalette'
		),
		\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
			'showitem' => '--palette--;;filePalette'
		)
	),
	'maxitems' => 1,
);

return array(
	'ctrl' => array(
		'label' => 'caption',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'delete' => 'deleted',
		'title' => 'Media',
		'type' => 'type',
		'iconfile' => 'tt_content_mm.gif',
		'prependAtCopy' => 'LLL:EXT:lang/locallang_general.php:LGL.prependAtCopy',
		'hideAtCopy' => TRUE,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
	),
	'interface' => array(
		'showRecordFieldList' => 'type,caption,description,mp3,ogg,h264,ogv,web_m'
	),
	'columns' => array(
		'type' => array(
			'label' => 'Typ',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('Video', 'video'),
					array('Audio', 'audio'),
				),
				'default' => 'video',
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'caption' => array(
			'label' => 'Beschriftung',
			'config' => array(
				'type' => 'input',
			)
		),
		'description' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.description',
			'config' => array(
				'type' => 'text',
				'rows' => 5,
				'cols' => 30
			)
		),
		'mp3' => array(
			'label' => 'MP3 Datei',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('mp3', $customFileTcaFieldSettings, 'mp3'),
		),
		'ogg' => array(
			'label' => 'OGG Datei',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('ogg', $customFileTcaFieldSettings, 'ogg'),
		),
		'h264' => array(
			'label' => 'h.264 Datei',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('h264', $customFileTcaFieldSettings, 'mp4'),
		),
		'ogv' => array(
			'label' => 'OGV Datei',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('ogv', $customFileTcaFieldSettings, 'ogv'),
		),
		'web_m' => array(
			'label' => 'WebM Datei',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('web_m', $customFileTcaFieldSettings, 'webm'),
		),
		'content_element' => array(
			'config' => array(
				'type' => 'passthrough'
			),
		),
	),
	'types' => array(
		'0' => array(
			'showitem' => 'type',
		),
		'video' => array(
			'showitem' => 'type, h264, web_m, ogv, --palette--;Metadaten;metadata,'
		),
		'audio' => array(
			'showitem' => 'type, mp3, ogg, --palette--;Metadaten;metadata,'
		),
	),
	'palettes' => array(
		'metadata' => array(
			'showitem' => 'caption, --linebreak--, description',
			'canNotCollapse' => 1
		),
	),
);
?>