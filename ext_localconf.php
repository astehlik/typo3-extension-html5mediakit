<?php

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Sto.Html5mediakit',
	'mediarenderer',
	array(
		'Media' => 'renderMedia',
	),
	array(),
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
mod.wizards.newContentElement {
	wizardItems {
		special.elements {
			html5mediakit_mediarenderer {
				icon = gfx/c_wiz/multimedia.gif
				title = Video / Audio
				description = Video / Audio Datei aus der Dateiliste einbinden
				tt_content_defValues {
					CType = html5mediakit_mediarenderer
				}
			}
		}
		special.show := addToList(html5mediakit_mediarenderer)
	}
}

mod.web_list.table.tx_html5mediakit_domain_model_media.hideTable = 1

');

?>