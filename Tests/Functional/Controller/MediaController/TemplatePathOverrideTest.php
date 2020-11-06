<?php
declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Controller\MediaController;

use TYPO3\CMS\Core\Utility\GeneralUtility;

class TemplatePathOverrideTest extends AbstractMediaControllerTest
{
    protected $typoscriptConstantFiles = [
        'EXT:html5mediakit/Tests/Functional/Fixtures/TypoScript/template_override_constants.typoscript'
    ];

    public function testTemplatePathOverrideWorks()
    {
        $responseBody = $this->loadFixturesAndGetResponseBody('media/video');

        $this->assertStringContainsString('OverwrittenLayout', $responseBody);
        $this->assertStringContainsString('OverwrittenTemplate', $responseBody);
        $this->assertStringContainsString('AnAdditionalPartial', $responseBody);
    }
}
