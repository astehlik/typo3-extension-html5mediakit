<?php

declare(strict_types=1);

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

use PHPUnit\Framework\TestCase;
use Sto\Html5mediakit\Domain\Model\Media;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class MediaTest extends TestCase
{
    /**
     * @var Media
     */
    protected $media;

    protected function setUp(): void
    {
        $this->media = GeneralUtility::makeInstance(Media::class);
    }

    public function testGetHasMetadataReturnsFalseIfNoTeaserOrDescriptionPresent(): void
    {
        $this->media->setCaption('');
        $this->media->setDescription('');
        self::assertFalse($this->media->getHasMetadata());
    }

    public function testGetHasMetadataReturnsTrueIfCaptionPresent(): void
    {
        $this->media->setCaption('not empty');
        $this->media->setDescription('');
        self::assertTrue($this->media->getHasMetadata());
    }

    public function testGetHasMetadataReturnsTrueIfDescriptionPresent(): void
    {
        $this->media->setCaption('');
        $this->media->setDescription('not empty');
        self::assertTrue($this->media->getHasMetadata());
    }
}
