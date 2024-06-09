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

use Psr\Http\Message\ResponseInterface;
use Sto\Html5mediakit\Domain\Model\Audio;
use Sto\Html5mediakit\Domain\Model\Enumeration\MediaType;
use Sto\Html5mediakit\Domain\Model\Media;
use Sto\Html5mediakit\Domain\Model\Video;
use Sto\Html5mediakit\Domain\Repository\MediaRepository;
use Sto\Html5mediakit\Exception\MediaException;
use TYPO3\CMS\Extbase\Http\ForwardResponse;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Controller for rendering media.
 */
class MediaController extends ActionController
{
    protected MediaRepository $mediaRepository;

    public function audioAction(Audio $audio): ResponseInterface
    {
        $this->view->assign('audio', $audio);

        return $this->htmlResponse();
    }

    public function injectMediaRepository(MediaRepository $mediaRepository): void
    {
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * Renders the media depending on the type.
     */
    public function renderMediaAction(): ResponseInterface
    {
        $contentObject = $this->getCurrentContentObject();

        try {
            $uid = $contentObject->data['_LOCALIZED_UID'] ?? $contentObject->data['uid'];
            $media = $this->mediaRepository->findOneByContentElementUid($uid);
        } catch (MediaException $mediaException) {
            return $this->htmlResponse($this->translate('exception.' . $mediaException->getCode()));
        }

        return $this->renderMedia($media);
    }

    public function renderMediaForRelatedTableAction(): ResponseInterface
    {
        $contentObject = $this->getCurrentContentObject();

        try {
            $media = $this->mediaRepository->findOneByParentRecord($contentObject->data);
        } catch (MediaException $mediaException) {
            return $this->htmlResponse($this->translate('exception.' . $mediaException->getCode()));
        }

        return $this->renderMedia($media);
    }

    public function videoAction(Video $video): ResponseInterface
    {
        $this->view->assign('video', $video);

        return $this->htmlResponse();
    }

    private function getCurrentContentObject(): ContentObjectRenderer
    {
        return $this->request->getAttribute('currentContentObject');
    }

    private function renderMedia(Media $media): ResponseInterface
    {
        $mediaType = $media->getType();

        // We update the last changed register when a media record has changed because
        // the content element will not get this information if no properties in the
        // content element are changed.
        $contentObject = $this->getCurrentContentObject();
        $contentObject->lastChanged($media->getTstamp());

        if ($mediaType === MediaType::VIDEO) {
            return (new ForwardResponse('video'))->withArguments(['video' => $media->getUid()]);
        }

        if ($mediaType === MediaType::AUDIO) {
            return (new ForwardResponse('audio'))->withArguments(['audio' => $media->getUid()]);
        }
    }

    /**
     * Fetches the translation for the given key from the html5mediakit translations.
     */
    private function translate(string $translationKey): string
    {
        return (string)LocalizationUtility::translate($translationKey, 'Html5mediakit');
    }
}
