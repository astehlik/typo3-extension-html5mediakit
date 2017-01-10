<?php
declare(strict_types = 1);
namespace Sto\Html5mediakit\Tests\Functional\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use DOMDocument;
use TYPO3\CMS\Components\TestingFramework\Core\FunctionalTestCase;

class MediaControllerTest extends FunctionalTestCase
{
    protected $testExtensionsToLoad = ['typo3conf/ext/html5mediakit'];

    public function testMediaControllerShowsVideo()
    {
        $this->importDataSet(ORIGINAL_ROOT . 'typo3conf/ext/html5mediakit/Tests/Functional/Fixtures/video.xml');
        $this->setUpFrontendRootPage(
            1,
            [
                'EXT:html5mediakit/Tests/Functional/Fixtures/setup.txt',
                'EXT:html5mediakit/Configuration/TypoScript/setup.txt'
            ]
        );
        $response = $this->getFrontendResponse(1);

        $this->assertContains()


    }
}
