<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

class VideoTest extends AbstractMediaControllerTestCase
{
    private array $formats = [
        'webm' => 'webm',
        'mp4' => 'mp4',
        'ogg' => 'ogv',
    ];

    public function testMediaControllerShowsVideo(): void
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('media/video');

        $this->assertResponseContainsSources($responseBody);
        $this->assertResponseContainsFallbackLinks($responseBody);
        self::assertStringContainsString('Testcaption', $responseBody);
        self::assertStringContainsString('Testdescription', $responseBody);
        self::assertStringContainsString('poster="/video/poster.png"', $responseBody);
    }

    private function assertResponseContainsFallbackLinks(string $responseBody): void
    {
        foreach ($this->formats as $extension) {
            /** @noinspection HtmlUnknownTarget */
            $expectedSource = sprintf('<a href="/video/media.%s">media.%1$s</a>', $extension);
            self::assertStringContainsString($expectedSource, $responseBody);
        }
    }

    private function assertResponseContainsSources(string $responseBody): void
    {
        foreach ($this->formats as $mimeType => $extension) {
            /** @noinspection HtmlUnknownTarget */
            $expectedSource = sprintf('<source src="/video/media.%s" type="video/%s"/>', $extension, $mimeType);
            self::assertStringContainsString($expectedSource, $responseBody);
        }
    }
}
