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

/**
 * Video media containing different video formats.
 */
class Video extends Media {

	/**
	 * Reference to the h.264 (.mp4) version of the video
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $h264;
	/**
	 * Reference to the OGG Theora (.ogv) version of the video
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $ogv;
	/**
	 * Reference to the WebM version of the video
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $webM;

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	public function getH264() {
		return $this->h264;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\File
	 */
	public function getOgv() {
		return $this->ogv;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\File
	 */
	public function getWebM() {
		return $this->webM;
	}
}