<?php

/** @noinspection PhpFullyQualifiedNameUsageInspection */

defined('TYPO3') or die();

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

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rte_ckeditor')) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['tx_html5mediakit_description'] =
        'EXT:html5mediakit/Configuration/RTE/Description.yaml';
}
