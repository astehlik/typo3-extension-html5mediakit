<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

use Sto\Html5mediakit\Controller\MediaController;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class RelatedTableTest extends AbstractMediaControllerTestCase
{
    public function testMediaControllerShowsVideo(): void
    {
        $this->loadFixtures('media/parent');

        $container = $this->getContainer();

        $contentObject = new ContentObjectRenderer();
        $contentObject->data = [
            'parent_table' => 'a_dummy_table',
            'parent_record' => 23,
        ];
        $container->get(ConfigurationManagerInterface::class)->setContentObject($contentObject);

        $controller = $container->get(MediaController::class);

        $response = $controller->renderMediaForRelatedTableAction();

        self::assertInstanceOf(ForwardResponse::class, $response);
        self::assertSame(['video' => 1], $response->getArguments());
    }
}
