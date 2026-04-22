<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Acceptance\Support\Helper;

use De\SWebhosting\Buildtools\Tests\Acceptance\Support\Helper\AbstractModalDialog;
use Sto\Html5mediakit\Tests\Acceptance\Support\BackendTester;

class ModalDialog extends AbstractModalDialog
{
    public function __construct(BackendTester $I)
    {
        $this->tester = $I;
    }
}
