<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_html5mediakit_domain_model_media');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'mediarenderer',
	'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:tt_content.CType.I.html5mediakit_mediarenderer'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'tx_html5mediakit_domain_model_media', 'EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_csh_media.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'HTML5 Media Kit');

\TYPO3\CMS\Backend\Sprite\SpriteManager::addSingleIcons(array('extension-icon' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'), $_EXTKEY);