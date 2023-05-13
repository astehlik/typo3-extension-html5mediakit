<?php

declare(strict_types=1);

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

use TYPO3\CMS\Extbase\Domain\Model\FileReference;

/**
 * Audio media containing different audio formats.
 */
class Audio extends Media
{
    /**
     * Reference to the MP3 version of the audio.
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $mp3;

    /**
     * Reference to the OGA/OGG Vorbis version of the audio.
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $ogg;

    /**
     * Returns true if an audio file of any type is available.
     */
    public function getAudioFileAvailable(): bool
    {
        return $this->getHasMp3() || $this->getHasOgg();
    }

    /**
     * Returns true if a MP3 file is available.
     */
    public function getHasMp3(): bool
    {
        return $this->mp3 instanceof FileReference;
    }

    /**
     * Returns true if an OGG file is available.
     */
    public function getHasOgg(): bool
    {
        return $this->ogg instanceof FileReference;
    }

    public function getMp3(): FileReference
    {
        return $this->mp3;
    }

    public function getOgg(): FileReference
    {
        return $this->ogg;
    }
}
