<?php
declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

class TranslationTest extends AbstractMediaControllerTest
{
    public function testConnectedModeUsesExpectedMedia()
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('translation', 10, 1);

        $this->assertStringNotContainsString('caption connected default', $responseBody);
        $this->assertStringContainsString('caption connected de', $responseBody);

        $this->assertStringNotContainsString('audio/media.mp3', $responseBody);
        $this->assertStringContainsString('audio/media.ogg', $responseBody);
    }

    public function testCopyModeUsesExpectedMedia()
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('translation', 20, 1);

        $this->assertStringNotContainsString('caption copy default', $responseBody);
        $this->assertStringContainsString('caption copy de', $responseBody);

        $this->assertStringNotContainsString('video/media.mp4', $responseBody);
        $this->assertStringContainsString('video/media.ogv', $responseBody);
    }
}
