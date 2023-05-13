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
    'version' => '11.0.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'extbase' => '',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
