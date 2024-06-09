<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Unit\ViewHelpers;

use Sto\Html5mediakit\Domain\Model\Video;
use Sto\Html5mediakit\ViewHelpers\VideoViewHelper;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

class VideoViewHelperTest extends UnitTestCase
{
    private array $arguments;

    public function testControlsAttributeIsRendered(): void
    {
        $this->arguments = ['controls' => 'controls'];
        $this->assertRenderResult('<video controls="controls">children</video>');
    }

    public function testNoEmptyAttributeIsRendered(): void
    {
        $this->arguments = [];
        $this->assertRenderResult('<video>children</video>');
    }

    public function testPosterAttributeIsRendered(): void
    {
        $resourceMock = $this->createMock(\TYPO3\CMS\Core\Resource\FileReference::class);
        $resourceMock->method('getPublicUrl')->willReturn('/my/img/src.png');

        $posterMock = $this->getMockBuilder(FileReference::class)->getMock();
        $posterMock->method('getOriginalResource')->willReturn($resourceMock);

        $video = new Video();
        $video->_setProperty('poster', $posterMock);

        $this->arguments = ['poster' => '/my/img/src.png'];

        /** @noinspection HtmlUnknownTarget */
        $this->assertRenderResult('<video poster="/my/img/src.png">children</video>', $video);
    }

    private function assertRenderResult(string $expectedResult, ?Video $video = null): void
    {
        $this->arguments['video'] = $video ?: new Video();

        $renderChildrenClosure = static function () {
            return 'children';
        };

        $viewHelper = new VideoViewHelper();
        $viewHelper->setArguments($this->arguments);
        $viewHelper->setRenderChildrenClosure($renderChildrenClosure);
        self::assertSame($expectedResult, $viewHelper->initializeArgumentsAndRender());
    }
}
