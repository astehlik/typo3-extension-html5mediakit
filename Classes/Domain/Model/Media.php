<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Sto\Html5mediakit\Domain\Model\Enumeration\MediaType;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Overall media class containing common media properties like
 * captions.
 */
class Media extends AbstractEntity
{
    /**
     * Caption for the media file.
     */
    protected string $caption;

    /**
     * UID of the content element to which this media element belongs.
     */
    protected int $contentElement;

    /**
     * The (Richtext) description of the media element.
     */
    protected string $description;

    protected int $parentRecord;

    protected string $parentTable;

    /**
     * Reference to the track file.
     *
     * @var ObjectStorage<FileReference>
     */
    protected ObjectStorage $tracks;

    protected int $tstamp;

    protected MediaType $type;

    public function __construct()
    {
        $this->tracks = new ObjectStorage();
    }

    public function getCaption(): string
    {
        return $this->caption;
    }

    public function getContentElement(): int
    {
        return $this->contentElement;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Returns TRUE if the media element has a teaser and / or
     * a description.
     */
    public function getHasMetadata(): bool
    {
        $metadata = $this->getCaption();
        $metadata .= $this->getDescription();

        $metadata = trim($metadata);

        return !empty($metadata);
    }

    public function getParentRecord(): int
    {
        return $this->parentRecord;
    }

    public function getParentTable(): string
    {
        return $this->parentTable;
    }

    public function getTracks(): ObjectStorage
    {
        return $this->tracks;
    }

    public function getTstamp(): int
    {
        return $this->tstamp;
    }

    public function getType(): MediaType
    {
        return $this->type;
    }

    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }

    public function setContentElement(int $contentElement): void
    {
        $this->contentElement = $contentElement;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setParentRecord(int $parentRecord): void
    {
        $this->parentRecord = $parentRecord;
    }

    public function setParentTable(string $parentTable): void
    {
        $this->parentTable = $parentTable;
    }

    public function setTracks(ObjectStorage $tracks): void
    {
        $this->tracks = $tracks;
    }

    public function setTstamp(int $tstamp): void
    {
        $this->tstamp = $tstamp;
    }

    public function setType(MediaType $type): void
    {
        $this->type = $type;
    }
}
