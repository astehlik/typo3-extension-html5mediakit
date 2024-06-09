<?php

/** @var string $_EXTKEY */
$EM_CONF[$_EXTKEY] = [
    'title' => 'HTML5 media kit',
    'description' => 'Allows easy embedding of HTML5 video and audio elements.',
    'category' => 'fe',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Alexander Stehlik',
    'author_email' => 'alexander.stehlik.deleteme@gmail.com',
    'author_company' => '',
    'version' => '12.1.1',
    'constraints' => [
        'depends' => [
            'typo3' => '13.1.0-13.1.99',
            'extbase' => '',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
