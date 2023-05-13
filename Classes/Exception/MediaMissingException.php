<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Exception;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Exception;

/**
 * Exception if no media record is found for the current content element.
 */
class MediaMissingException extends MediaException
{
    public function __construct($message = '', $code = 0, \Exception $previous = null)
    {
        if ($message === '') {
            $message = 'No media exists in the current content element.';
        }
        if ($code === 0) {
            $code = 1483385454;
        }
        parent::__construct($message, $code, $previous);
    }
}
