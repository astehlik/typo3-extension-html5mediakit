<?php

namespace Sto\Html5mediakit\Tests\Unit\ViewHelpers;

use Sto\Html5mediakit\Domain\Model\Video;
use Sto\Html5mediakit\ViewHelpers\VideoViewHelper;
use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\TestingFramework\Fluid\Unit\ViewHelpers\ViewHelperBaseTestcase;

class VideoViewHelperTest extends ViewHelperBaseTestcase
{
    public function testControlsAttributeIsRendered()
    {
        $this->arguments = ['controls' => 'controls'];
        $this->assertRenderResult('<video controls="controls">children</video>');
    }

    public function testNoEmptyAttributeIsRendered()
    {
        $this->arguments = [];
        $this->assertRenderResult('<video>children</video>');
    }

    public function testPosterAttributeIsRendered()
    {
        $resourceMock = $this->getMockBuilder(FileInterface::class)->getMockForAbstractClass();
        $resourceMock->method('getPublicUrl')->willReturn('/my/img/src.png');

        $posterMock = $this->getMockBuilder(FileReference::class)->getMock();
        $posterMock->method('getOriginalResource')->willReturn($resourceMock);

        $video = new Video();
        $video->_setProperty('poster', $posterMock);

        $this->arguments = ['poster' => '/my/img/src.png'];
        $this->assertRenderResult('<video poster="/my/img/src.png">children</video>', $video);
    }

    private function assertRenderResult(string $expectedResult, ?Video $video = null): void
    {
        $this->arguments['video'] = $video ?: new Video();

        $renderChildrenClosure = function () {
            return 'children';
        };

        $viewHelper = new VideoViewHelper();
        $this->injectDependenciesIntoViewHelper($viewHelper);
        $viewHelper->setRenderChildrenClosure($renderChildrenClosure);
        $this->assertEquals($expectedResult, $viewHelper->initializeArgumentsAndRender());
    }
}
