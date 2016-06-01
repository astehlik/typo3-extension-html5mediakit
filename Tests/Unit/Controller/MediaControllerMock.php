<?php
namespace Sto\Html5mediakit\Tests\Unit\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Sto\Html5mediakit\Controller\MediaController;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class MediaControllerMock extends MediaController
{
    public function setView($view)
    {
        $this->view = $view;
    }
}