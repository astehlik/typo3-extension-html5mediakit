<?php
namespace Sto\Html5mediakit\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for rendering media
 */
class MediaController extends ActionController
{
    /**
     * @var \Sto\Html5mediakit\Domain\Repository\MediaRepository
     * @inject
     */
    protected $mediaRepository;

    /**
     * @param \Sto\Html5mediakit\Domain\Model\Audio $audio
     */
    public function audioAction($audio)
    {
        $this->view->assign('audio', $audio);
    }

    /**
     * Renders the media depending on the type.
     *
     * @throws \TYPO3\CMS\Core\FormProtection\Exception
     */
    public function renderMediaAction()
    {
        $contentObject = $this->configurationManager->getContentObject();

        $media = $this->mediaRepository->findOneByContentElementUid($contentObject->data['uid']);

        if (!isset($media)) {
            return 'No media element was found in the current content element.';
        }

        $mediaType = $media->getType();

        // We update the last changed register when a media record has changed because
        // the content element will not get this information if no properties in the
        // content element are changed.
        $contentObject = $this->configurationManager->getContentObject();
        $contentObject->lastChanged($media->getTstamp());

        if ($mediaType == 'video') {
            $this->forward('video', null, null, ['video' => $media]);
        } elseif ($mediaType == 'audio') {
            $this->forward('audio', null, null, ['audio' => $media]);
        }

        throw new \TYPO3\CMS\Core\FormProtection\Exception('Invalid media type.');
    }

    /**
     * @param \Sto\Html5mediakit\Domain\Model\Video $video
     */
    public function videoAction($video)
    {
        $this->view->assign('video', $video);
    }
}
