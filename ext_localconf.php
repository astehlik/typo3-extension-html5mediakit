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

// configure a minimal RTE for the description field that
// only allows basic formatting and links
RTE.config.tx_html5mediakit_domain_model_media.description {

	showButtons = bold,italic,link,chMode,removeformat,undo,redo
	contextMenu.showButtons = insertparagraphbefore,insertparagraphafter

	proc {

		allowTags = i,em,b,strong,br,p,a
		denyTags = u,img,div,center,pre,font,hr,sub,sup,li,ul,ol,blo ckquote,strike,span
		dontProtectUnknownTags_rte = 1
		preserveDIVSections = 0

		entryHTMLparser_db = 1
		entryHTMLparser_db {

			tags {
				i.allowedAttribs = 0
				em.allowedAttribs = 0
				b.allowedAttribs = 0
				strong.allowedAttribs = 0
				br.allowedAttribs = 0
				p.allowedAttribs = 0
			}

			keepNonMatchedTags = 0
		}
	}
}

// add content element wizard configuration
mod.wizards.newContentElement {
	wizardItems {
		special.elements {
			html5mediakit_mediarenderer {
				icon = gfx/c_wiz/multimedia.gif
				title = LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:tt_content.CType.I.html5mediakit_mediarenderer
				description = LLL:EXT:html5mediakit/Resources/Private/Language/locallang_db.xlf:new_content_element_wizard_html5mediakitmediarenderer_description
				tt_content_defValues {
					CType = html5mediakit_mediarenderer
				}
			}
		}
		special.show := addToList(html5mediakit_mediarenderer)
	}
}

// hide our table in the list since it should only be used as
// inline record
mod.web_list.table.tx_html5mediakit_domain_model_media.hideTable = 1

');