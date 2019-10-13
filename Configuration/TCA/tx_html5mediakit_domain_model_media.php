<?php
declare(strict_types=1);

use Sto\Html5mediakit\Domain\Model\Enumeration\MediaType;
use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$languagePrefix = 'LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:';
$languagePrefixColumn = $languagePrefix . 'tx_html5mediakit_domain_model_media.';

$customFileTcaFieldSettings = [
    'appearance' => [
        'createNewRelationLinkTitle' => $languagePrefix . 'choose_file',
        'useSortable' => false,
        'headerThumbnail' => [
            'field' => '',
            'width' => '0',
            'height' => '0',
        ],
        'enabledControls' => [
            'info' => false,
            'new' => false,
            'dragdrop' => false,
            'sort' => false,
            'hide' => false,
            'delete' => true,
            'localize' => false,
        ],
    ],
    'foreign_types' => [
        '0' => ['showitem' => '--palette--;;filePalette'],
        File::FILETYPE_AUDIO => ['showitem' => '--palette--;;filePalette'],
        File::FILETYPE_VIDEO => ['showitem' => '--palette--;;filePalette'],
        File::FILETYPE_APPLICATION => ['showitem' => '--palette--;;filePalette'],
    ],
    'maxitems' => 1,
];

return [
    'ctrl' => [
        'label' => 'caption',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'title' => $languagePrefix . 'tx_html5mediakit_domain_model_media',
        'type' => 'type',
        'typeicon_column' => 'type',
        'typeicon_classes' => [
            MediaType::VIDEO => 'mimetypes-media-video',
            MediaType::AUDIO => 'mimetypes-media-audio',
        ],
        'hideTable' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
    ],
    'interface' => ['showRecordFieldList' => 'type,caption,description,mp3,ogg,h264,ogv,web_m'],
    'columns' => [
        'type' => [
            'label' => $languagePrefixColumn . 'type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        $languagePrefixColumn . 'type.I.video',
                        MediaType::VIDEO,
                    ],
                    [
                        $languagePrefixColumn . 'type.I.audio',
                        MediaType::AUDIO,
                    ],
                ],
                'default' => MediaType::VIDEO,
                'size' => 1,
                'maxitems' => 1,
            ],
        ],
        'caption' => [
            'label' => $languagePrefixColumn . 'caption',
            'config' => ['type' => 'input'],
        ],
        'description' => [
            'label' => $languagePrefixColumn . 'description',
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
            'exclude' => 1,
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'foreign_table' => 'tx_html5mediakit_domain_model_media',
                'foreign_table_where' => 'AND tx_html5mediakit_domain_model_media.pid=###CURRENT_PID###'
                    . ' AND tx_html5mediakit_domain_model_media.sys_language_uid IN (-1,0)',
                'default' => 0,
            ],
        ],
        'mp3' => [
            'label' => $languagePrefixColumn . 'mp3',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'mp3',
                $customFileTcaFieldSettings,
                'mp3'
            ),
        ],
        'ogg' => [
            'label' => $languagePrefixColumn . 'ogg',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'ogg',
                $customFileTcaFieldSettings,
                'ogg,ogx'
            ),
        ],
        'h264' => [
            'label' => $languagePrefixColumn . 'h264',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'h264',
                $customFileTcaFieldSettings,
                'mp4'
            ),
        ],
        'ogv' => [
            'label' => $languagePrefixColumn . 'ogv',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'ogv',
                $customFileTcaFieldSettings,
                'ogv'
            ),
        ],
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                    ],
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.default_value',
                        0,
                    ],
                ],
                'default' => 0,
            ],
        ],
        'web_m' => [
            'label' => $languagePrefixColumn . 'web_m',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'web_m',
                $customFileTcaFieldSettings,
                'webm'
            ),
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
                type, h264, web_m, ogv, --palette--;'
                . $languagePrefixColumn . 'palette.metadata;metadata,--palette--;;hiddenFields
            ',
        ],
        'audio' => [
            'showitem' => '
                type, mp3, ogg, --palette--;'
                . $languagePrefixColumn . 'palette.metadata;metadata,--palette--;;hiddenFields
            ',
        ],
    ],
    'palettes' => [
        'metadata' => [
            'showitem' => 'caption, --linebreak--, description',
            'canNotCollapse' => 1,
        ],
        'hiddenFields' => [
            'showitem' => 'sys_language_uid, l10n_parent',
            'isHiddenPalette' => true,
        ],
    ],
];
