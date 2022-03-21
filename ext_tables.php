<?php

defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
    'tx_html5mediakit_domain_model_media'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_html5mediakit_domain_model_media',
    'EXT:html5mediakit/Resources/Private/Language/locallang_csh_media.xlf'
);
