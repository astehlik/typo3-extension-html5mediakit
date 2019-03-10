<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Html5mediakit',
    'mediarenderer',
    ['Media' => 'renderMedia'],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Sto.Html5mediakit',
    'mediarenderer_relatedtable',
    ['Media' => 'renderMediaForRelatedTable'],
    []
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT:'
    . ' source="FILE: EXT:html5mediakit/Configuration/TSconfig/Page/mod.wizards.newContentElement.pagets">'
);

if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('rtehtmlarea')) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE: EXT:html5mediakit/Configuration/TSconfig/Page/RTE.rtehtmlarea.pagets">'
    );
}
