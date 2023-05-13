<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

if (ExtensionManagementUtility::isLoaded('rte_ckeditor')) {
    $GLOBALS['TCA']['tx_html5mediakit_domain_model_media']['columns']['description']['config']['richtextConfiguration']
        = 'tx_html5mediakit_description';
}
