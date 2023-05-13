<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

class TemplatePathOverrideTest extends AbstractMediaControllerTestCase
{
    protected array $typoscriptConstantFiles = [self::FIXTURES_PATH . '/TypoScript/template_override_constants.typoscript'];

    public function testTemplatePathOverrideWorks()
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('media/video');

        $this->assertStringContainsString('OverwrittenLayout', $responseBody);
        $this->assertStringContainsString('OverwrittenTemplate', $responseBody);
        $this->assertStringContainsString('AnAdditionalPartial', $responseBody);
    }
}
