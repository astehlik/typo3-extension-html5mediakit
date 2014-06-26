<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$columns = array(
	'tx_html5mediakit_media' => array(
		'label' => 'Mediendatei',
		'config' => array(
			'type' => 'inline',
			'allowed' => 'tx_html5mediakit_domain_model_media',
			'foreign_table' => 'tx_html5mediakit_domain_model_media',
			'foreign_field' => 'content_element',
			'minitems' => 1,
			'maxitems' => 1,
			'appearance' => array(
				'showSynchronizationLink' => 1,
				'showAllLocalizationLink' => 1,
				'showPossibleLocalizationRecords' => 1,
				'showRemovedLocalizationRecords' => 1,
			),
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $columns);

$GLOBALS['TCA']['tt_content']['types']['html5mediakit_mediarenderer']['showitem'] = '
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,
		tx_html5mediakit_media,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended';

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['html5mediakit_mediarenderer'] = 'extensions-html5mediakit-extension-icon';