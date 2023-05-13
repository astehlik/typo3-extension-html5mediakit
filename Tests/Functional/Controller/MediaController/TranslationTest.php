<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

class TranslationTest extends AbstractMediaControllerTestCase
{
    public function testConnectedModeUsesExpectedMedia(): void
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('translation', 10, 1);

        self::assertStringNotContainsString('caption connected default', $responseBody);
        self::assertStringContainsString('caption connected de', $responseBody);

        self::assertStringNotContainsString('audio/media.mp3', $responseBody);
        self::assertStringContainsString('audio/media.ogg', $responseBody);
    }

    public function testCopyModeUsesExpectedMedia(): void
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('translation', 20, 1);

        self::assertStringNotContainsString('caption copy default', $responseBody);
        self::assertStringContainsString('caption copy de', $responseBody);

        self::assertStringNotContainsString('video/media.mp4', $responseBody);
        self::assertStringContainsString('video/media.ogv', $responseBody);
    }
}
