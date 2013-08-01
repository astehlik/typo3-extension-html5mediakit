<?php
namespace Sto\Html5mediakit\Domain\Model;


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
?>