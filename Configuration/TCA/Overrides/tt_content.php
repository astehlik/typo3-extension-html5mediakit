<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

$languagePrefix = 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tt_content.';

ExtensionUtility::registerPlugin(
    'Html5mediakit',
    'mediarenderer',
    $languagePrefix . 'tt_content.CType.I.html5mediakit_mediarenderer',
    'mimetypes-x-content-multimedia',
    group: 'default',
    pluginDescription: $languagePrefix . 'new_content_element_wizard_html5mediakitmediarenderer_description',
);

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['html5mediakit_mediarenderer'] =
    'mimetypes-x-content-multimedia';

$columns = [
    'tx_html5mediakit_media' => [
        'label' => $languagePrefixColumn . 'tx_html5mediakit_media',
        'config' => [
            'type' => 'inline',
            'allowed' => 'tx_html5mediakit_domain_model_media',
            'foreign_table' => 'tx_html5mediakit_domain_model_media',
            'foreign_field' => 'content_element',
            'minitems' => 1,
            'maxitems' => 1,
            'appearance' => [
                'showSynchronizationLink' => 1,
                'showAllLocalizationLink' => 1,
                'showPossibleLocalizationRecords' => 1,
            ],
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('tt_content', $columns);

$GLOBALS['TCA']['tt_content']['types']['html5mediakit_mediarenderer']['showitem'] = '
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
        tx_html5mediakit_media,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
        --palette--;;language,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
        --palette--;;hidden,
        --palette--;;access,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
        categories,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        rowDescription,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
';
