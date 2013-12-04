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
 * Audio media containing different audio formats.
 */
class Audio extends Media {

	/**
	 * Reference to the MP3 version of the audio
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $mp3;
	/**
	 * Reference to the OGA/OGG	Vorbis version of the audio
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $ogg;

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\File
	 */
	public function getMp3() {
		return $this->mp3;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\File
	 */
	public function getOgg() {
		return $this->ogg;
	}
}