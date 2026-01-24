<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

use Symfony\Component\DomCrawler\Crawler;

class VideoTest extends AbstractMediaControllerTestCase
{
    private array $expectedTracks = [
        [
            'src' => '/tracks/subtitles-en.vtt',
            'kind' => 'subtitles',
            'srclang' => 'en',
            'label' => 'English',
            'default' => true,
        ],
        [
            'src' => '/tracks/subtitles-de.vtt',
            'kind' => 'subtitles',
            'srclang' => 'de',
            'label' => 'German',
            'default' => false,
        ],
    ];

    private array $formats = [
        'webm' => 'webm',
        'mp4' => 'mp4',
        'ogg' => 'ogv',
    ];

    public function testMediaControllerRendersVideo(): void
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('media/video');

        $crawler = new Crawler($responseBody);

        $videoContent = $this->getSingleElement($crawler, 'div.tx-html5mediakit-media-container');

        $videoElement = $this->getSingleElement($videoContent, 'video');

        $this->assertSame('/video/poster.png', $videoElement->attr('poster'));

        $this->assertVideoContainsSources($videoElement);

        $fallbackText = $this->getSingleElement($videoContent, '.tx-html5mediakit-video-fallbacktext');
        $this->assertFallbacktextContainsFallbackLinks($fallbackText);

        $this->assertValidMetaData($this->getSingleElement($videoContent, '.tx-html5mediakit-media-metadata'));

        $this->assertVideoContainsTracks($videoElement);
    }

    public function testMediaControllerRendersVideoWithoutData(): void
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('media/video', 2);

        $crawler = new Crawler($responseBody);

        $audioContent = $this->getSingleElement($crawler, 'div.tx-html5mediakit-media-container')->text();

        $this->assertSame('No video file is available in any format.', $audioContent);
    }

    private function assertFallbacktextContainsFallbackLinks(Crawler $fallbackText): void
    {
        foreach ($this->formats as $extension) {
            /** @noinspection HtmlUnknownTarget */
            $fallbackLink = $fallbackText->filter(sprintf('a[href="/video/media.%s"]', $extension));
            $this->assertCount(1, $fallbackLink);
            $this->assertSame('media.' . $extension, $fallbackLink->text());
        }
    }

    private function assertValidMetaData(Crawler $metaDataElement): void
    {
        $this->assertStringContainsString(
            'Testcaption',
            $this->getSingleElement($metaDataElement, '.tx-html5mediakit-media-caption')->text(),
        );

        $this->assertStringContainsString(
            'Testdescription',
            $this->getSingleElement($metaDataElement, '.tx-html5mediakit-media-description')->text(),
        );
    }

    private function assertVideoContainsSources(Crawler $videoElement): void
    {
        foreach ($this->formats as $mimeType => $extension) {
            $source = $videoElement->filter(sprintf('source[type="video/%s"]', $mimeType));
            $this->assertCount(1, $source);
            $this->assertSame('/video/media.' . $extension, $source->attr('src'));
        }
    }

    private function assertVideoContainsTracks(Crawler $videoElement): void
    {
        foreach ($this->expectedTracks as $expectedTrack) {
            $track = $this->getSingleElement($videoElement, sprintf('track[src="%s"]', $expectedTrack['src']));
            $this->assertSame($expectedTrack['kind'], $track->attr('kind'));
            $this->assertSame($expectedTrack['srclang'], $track->attr('srclang'));
            $this->assertSame($expectedTrack['label'], $track->attr('label'));

            $expectedDefault = $expectedTrack['default'] ? '' : null;
            $this->assertSame($expectedDefault, $track->attr('default'));
        }
    }
}
