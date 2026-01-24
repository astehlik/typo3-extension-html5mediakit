<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Unit\Exception;

use PHPUnit\Framework\TestCase;
use Sto\Html5mediakit\Exception\MediaMissingException;

class MediaMissingExceptionTest extends TestCase
{
    public function testConstructorDoesNotOverrideProvidedValues(): void
    {
        $exception = new MediaMissingException('Custom message', 3838);

        $this->assertSame('Custom message', $exception->getMessage());
        $this->assertSame(3838, $exception->getCode());
    }

    public function testConstructorSetsExpectedDefaultValues(): void
    {
        $exception = new MediaMissingException();

        $this->assertSame('No media exists in the current content element.', $exception->getMessage());
        $this->assertSame(1483385454, $exception->getCode());
    }
}
