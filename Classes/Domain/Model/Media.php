<?php
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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Overall media class containing common media properties like
 * captions.
 */
class Media extends AbstractEntity {

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
	 * @var string
	 */
	protected $type;

	/**
	 * @return mixed
	 */
	public function getCaption() {
		return $this->caption;
	}

	/**
	 * @return int
	 */
	public function getContentElement() {
		return $this->contentElement;
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Returns TRUE if the media element has a teaser and / or
	 * a description.
	 *
	 * @return bool
	 */
	public function getHasMetadata() {

		$metadata = $this->getCaption();
		$metadata .= $this->getDescription();

		$metadata = trim($metadata);

		if (!empty($metadata)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * @return int
	 */
	public function getTstamp() {
		return $this->tstamp;
	}

	/**
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param int $contentElement
	 */
	public function setContentElement($contentElement) {
		$this->contentElement = $contentElement;
	}


}