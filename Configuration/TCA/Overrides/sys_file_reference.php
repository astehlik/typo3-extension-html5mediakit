<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ArrayUtility;

$languagePrefix = 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'sys_file_reference.';

// $columns = [
//     'language' => [
//         'label' => $languagePrefixColumn . 'language',
//         'config' => [
//             'type' => 'input',
//         ],
//     ],
// ];

// ArrayUtility::mergeRecursiveWithOverrule($GLOBALS['TCA']['sys_file_reference'], [
//     'columns' => [
//         'language' => [
//             'label' => $languagePrefixColumn . 'language',
//             'config' => [
//                 'type' => 'input',
//             ],
//         ],
//     ],
// ]);

$GLOBALS['TCA']['sys_file_reference']['columns']['language'] = [
    'label' => $languagePrefixColumn . 'language',
    'config' => [
        'type' => 'input',
        'eval' => 'int',
    ],
];
