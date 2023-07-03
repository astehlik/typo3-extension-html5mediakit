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
use Sto\Html5mediakit\Domain\Model\Enumeration\MediaType;
use Sto\Html5mediakit\Domain\Model\Media;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class MediaTest extends TestCase
{
    protected Media $media;

    protected function setUp(): void
    {
        $this->media = GeneralUtility::makeInstance(Media::class);
    }

    public function testGetContentElementReturnsExpectedValue(): void
    {
        $this->media->setContentElement(343);

        self::assertSame(343, $this->media->getContentElement());
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

    public function testGetParentRecordReturnsExpectedValue(): void
    {
        $this->media->setParentRecord(6176);

        self::assertSame(6176, $this->media->getParentRecord());
    }

    public function testGetParentTableReturnsExpectedValue(): void
    {
        $this->media->setParentTable('the_table');

        self::assertSame('the_table', $this->media->getParentTable());
    }

    public function testGetTracksReturnsExpectedValue(): void
    {
        $theStorage = new ObjectStorage();

        $this->media->setTracks($theStorage);

        self::assertSame($theStorage, $this->media->getTracks());
    }

    public function testGetTstampReturnsExpectedValue(): void
    {
        $this->media->setTstamp(388384);

        self::assertSame(388384, $this->media->getTstamp());
    }

    public function testGetTypeReturnsExpectedValue(): void
    {
        $theType = new MediaType(MediaType::AUDIO);

        $this->media->setType($theType);

        self::assertSame($theType, $this->media->getType());
    }
}
