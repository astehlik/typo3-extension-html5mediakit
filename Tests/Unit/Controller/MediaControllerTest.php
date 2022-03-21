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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

class MediaControllerTest extends TestCase
{
    /**
     * @var MediaControllerMock
     */
    protected $mediaController;

    public function setUp(): void
    {
        $this->mediaController = GeneralUtility::makeInstance(MediaControllerMock::class);
    }

    /**
     * @test
     */
    public function videoActionAssignsVideoToView()
    {
        /** @var Video|MockObject $dummyVideo */
        $dummyVideo = $this->createMock(Video::class);
        $viewMock = $this->createMock(ViewInterface::class);
        $viewMock->expects($this->once())->method('assign')->with('video', $dummyVideo);
        $this->mediaController->setView($viewMock);
        $this->mediaController->videoAction($dummyVideo);
    }
}
