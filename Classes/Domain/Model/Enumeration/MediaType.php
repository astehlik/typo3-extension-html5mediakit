<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Domain\Model\Enumeration;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Core\Type\Enumeration;

/**
 * Enumeration of allowed media types.
 *
 * @codeCoverageIgnore No code to test.
 */
class MediaType extends Enumeration
{
    /**
     * Media type "audio" for MP3 / OGG files.
     *
     * @const
     */
    public const AUDIO = 'audio';

    /**
     * Media type "video" for MP4 / OGV files.
     *
     * @const
     */
    public const VIDEO = 'video';
}
