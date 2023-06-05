<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$additionalColumns = [
    'language' => [
        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
        'description' => 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_csh_media.xlf:language.description',
        'config' => [
            'type' => 'input',
            'eval' => 'trim,required,alpha,nospace,lower,2'
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns(
    'sys_file_reference',
    $additionalColumns
);

ExtensionManagementUtility::addToAllTCAtypes(
    'sys_file_reference',
    'language',
    '',
    'after:title'
);
