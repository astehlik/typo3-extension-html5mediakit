<?php
/** @noinspection HtmlUnknownTarget */

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

class AudioTest extends AbstractMediaControllerTest
{
    private $formats = [
        'mpeg' => 'mp3',
        'ogg' => 'ogg',
    ];

    public function testMediaControllerRendersAudio()
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('audio');

        $this->assertResponseContainsSources($responseBody);
        $this->assertResponseContainsFallbackLinks($responseBody);
        $this->assertStringContainsString('Testcaption', $responseBody);
        $this->assertStringContainsString('Testdescription', $responseBody);
    }

    private function assertResponseContainsFallbackLinks(string $responseBody)
    {
        foreach ($this->formats as $extension) {
            $expectedSource = sprintf('<a href="audio/media.%s">media.%1$s</a>', $extension);
            $this->assertStringContainsString($expectedSource, $responseBody);
        }
    }

    private function assertResponseContainsSources(string $responseBody)
    {
        foreach ($this->formats as $mimeType => $extension) {
            $expectedSource = sprintf('<source src="audio/media.%s" type="audio/%s"/>', $extension, $mimeType);
            $this->assertStringContainsString($expectedSource, $responseBody);
        }
    }
}
