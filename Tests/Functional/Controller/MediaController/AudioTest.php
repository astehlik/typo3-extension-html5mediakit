<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

class AudioTest extends AbstractMediaControllerTestCase
{
    private array $formats = [
        'mpeg' => 'mp3',
        'ogg' => 'ogg',
    ];

    public function testMediaControllerRendersAudio(): void
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('media/audio');

        $this->assertResponseContainsSources($responseBody);
        $this->assertResponseContainsFallbackLinks($responseBody);
        self::assertStringContainsString('Testcaption', $responseBody);
        self::assertStringContainsString('Testdescription', $responseBody);
    }

    private function assertResponseContainsFallbackLinks(string $responseBody): void
    {
        foreach ($this->formats as $extension) {
            /** @noinspection HtmlUnknownTarget */
            $expectedSource = sprintf('<a href="/audio/media.%s">media.%1$s</a>', $extension);
            self::assertStringContainsString($expectedSource, $responseBody);
        }
    }

    private function assertResponseContainsSources(string $responseBody): void
    {
        foreach ($this->formats as $mimeType => $extension) {
            /** @noinspection HtmlUnknownTarget */
            $expectedSource = sprintf('<source src="/audio/media.%s" type="audio/%s"/>', $extension, $mimeType);
            self::assertStringContainsString($expectedSource, $responseBody);
        }
    }
}
