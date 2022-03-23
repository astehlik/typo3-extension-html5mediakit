<?php

namespace Sto\Html5mediakit\ViewHelpers;

use Sto\Html5mediakit\Domain\Model\Video;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class VideoViewHelper extends AbstractTagBasedViewHelper
{
    public function initializeArguments()
    {
        parent::initializeArguments();

        $this->registerUniversalTagAttributes();

        $this->registerTagAttribute(
            'controls',
            'string',
            'Specifies that video controls should be displayed (such as a play/pause button etc).',
            false,
            'controls'
        );

        $this->registerArgument(
            'video',
            Video::class,
            'The video that is rendered.',
            true
        );
    }

    public function render(): string
    {
        $this->tag->setTagName('video');
        $this->tag->ignoreEmptyAttributes(true);
        $this->tag->setContent($this->renderChildren());

        $video = $this->getVideo();
        if ($video->getHasPoster()) {
            $this->tag->addAttribute('poster', $video->getPoster()->getOriginalResource()->getPublicUrl());
        }

        return parent::render();
    }

    private function getVideo(): Video
    {
        return $this->arguments['video'];
    }
}
