<?php
declare(strict_types = 1);
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
 * Video media containing different video formats.
 */
class Video extends Media
{
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
    public function getH264(): FileReference
    {
        return $this->h264;
    }

    /**
     * Returns true if a H264 file is available.
     *
     * @return bool
     */
    public function getHasH264(): bool
    {
        return $this->h264 instanceof FileReference;
    }

    /**
     * Returns true if an OGV file is available.
     *
     * @return bool
     */
    public function getHasOgv(): bool
    {
        return $this->ogv instanceof FileReference;
    }

    /**
     * Returns true if an WebM file is available.
     *
     * @return bool
     */
    public function getHasWebM(): bool
    {
        return $this->webM instanceof FileReference;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getOgv(): FileReference
    {
        return $this->ogv;
    }

    /**
     * Returns true if a video file of any type is available.
     *
     * @return bool
     */
    public function getVideoFileAvailable(): bool
    {
        return $this->getHasH264() || $this->getHasOgv() || $this->getHasWebM();
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getWebM(): FileReference
    {
        return $this->webM;
    }
}
