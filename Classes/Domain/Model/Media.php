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

/**
 * Overall media class containing common media properties like
 * captions.
 */
class Media extends AbstractEntity
{
    /**
     * Caption for the media file.
     *
     * @var string
     */
    protected $caption;

    /**
     * UID of the content element to which this media element belongs.
     *
     * @var int
     */
    protected $contentElement;

    /**
     * The (Richtext) description of the media element.
     *
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $parentRecord;

    /**
     * @var string
     */
    protected $parentTable;

    /**
     * @var int
     */
    protected $tstamp;

    /**
     * The type of the media element (can be audio or video).
     *
     * @var \Sto\Html5mediakit\Domain\Model\Enumeration\MediaType
     */
    protected $type;

    public function getCaption(): string
    {
        return $this->caption;
    }

    public function getContentElement(): int
    {
        return $this->contentElement;
    }

    /**
     * @return mixed
     */
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

    public function setTstamp(int $tstamp): void
    {
        $this->tstamp = $tstamp;
    }

    public function setType(MediaType $type): void
    {
        $this->type = $type;
    }
}
