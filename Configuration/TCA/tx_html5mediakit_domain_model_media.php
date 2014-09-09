<?php

$languagePrefix = 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_html5mediakit_domain_model_media.';

$customFileTcaFieldSettings = array(
	'appearance' => array(
		'createNewRelationLinkTitle' => $languagePrefix . 'choose_file',
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
		'title' => $languagePrefix . 'tx_html5mediakit_domain_model_media',
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
			'label' => $languagePrefixColumn . 'type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array(
						$languagePrefixColumn . 'type.I.video',
						'video'
					),
					array(
						$languagePrefixColumn . 'type.I.audio',
						'audio'
					),
				),
				'default' => 'video',
				'size' => 1,
				'maxitems' => 1,
			)
		),
		'caption' => array(
			'label' => $languagePrefixColumn . 'caption',
			'config' => array(
				'type' => 'input',
			)
		),
		'description' => array(
			'label' => $languagePrefixColumn . 'description',
			'config' => array(
				'type' => 'text',
				'rows' => 5,
				'cols' => 30
			),
			'defaultExtras' => 'richtext[]:rte_transform[mode=ts_css]'
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		'l10n_parent' => array(
			'config' => array(
				'type' => 'passthrough'
			)
		),
		'mp3' => array(
			'label' => $languagePrefixColumn . 'mp3',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
					'mp3',
					array_merge(
						$customFileTcaFieldSettings,
						array( //'minitems' => 1
						)
					),
					'mp3'
				),
		),
		'ogg' => array(
			'label' => $languagePrefixColumn . 'ogg',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
					'ogg',
					$customFileTcaFieldSettings,
					'ogg'
				),
		),
		'h264' => array(
			'label' => $languagePrefixColumn . 'h264',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
					'h264',
					array_merge(
						$customFileTcaFieldSettings,
						array(//'minitems' => 1
						)
					),
					'mp4'
				),
		),
		'ogv' => array(
			'label' => $languagePrefixColumn . 'ogv',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
					'ogv',
					$customFileTcaFieldSettings,
					'ogv'
				),
		),
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array(
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1
					),
					array(
						'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
						0
					)
				)
			)
		),
		'web_m' => array(
			'label' => $languagePrefixColumn . 'web_m',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
					'web_m',
					$customFileTcaFieldSettings,
					'webm'
				),
		),
		'content_element' => array(
			'config' => array(
				'type' => 'passthrough'
			),
		),
		'tstamp' => array(
			'config' => array(
				'type' => 'passthrough'
			),
		),
	),
	'types' => array(
		'0' => array(
			'showitem' => 'type,--palette--;;hiddenFields',
		),
		'video' => array(
			'showitem' => 'type, h264, web_m, ogv, --palette--;' . $languagePrefixColumn . 'palette.metadata;metadata,--palette--;;hiddenFields'
		),
		'audio' => array(
			'showitem' => 'type, mp3, ogg, --palette--;' . $languagePrefixColumn . 'palette.metadata;metadata,--palette--;;hiddenFields'
		),
	),
	'palettes' => array(
		'metadata' => array(
			'showitem' => 'caption, --linebreak--, description',
			'canNotCollapse' => 1
		),
		'hiddenFields' => array(
			'showitem' => 'sys_language_uid, l10n_parent',
			'isHiddenPalette' => TRUE
		)
	),
);