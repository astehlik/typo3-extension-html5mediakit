<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_html5mediakit_domain_model_media');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'mediarenderer',
	'HTML5 media'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_html5mediakit_domain_model_media', 'EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_csh_media.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'HTML5 Media Kit');

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
				'collapseAll' => FALSE
			),
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $columns);

$GLOBALS['TCA']['tt_content']['types'][$_EXTKEY . '_mediarenderer']['showitem'] = '
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,
		tx_html5mediakit_media,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.appearance,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.frames;frames,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.visibility;visibility,
		--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.access;access,
	--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.extended';