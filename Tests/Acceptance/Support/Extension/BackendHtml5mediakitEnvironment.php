<?php

declare(strict_types=1);

namespace Sto\Html5mediakit\Tests\Acceptance\Support\Extension;

use Codeception\Event\SuiteEvent;
use TYPO3\TestingFramework\Core\Acceptance\Extension\BackendEnvironment;

class BackendHtml5mediakitEnvironment extends BackendEnvironment
{
    /**
     * Load a list of core extensions and styleguide.
     *
     * @var array
     */
    protected $localConfig = [
        'coreExtensionsToLoad' => [
            'core',
            'extbase',
            'fluid',
            'backend',
            'about',
            'filelist',
            'install',
            'frontend',
            'recordlist',
            'fluid_styled_content',
        ],
        'testExtensionsToLoad' => ['typo3conf/ext/html5mediakit'],
        'xmlDatabaseFixtures' => [
            'PACKAGE:typo3/testing-framework/Resources/Core/Acceptance/Fixtures/be_users.xml',
            'PACKAGE:de-swebhosting/typo3-extension-buildtools/resources/acceptance/fixtures/be_sessions.xml',
            'PACKAGE:typo3/testing-framework/Resources/Core/Acceptance/Fixtures/be_groups.xml',
            'EXT:html5mediakit/Tests/Acceptance/Fixtures/page.xml',
        ],
    ];

    public function bootstrapTypo3Environment(SuiteEvent $suiteEvent): void
    {
        parent::bootstrapTypo3Environment($suiteEvent);

        $typo3RootPath = (string)getenv('TYPO3_PATH_ROOT');

        if ($typo3RootPath === '') {
            throw new \RuntimeException('TYPO3_PATH_ROOT environment variable is not set');
        }

        $putenvCode = 'putenv(\'TYPO3_PATH_ROOT=' . $typo3RootPath . '\');';

        $indexFiles = [
            'index.php',
            'typo3/index.php',
        ];

        foreach ($indexFiles as $indexFile) {
            $indexPath = $typo3RootPath . '/' . $indexFile;
            $indexContexts = file_get_contents($indexPath);
            $indexContexts = str_replace('<?php', '<?php ' . $putenvCode, $indexContexts);
            file_put_contents($indexPath, $indexContexts);
        }
    }
}
