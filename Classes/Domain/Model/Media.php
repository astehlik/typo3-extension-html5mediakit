<?php
namespace Sto\Html5mediakit\Domain\Model;


class Media extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}
}
?>