<?php
declare(strict_types=1);

use Sto\Html5mediakit\Domain\Model\Audio;
use Sto\Html5mediakit\Domain\Model\Media;
use Sto\Html5mediakit\Domain\Model\Video;

return [
    Media::class => [
        'subclasses' => [
            'audio' => Audio::class,
            'video' => Video::class,
        ],
    ],

    Audio::class => [
        'recordType' => 'audio',
        'tableName' => 'tx_html5mediakit_domain_model_media',
    ],
    Video::class => [
        'recordType' => 'video',
        'tableName' => 'tx_html5mediakit_domain_model_media',
    ],
];
