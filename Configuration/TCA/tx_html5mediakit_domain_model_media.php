<?php

declare(strict_types=1);

use Sto\Html5mediakit\Domain\Model\Enumeration\MediaType;
use TYPO3\CMS\Core\Resource\AbstractFile;

$languagePrefix = 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_html5mediakit_domain_model_media.';
$languagePrefixCsh = 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_csh_media.xlf:';
$lllAddImageFileReference = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference';

$buildFileFieldConfig = function (
    string|array $allowedFileTypes,
    int $maxitems = 1,
    string $showitem = '',
    string $createNewRelationLinkTitle = '',
) use (
    $languagePrefix
) {
    $showitem .= ',--palette--;;filePalette';
    $showitem = ltrim($showitem, ',');
    $allowsMultipleFiles = $maxitems === 0 || $maxitems > 1;

    if ($createNewRelationLinkTitle === '') {
        $createNewRelationLinkTitle = $languagePrefix . 'choose_file';
    }

    $config = [
        'type' => 'file',
        'allowed' => $allowedFileTypes,
        'appearance' => [
            'showPossibleLocalizationRecords' => true,
            'showAllLocalizationLink' => $allowsMultipleFiles,
            'createNewRelationLinkTitle' => $createNewRelationLinkTitle,
            'useSortable' => $allowsMultipleFiles,
            'headerThumbnail' => [
                'field' => '',
                'width' => '0',
                'height' => '0',
            ],
            'enabledControls' => [
                'info' => true,
                'new' => $allowsMultipleFiles,
                'dragdrop' => $allowsMultipleFiles,
                'sort' => $allowsMultipleFiles,
                'hide' => $allowsMultipleFiles,
                'delete' => true,
                'localize' => true,
            ],
        ],
        'overrideChildTca' => [
            'types' => [
                AbstractFile::FILETYPE_APPLICATION => ['showitem' => $showitem],
                AbstractFile::FILETYPE_AUDIO => ['showitem' => $showitem],
                AbstractFile::FILETYPE_IMAGE => ['showitem' => $showitem],
                AbstractFile::FILETYPE_TEXT => ['showitem' => $showitem],
                AbstractFile::FILETYPE_UNKNOWN => ['showitem' => $showitem],
                AbstractFile::FILETYPE_VIDEO => ['showitem' => $showitem],
            ],
        ],
        'security' => ['ignorePageTypeRestriction' => true],
    ];

    if ($maxitems > 0) {
        $config['maxitems'] = $maxitems;
    }

    return $config;
};

return [
    'ctrl' => [
        'label' => 'caption',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'title' => $languagePrefix . 'tx_html5mediakit_domain_model_media',
        'type' => 'type',
        'typeicon_column' => 'type',
        'typeicon_classes' => [
            'default' => 'mimetypes-media-video',
            MediaType::VIDEO => 'mimetypes-media-video',
            MediaType::AUDIO => 'mimetypes-media-audio',
        ],
        'hideTable' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'columns' => [
        'type' => [
            'label' => $languagePrefixColumn . 'type',
            'description' => $languagePrefixCsh . 'type.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => $languagePrefixColumn . 'type.I.video',
                        'value' => MediaType::VIDEO,
                    ],
                    [
                        'label' => $languagePrefixColumn . 'type.I.audio',
                        'value' => MediaType::AUDIO,
                    ],
                ],
                'default' => MediaType::VIDEO,
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'tracks' => [
            'label' => $languagePrefixColumn . 'tracks',
            'description' => $languagePrefixCsh . 'tracks.description',
            'config' => $buildFileFieldConfig(
                ['vtt'],
                0,
                'tx_html5mediakit_track_kind, tx_html5mediakit_track_label, tx_html5mediakit_track_srclang',
            ),
        ],
        'caption' => [
            'label' => $languagePrefixColumn . 'caption',
            'description' => $languagePrefixCsh . 'caption.description',
            'config' => ['type' => 'input'],
        ],
        'description' => [
            'label' => $languagePrefixColumn . 'description',
            'description' => $languagePrefixCsh . 'description.description',
            'config' => [
                'type' => 'text',
                'rows' => 5,
                'cols' => 30,
                'enableRichtext' => true,
            ],
        ],
        'l10n_diffsource' => [
            'config' => ['type' => 'passthrough'],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_html5mediakit_domain_model_media',
                'foreign_table_where' => 'AND {#tx_html5mediakit_domain_model_media}.{#pid}=###CURRENT_PID###'
                    . ' AND {#tx_html5mediakit_domain_model_media}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'mp3' => [
            'label' => $languagePrefixColumn . 'mp3',
            'description' => $languagePrefixCsh . 'mp3.description',
            'config' => $buildFileFieldConfig(['mp3']),
        ],
        'ogg' => [
            'label' => $languagePrefixColumn . 'ogg',
            'description' => $languagePrefixCsh . 'ogg.description',
            'config' => $buildFileFieldConfig(
                [
                    'ogg',
                    'ogx',
                ]
            ),
        ],
        'h264' => [
            'label' => $languagePrefixColumn . 'h264',
            'description' => $languagePrefixCsh . 'h264.description',
            'config' => $buildFileFieldConfig(['mp4']),
        ],
        'ogv' => [
            'label' => $languagePrefixColumn . 'ogv',
            'description' => $languagePrefixCsh . 'ogv.description',
            'config' => $buildFileFieldConfig(['ogv']),
        ],
        'poster' => [
            'label' => $languagePrefixColumn . 'poster',
            'config' => $buildFileFieldConfig(
                allowedFileTypes: 'common-image-types',
                createNewRelationLinkTitle: $lllAddImageFileReference
            ),
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => ['type' => 'language'],
        ],
        'web_m' => [
            'label' => $languagePrefixColumn . 'web_m',
            'description' => $languagePrefixCsh . 'web_m.description',
            'config' => $buildFileFieldConfig(['webm']),
        ],
        'content_element' => [
            'config' => ['type' => 'passthrough'],
        ],
        'tstamp' => [
            'config' => ['type' => 'passthrough'],
        ],
    ],
    'types' => [
        '0' => ['showitem' => 'type,--palette--;;hiddenFields'],
        'video' => [
            'showitem' => '
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                    type, h264, web_m, ogv, poster,
                    --palette--;;hiddenFields,
                --div--;' . $languagePrefixColumn . 'tracks,
                    tracks,
                --div--;' . $languagePrefixColumn . 'palette.metadata;metadata,
                    caption, description,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
            ',
        ],
        'audio' => [
            'showitem' => '
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                    type, mp3, ogg,
                    --palette--;;hiddenFields,
                --div--;' . $languagePrefixColumn . 'tracks,
                    tracks,
                --div--;' . $languagePrefixColumn . 'palette.metadata;metadata,
                    caption, description,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
            ',
        ],
    ],
    'palettes' => [
        'language' => [
            'showitem' => '
                sys_language_uid, l10n_parent
            ',
        ],
    ],
];
