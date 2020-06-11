<?php
declare(strict_types=1);

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

use Sto\Html5mediakit\Domain\Model\Audio;
use Sto\Html5mediakit\Domain\Model\Enumeration\MediaType;
use Sto\Html5mediakit\Domain\Model\Media;
use Sto\Html5mediakit\Domain\Model\Video;
use Sto\Html5mediakit\Domain\Repository\MediaRepository;
use Sto\Html5mediakit\Exception\MediaException;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Controller for rendering media
 */
class MediaController extends ActionController
{
    /**
     * @var MediaRepository
     */
    protected $mediaRepository;

    public function injectMediaRepository(MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * @param \Sto\Html5mediakit\Domain\Model\Audio $audio
     */
    public function audioAction(Audio $audio)
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

        try {
            $uid = $contentObject->data['_LOCALIZED_UID'] ?? $contentObject->data['uid'];
            $media = $this->mediaRepository->findOneByContentElementUid($uid);
        } catch (MediaException $mediaException) {
            return $this->translate('exception.' . $mediaException->getCode());
        }

        $this->renderMedia($media);

        throw new \RuntimeException('An invalid media type is used.');
    }

    public function renderMediaForRelatedTableAction()
    {
        $contentObject = $this->configurationManager->getContentObject();
        try {
            $media = $this->mediaRepository->findOneByParentRecord($contentObject->data);
        } catch (MediaException $mediaException) {
            return $this->translate('exception.' . $mediaException->getCode());
        }

        $this->renderMedia($media);

        throw new \RuntimeException('An invalid media type is used.');
    }

    /**
     * @param \Sto\Html5mediakit\Domain\Model\Video $video
     */
    public function videoAction(Video $video)
    {
        $this->view->assign('video', $video);
    }

    private function renderMedia(Media $media)
    {
        $mediaType = $media->getType();

        // We update the last changed register when a media record has changed because
        // the content element will not get this information if no properties in the
        // content element are changed.
        $contentObject = $this->configurationManager->getContentObject();
        $contentObject->lastChanged($media->getTstamp());

        if ($mediaType->equals(MediaType::VIDEO)) {
            $this->forward('video', null, null, ['video' => $media->getUid()]);
        } elseif ($mediaType->equals(MediaType::AUDIO)) {
            $this->forward('audio', null, null, ['audio' => $media->getUid()]);
        }
    }

    /**
     * Fetches the translation for the given key from the html5mediakit translations.
     *
     * @param string $translationKey
     * @return string
     */
    private function translate(string $translationKey): string
    {
        return (string)LocalizationUtility::translate($translationKey, 'Html5mediakit');
    }
}
