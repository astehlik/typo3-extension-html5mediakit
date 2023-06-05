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
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Video media containing different video formats.
 */
class Video extends Media
{
    /**
     * Reference to the h.264 (.mp4) version of the video.
     *
     * @var FileReference
     */
    protected $h264;

    /**
     * Reference to the OGG Theora (.ogv) version of the video.
     *
     * @var FileReference
     */
    protected $ogv;

    /**
     * Reference to the WebM version of the video.
     *
     * @var FileReference
     */
    protected $poster;

    /**
     * Reference to the WebM version of the video.
     *
     * @var FileReference
     */
    protected $webM;

    /**
     * Reference to the subtitle file.
     *
     * @var ObjectStorage<FileReference>
     */
    protected $subtitles;

    public function getH264(): FileReference
    {
        return $this->h264;
    }

    /**
     * Returns true if a H264 file is available.
     */
    public function getHasH264(): bool
    {
        return $this->h264 instanceof FileReference;
    }

    /**
     * Returns true if an OGV file is available.
     */
    public function getHasOgv(): bool
    {
        return $this->ogv instanceof FileReference;
    }

    /**
     * Returns true if an poster image is available.
     */
    public function getHasPoster(): bool
    {
        return $this->poster instanceof FileReference;
    }

    /**
     * Returns true if an WebM file is available.
     */
    public function getHasWebM(): bool
    {
        return $this->webM instanceof FileReference;
    }

    public function getOgv(): FileReference
    {
        return $this->ogv;
    }

    public function getPoster(): FileReference
    {
        return $this->poster;
    }

    public function getSubtitles(): ObjectStorage
    {
        return $this->subtitles;
    }

    /**
     * Returns true if a video file of any type is available.
     */
    public function getVideoFileAvailable(): bool
    {
        return $this->getHasH264() || $this->getHasOgv() || $this->getHasWebM();
    }

    public function getWebM(): FileReference
    {
        return $this->webM;
    }
}
