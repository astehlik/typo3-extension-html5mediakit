<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

use Sto\Html5mediakit\Domain\Repository\MediaRepository;
use Sto\Html5mediakit\Tests\Unit\Controller\MediaControllerMock;
use TYPO3\CMS\Core\Core\SystemEnvironmentBuilder;
use TYPO3\CMS\Core\Http\ServerRequest;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Extbase\Mvc\ExtbaseRequestParameters;
use TYPO3\CMS\Extbase\Mvc\Request;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class RelatedTableTest extends AbstractMediaControllerTestCase
{
    public function testMediaControllerShowsVideo(): void
    {
        self::markTestSkipped('Test needs rework, ideally with a test Extension');

        // @phpstan-ignore deadCode.unreachable
        $this->loadFixtures('media/parent');

        $container = $this->getContainer();

        $contentObject = new ContentObjectRenderer();
        // @extensionScannerIgnoreLine
        $contentObject->data = [
            'parent_table' => 'a_dummy_table',
            'parent_record' => 23,
        ];

        $baseRequest = (new ServerRequest())
            ->withAttribute('extbase', new ExtbaseRequestParameters())
            ->withAttribute('currentContentObject', $contentObject)
            ->withAttribute('applicationType', SystemEnvironmentBuilder::REQUESTTYPE_FE);

        $container->get(ConfigurationManagerInterface::class)->setRequest($baseRequest);

        $controller = new MediaControllerMock();
        $controller->injectMediaRepository($container->get(MediaRepository::class));
        $controller->setRequest(new Request($baseRequest));

        $response = $controller->renderMediaForRelatedTableAction();

        self::assertInstanceOf(ForwardResponse::class, $response);
        self::assertSame(['video' => 1], $response->getArguments());
    }
}
