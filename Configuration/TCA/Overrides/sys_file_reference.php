<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$lllPrefix = 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:sys_file_reference.';

$additionalColumns = [
    'tx_html5mediakit_track_kind' => [
        'label' => $lllPrefix . 'tx_html5mediakit_track_kind',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                [
                    'label' => $lllPrefix . 'tx_html5mediakit_track_kind.I.subtitles',
                    'value' => 'subtitles',
                ],
                [
                    'label' => $lllPrefix . 'tx_html5mediakit_track_kind.I.captions',
                    'value' => 'captions',
                ],
                [
                    'label' => $lllPrefix . 'tx_html5mediakit_track_kind.I.descriptions',
                    'value' => 'descriptions',
                ],
                [
                    'label' => $lllPrefix . 'tx_html5mediakit_track_kind.I.chapters',
                    'value' => 'chapters',
                ],
                [
                    'label' => $lllPrefix . 'tx_html5mediakit_track_kind.I.metadata',
                    'value' => 'metadata',
                ],
            ],
            'default' => 'subtitles',
        ],
    ],
    'tx_html5mediakit_track_label' => [
        'label' => $lllPrefix . 'tx_html5mediakit_track_label',
        'description' => $lllPrefix . 'tx_html5mediakit_track_label.description',
        'config' => [
            'type' => 'input',
            'eval' => 'trim',
            'size' => 10,
        ],
    ],
    'tx_html5mediakit_track_srclang' => [
        'label' => $lllPrefix . 'tx_html5mediakit_track_srclang',
        'description' => $lllPrefix . 'tx_html5mediakit_track_srclang.description',
        'config' => [
            'type' => 'input',
            'eval' => 'trim,alpha,nospace,lower',
            'min' => 2,
            'max' => 2,
            'size' => 10,
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns(
    'sys_file_reference',
    $additionalColumns,
);
