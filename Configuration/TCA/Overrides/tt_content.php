<?php
declare(strict_types=1);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Html5mediakit',
    'mediarenderer',
    'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:tt_content.CType.I.html5mediakit_mediarenderer',
    'mimetypes-x-content-multimedia'
);

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['html5mediakit_mediarenderer'] =
    'mimetypes-x-content-multimedia';

$columns = [
    'tx_html5mediakit_media' => [
        'label' => 'Mediendatei',
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
                'showRemovedLocalizationRecords' => 1,
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $columns);

$GLOBALS['TCA']['tt_content']['types']['html5mediakit_mediarenderer']['showitem'] = '
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,
        tx_html5mediakit_media,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
        layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:layout_formlabel,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
        --palette--;;language,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
        --palette--;;hidden,
        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
        categories,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        rowDescription,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended';


