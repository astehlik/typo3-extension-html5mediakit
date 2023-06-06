<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$additionalColumns = [
    'tx_html5mediakit_track_srclang' => [
        'label' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:tx_html5mediakit_track_srclang',
        'description' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db:tx_html5mediakit_track_srclang.description',
        'config' => [
            'type' => 'input',
            'eval' => 'trim,required,alpha,nospace,lower,2',
            'size' => 10,
            'default' => 'en'
        ],
        'displayCond' => [
            'AND' => [
                'FIELD:tablenames:=:tx_html5mediakit_domain_model_media',
                'FIELD:fieldname:=:tracks'
            ],
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns(
    'sys_file_reference',
    $additionalColumns
);

ExtensionManagementUtility::addToAllTCAtypes(
    'sys_file_reference',
    'tx_html5mediakit_track_srclang',
    '',
    'after:title'
);