<?php
namespace Sto\Html5mediakit\Controller;


class MediaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \Sto\Html5mediakit\Domain\Repository\MediaRepository
	 * @inject
	 */
	protected $mediaRepository;

	public function renderMediaAction() {

		$contentObject = $this->configurationManager->getContentObject();

		$media = $this->mediaRepository->findOneByContentElementUid($contentObject->data['uid']);
		$mediaType = $media->getType();

		if ($mediaType == 'video') {
			$this->forward('video', NULL, NULL, array('video' => $media));
		} elseif ($mediaType == 'audio') {
			$this->forward('audio', NULL, NULL, array('audio' => $media));
		} else {
			throw new \TYPO3\CMS\Core\FormProtection\Exception('Invalid media type.');
		}
	}

	/**
	 * @param \Sto\Html5mediakit\Domain\Model\Video $video
	 */
	public function videoAction($video) {
		$this->view->assign('video', $video);
	}

	/**
	 * @param \Sto\Html5mediakit\Domain\Model\Audio $audio
	 */
	public function audioAction($audio) {
		$this->view->assign('audio', $audio);
	}

}