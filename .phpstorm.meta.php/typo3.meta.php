<?php

namespace PHPSTORM_META {
    use Psr\Container\ContainerInterface;
    use TYPO3\CMS\Core\Utility\GeneralUtility;

    override(
        GeneralUtility::makeInstance(0),
        map(
            [
                '' => '@',
            ]
        )
    );

    override(
        ContainerInterface::get(0),
        map(
            [
                '' => '@',
            ]
        )
    );
}
