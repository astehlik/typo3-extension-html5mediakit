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

    public function testMediaControllerShowsVideo(): void
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('media/video');

        $crawler = new Crawler($responseBody);

        $videoContent = $this->getSingleElement($crawler, 'div.tx-html5mediakit-media-container');

        $videoElement = $this->getSingleElement($videoContent, 'video');

        self::assertSame('/video/poster.png', $videoElement->attr('poster'));

        $this->assertVideoContainsSources($videoElement);

        $fallbackText = $this->getSingleElement($videoContent, '.tx-html5mediakit-video-fallbacktext');
        $this->assertFallbacktextContainsFallbackLinks($fallbackText);

        $this->assertValidMetaData($this->getSingleElement($videoContent, '.tx-html5mediakit-media-metadata'));

        $this->assertVideoContainsTracks($videoElement);
    }

    private function assertFallbacktextContainsFallbackLinks(Crawler $fallbackText): void
    {
        foreach ($this->formats as $extension) {
            /** @noinspection HtmlUnknownTarget */
            $fallbackLink = $fallbackText->filter(sprintf('a[href="/video/media.%s"]', $extension));
            self::assertCount(1, $fallbackLink);
            self::assertSame('media.' . $extension, $fallbackLink->text());
        }
    }

    private function assertValidMetaData(Crawler $metaDataElement): void
    {
        self::assertStringContainsString(
            'Testcaption',
            $this->getSingleElement($metaDataElement, '.tx-html5mediakit-media-caption')->text()
        );

        self::assertStringContainsString(
            'Testdescription',
            $this->getSingleElement($metaDataElement, '.tx-html5mediakit-media-description')->text()
        );
    }

    private function assertVideoContainsSources(Crawler $videoElement): void
    {
        foreach ($this->formats as $mimeType => $extension) {
            $source = $videoElement->filter(sprintf('source[type="video/%s"]', $mimeType));
            self::assertCount(1, $source);
            self::assertSame('/video/media.' . $extension, $source->attr('src'));
        }
    }

    private function assertVideoContainsTracks(Crawler $videoElement): void
    {
        foreach ($this->expectedTracks as $expectedTrack) {
            $track = $this->getSingleElement($videoElement, sprintf('track[src="%s"]', $expectedTrack['src']));
            self::assertSame($expectedTrack['kind'], $track->attr('kind'));
            self::assertSame($expectedTrack['srclang'], $track->attr('srclang'));
            self::assertSame($expectedTrack['label'], $track->attr('label'));

            $expectedDefault = $expectedTrack['default'] ? '' : null;
            self::assertSame($expectedDefault, $track->attr('default'));
        }
    }

    private function getSingleElement(Crawler $crawler, string $selector): Crawler
    {
        $elements = $crawler->filter($selector);

        self::assertCount(1, $elements, 'Expected exactly one element matching selector "' . $selector . '"');

        return $elements->first();
    }
}
