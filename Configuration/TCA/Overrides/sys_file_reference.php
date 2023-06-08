<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$displayCondition = [
    'AND' => [
        'FIELD:tablenames:=:tx_html5mediakit_domain_model_media',
        'FIELD:fieldname:=:tracks',
    ],
];

$additionalColumns = [
    'tx_html5mediakit_track_kind' => [
        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:tx_html5mediakit_track_kind',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                [
                        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:sys_file_reference.tx_html5mediakit_track_kind.I.subtitles',
                        'value' => 'subtitles',
                ],
                [
                        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:sys_file_reference.tx_html5mediakit_track_kind.I.captions',
                        'value' => 'captions',
                ],
                [
                        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:sys_file_reference.tx_html5mediakit_track_kind.I.descriptions',
                        'value' => 'descriptions',
                ],
                [
                        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:sys_file_reference.tx_html5mediakit_track_kind.I.chapters',
                        'value' => 'chapters',
                ],
                [
                        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:sys_file_reference.tx_html5mediakit_track_kind.I.metadata',
                        'value' => 'metadata',
                ],
            ],
            'default' => 'subtitles',
        ],
        'displayCond' => $displayCondition,
    ],
    'tx_html5mediakit_track_label' => [
        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:tx_html5mediakit_track_label',
        'config' => [
            'type' => 'input',
            'eval' => 'trim',
            'size' => 10,
        ],
        'displayCond' => $displayCondition,
    ],
    'tx_html5mediakit_track_srclang' => [
        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:tx_html5mediakit_track_srclang',
        'description' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:tx_html5mediakit_track_srclang.description',
        'config' => [
            'type' => 'input',
            'eval' => 'trim,alpha,nospace,lower',
            'min' => 2,
            'max' => 2,
            'size' => 10,
        ],
        'displayCond' => $displayCondition,
    ],
];

ExtensionManagementUtility::addTCAcolumns(
    'sys_file_reference',
    $additionalColumns
);

ExtensionManagementUtility::addToAllTCAtypes(
    'sys_file_reference',
    'tx_html5mediakit_track_kind, tx_html5mediakit_track_label, tx_html5mediakit_track_srclang',
    '',
    'after:title',
);
