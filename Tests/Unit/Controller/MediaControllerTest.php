<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Unit\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sto\Html5mediakit\Domain\Model\Video;
use TYPO3\CMS\Core\Http\ResponseFactory;
use TYPO3\CMS\Core\Http\StreamFactory;
use TYPO3Fluid\Fluid\View\ViewInterface;

class MediaControllerTest extends TestCase
{
    protected MediaControllerMock $mediaController;

    protected function setUp(): void
    {
        $this->mediaController = new MediaControllerMock();

        $this->mediaController->injectResponseFactory(new ResponseFactory());
        $this->mediaController->injectStreamFactory(new StreamFactory());
    }

    public function testVideoActionAssignsVideoToView(): void
    {
        /** @var MockObject|Video $dummyVideo */
        $dummyVideo = $this->createMock(Video::class);
        $viewMock = $this->createMock(ViewInterface::class);
        $viewMock->expects(self::once())->method('assign')->with('video', $dummyVideo);
        $viewMock->expects(self::once())->method('render')->willReturn('');
        $this->mediaController->setView($viewMock);
        $this->mediaController->videoAction($dummyVideo);
    }
}
