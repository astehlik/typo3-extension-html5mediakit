<?php
declare(strict_types = 1);
namespace Sto\Html5mediakit\Tests\Unit\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Sto\Html5mediakit\Domain\Model\Media;
use TYPO3\CMS\Components\TestingFramework\Core\UnitTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class MediaTest extends UnitTestCase
{
    /**
     * @var Media
     */
    protected $media;

    public function setUp()
    {
        $this->media = GeneralUtility::makeInstance(Media::class);
    }

    /**
     * @test
     */
    public function getHasMetadataReturnsFalseIfNoTeaserOrDescriptionPresent()
    {
        $this->media->setCaption('');
        $this->media->setDescription('');
        $this->assertFalse($this->media->getHasMetadata());
    }

    /**
     * @test
     */
    public function getHasMetadataReturnsTrueIfCaptionPresent()
    {
        $this->media->setCaption('not empty');
        $this->media->setDescription('');
        $this->assertTrue($this->media->getHasMetadata());
    }

    /**
     * @test
     */
    public function getHasMetadataReturnsTrueIfDescriptionPresent()
    {
        $this->media->setCaption('');
        $this->media->setDescription('not empty');
        $this->assertTrue($this->media->getHasMetadata());
    }
}
