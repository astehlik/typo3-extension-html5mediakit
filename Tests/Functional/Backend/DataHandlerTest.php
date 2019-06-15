<?php
declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Functional\Backend;

use TYPO3\CMS\Backend\Form\FormDataCompiler;
use TYPO3\CMS\Backend\Form\FormDataGroup\TcaDatabaseRecord;
use TYPO3\CMS\Backend\Form\NodeFactory;
use TYPO3\CMS\Core\Tests\Functional\DataHandling\AbstractDataHandlerActionTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\TestingFramework\Core\Functional\Framework\DataHandling\ActionService;

class DataHandlerTest extends AbstractDataHandlerActionTestCase
{
    /**
     * @var ActionService
     */
    protected $actionService;

    protected $testExtensionsToLoad = [];

    protected function setUp()
    {
        parent::setUp();

        $this->importDataSet(__DIR__ . '/../Fixtures/Database/page.xml');
    }

    public function testCreationOfContentWithoutIrre()
    {
        $this->compileFormData('tt_content');
        die();
        var_dump(
            $this->actionService->createNewRecords(
                1,
                [
                    'tt_content' => [
                        'CType' => 'html5mediakit_mediarenderer',
                        'colPos' => '0',
                        'tx_html5mediakit_media' => '__nextUid',
                    ],
                    'tx_html5mediakit_domain_model_media' => [
                        'video' => '',
                    ],
                ]
            )
        );
    }

    private function compileFormData($table)
    {
        $formDataGroup = GeneralUtility::makeInstance(TcaDatabaseRecord::class);
        $formDataCompiler = GeneralUtility::makeInstance(FormDataCompiler::class, $formDataGroup);

        $formDataCompilerInput = [
            'tableName' => $table,
            'vanillaUid' => (int)0,
            'command' => 'new',
        ];

        $formData = $formDataCompiler->compile($formDataCompilerInput);

        var_dump($formData);

    }
}
