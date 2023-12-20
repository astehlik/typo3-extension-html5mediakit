<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void {
    $configurator->services()
        ->defaults()->autowire()->autoconfigure()->public()

        ->load('Sto\\Html5mediakit\\Controller\\', __DIR__ . '/../Classes/Controller/')
        ->load('Sto\\Html5mediakit\\Domain\\Repository\\', __DIR__ . '/../Classes/Domain/Repository/')
        ->load('Sto\\Html5mediakit\\ViewHelpers\\', __DIR__ . '/../Classes/ViewHelpers/');
};
