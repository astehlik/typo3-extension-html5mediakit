<?php
/** @noinspection HtmlUnknownTarget */

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\TestingFramework\Core\Functional\Framework\Frontend\InternalRequest;
use TYPO3\TestingFramework\Core\Functional\FunctionalTestCase;

abstract class AbstractMediaControllerTest extends FunctionalTestCase
{
    protected $testExtensionsToLoad = ['typo3conf/ext/html5mediakit'];

    protected function loadFixturesAndGetResponseBody(string $dataSet, int $pageId = 1, int $languageId = 0): string
    {
        $this->importDataSet($this->buildDatasetPath('common'));
        $this->importDataSet($this->buildDatasetPath($dataSet));
        $this->setUpFrontendRootPage(
            1,
            [
                'setup' => [
                    'EXT' . ':html5mediakit/Configuration/TypoScript/setup.txt',
                    'EXT' . ':html5mediakit/Tests/Functional/Fixtures/setup.txt',
                ],
            ]
        );

        $request = (new InternalRequest())->withPageId($pageId)->withLanguageId($languageId);
        $response = $this->executeFrontendRequest($request);

        return (string)$response->getBody();
    }

    private function buildDatasetPath(string $dataSet): string
    {
        return sprintf('EXT' . ':html5mediakit/Tests/Functional/Fixtures/Database/%s.xml', $dataSet);
    }
}
