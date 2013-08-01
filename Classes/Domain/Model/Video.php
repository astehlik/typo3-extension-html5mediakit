<?php
namespace Sto\Html5mediakit\Domain\Model;


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
?>