<?php
declare(strict_types = 1);
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
     * Caption for the media file
     *
     * @var string
     */
    protected $caption;

    /**
     * UID of the content element to which this media element belongs
     *
     * @var int
     */
    protected $contentElement;

    /**
     * The (Richtext) description of the media element
     *
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $tstamp;

    /**
     * The type of the media element (can be audio or video)
     *
     * @var \Sto\Html5mediakit\Domain\Model\Enumeration\MediaType
     */
    protected $type;

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @return int
     */
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
     *
     * @return bool
     */
    public function getHasMetadata(): bool
    {
        $metadata = $this->getCaption();
        $metadata .= $this->getDescription();

        $metadata = trim($metadata);

        if (!empty($metadata)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return int
     */
    public function getTstamp(): int
    {
        return $this->tstamp;
    }

    /**
     * @return MediaType
     */
    public function getType(): MediaType
    {
        return $this->type;
    }

    /**
     * @param string $caption
     */
    public function setCaption(string $caption)
    {
        $this->caption = $caption;
    }

    /**
     * @param int $contentElement
     */
    public function setContentElement(int $contentElement)
    {
        $this->contentElement = $contentElement;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @param int $tstamp
     */
    public function setTstamp(int $tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @param MediaType $type
     */
    public function setType(MediaType $type)
    {
        $this->type = $type;
    }
}
