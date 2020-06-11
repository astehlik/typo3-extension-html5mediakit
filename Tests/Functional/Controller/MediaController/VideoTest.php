<?php
declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

class VideoTest extends AbstractMediaControllerTest
{
    private $formats = [
        'webm' => 'webm',
        'mp4' => 'mp4',
        'ogg' => 'ogv',
    ];

    public function testMediaControllerShowsVideo()
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('media/video');

        $this->assertResponseContainsSources($responseBody);
        $this->assertResponseContainsFallbackLinks($responseBody);
        $this->assertStringContainsString('Testcaption', $responseBody);
        $this->assertStringContainsString('Testdescription', $responseBody);
    }

    private function assertResponseContainsFallbackLinks(string $responseBody)
    {
        foreach ($this->formats as $extension) {
            $expectedSource = sprintf('<a href="video/media.%s">media.%1$s</a>', $extension);
            $this->assertStringContainsString($expectedSource, $responseBody);
        }
    }

    private function assertResponseContainsSources(string $responseBody)
    {
        foreach ($this->formats as $mimeType => $extension) {
            $expectedSource = sprintf('<source src="video/media.%s" type="video/%s"/>', $extension, $mimeType);
            $this->assertStringContainsString($expectedSource, $responseBody);
        }
    }
}
