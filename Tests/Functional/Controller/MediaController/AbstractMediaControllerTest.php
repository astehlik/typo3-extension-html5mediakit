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

use Symfony\Component\Yaml\Yaml;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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
                    'EXT:html5mediakit/Configuration/TypoScript/setup.typoscript',
                    'EXT:html5mediakit/Tests/Functional/Fixtures/setup.typoscript',
                ],
            ]
        );
        $this->setUpFrontendSite(1);

        $request = (new InternalRequest())->withPageId($pageId)->withLanguageId($languageId);
        $response = $this->executeFrontendRequest($request);

        return (string)$response->getBody();
    }

    /**
     * Create a simple site config for the tests that
     * call a frontend page.
     *
     * @param int $pageId
     * @param array $additionalLanguages
     */
    protected function setUpFrontendSite(int $pageId, array $additionalLanguages = [])
    {
        $languages = [
            [
                'title' => 'English',
                'enabled' => true,
                'languageId' => 0,
                'base' => '/',
                'typo3Language' => 'default',
                'locale' => 'en_US.UTF-8',
                'iso-639-1' => 'en',
                'navigationTitle' => '',
                'hreflang' => '',
                'direction' => '',
                'flag' => 'us',
            ],
            [
                'title' => 'German',
                'enabled' => true,
                'languageId' => 1,
                'base' => '/de/',
                'typo3Language' => 'de',
                'locale' => 'de_DE.UTF-8',
                'iso-639-1' => 'de',
                'navigationTitle' => '',
                'hreflang' => '',
                'direction' => '',
                'flag' => 'de',
            ],
        ];
        $languages = array_merge($languages, $additionalLanguages);
        $configuration = [
            'rootPageId' => $pageId,
            'base' => '/',
            'languages' => $languages,
            'errorHandling' => [],
            'routes' => [],
        ];
        GeneralUtility::mkdir_deep($this->instancePath . '/typo3conf/sites/testing/');
        $yamlFileContents = Yaml::dump($configuration, 99, 2);
        $fileName = $this->instancePath . '/typo3conf/sites/testing/config.yaml';
        GeneralUtility::writeFile($fileName, $yamlFileContents);
        // Ensure that no other site configuration was cached before
        $cache = GeneralUtility::makeInstance(CacheManager::class)->getCache('core');
        if ($cache->has('site-configuration')) {
            $cache->remove('site-configuration');
        }
    }

    private function buildDatasetPath(string $dataSet): string
    {
        return sprintf('EXT' . ':html5mediakit/Tests/Functional/Fixtures/Database/%s.xml', $dataSet);
    }
}
