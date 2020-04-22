<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */

defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Html5mediakit',
    'mediarenderer',
    [\Sto\Html5mediakit\Controller\MediaController::class => 'renderMedia'],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Html5mediakit',
    'mediarenderer_relatedtable',
    [\Sto\Html5mediakit\Controller\MediaController::class => 'renderMediaForRelatedTable'],
    []
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT:'
    . ' source="FILE: EXT:html5mediakit/Configuration/TSconfig/Page/mod.wizards.newContentElement.pagets">'
);

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rte_ckeditor')) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['tx_html5mediakit_description'] =
        'EXT:html5mediakit/Configuration/RTE/Description.yaml';
}

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rtehtmlarea')) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE: EXT:html5mediakit/Configuration/TSconfig/Page/RTE.rte_htmlarea.pagets">'
    );
}
