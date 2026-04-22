<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Acceptance\Application;

use Sto\Html5mediakit\Tests\Acceptance\Support\BackendTester;
use Sto\Html5mediakit\Tests\Acceptance\Support\Helper\ModalDialog;
use Sto\Html5mediakit\Tests\Acceptance\Support\Helper\PageTree;

class ContentCreationCest
{
    public function _before(BackendTester $I): void
    {
        $I->useExistingSession('admin');
    }

    public function html5MediaCanBeCreated(BackendTester $I, PageTree $pageTree, ModalDialog $modalDialog): void
    {
        $pageTree->openPath(['root Page']);

        $I->wait(0.2);
        $I->switchToContentFrame();

        $I->click('typo3-backend-new-content-element-wizard-button');

        $modalDialog->canSeeDialog();
        $I->executeJS(
            'document.querySelector(\'typo3-backend-new-record-wizard\').shadowRoot'
            . '.querySelector(\'button[data-identifier="default_html5mediakit_mediarenderer"]\').click()',
        );

        $I->switchToContentFrame();

        $headerInputSelector = 'input[data-formengine-input-name$="[header]"]';
        $I->waitForElement($headerInputSelector);
        $I->fillField($headerInputSelector, 'Testheader');

        // Switch to tab "Media"
        $I->waitForElement('typo3-backend-tab-scroller');
        $I->click('Media', 'typo3-backend-tab-scroller');

        $I->click('Create new');

        $I->waitForElement('div[data-title="Media file"] select[name$="[type]"]');

        // Tab "Meta data"
        $I->waitForElement('div[data-title="Media file"] .nav-tabs');
        $I->click('Metadata', 'div[data-title="Media file"] .nav-tabs');

        $I->fillField('div[data-title="Media file"] input[data-formengine-input-name$="[caption]"]', 'The caption');

        $I->click('Save');

        $I->waitForElement($headerInputSelector);

        $I->dontSeeInSource('alert-danger');

        $I->seeInField($headerInputSelector, 'Testheader');

        // Switch to tab "Media"
        $I->waitForElement('typo3-backend-tab-scroller');
        $I->click('Media', 'typo3-backend-tab-scroller');

        $I->waitForElement('.form-irre-object');
        $I->click('The caption', '.form-irre-object');
        $I->waitForElement('div[data-title="Media file"] select[name$="[type]"]');
        $I->seeInField('div[data-title="Media file"] input[data-formengine-input-name$="[caption]"]', 'The caption');
    }
}
