<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function(RectorConfig $rectorConfig): void {
    $rectorConfig->importNames();

    $projectRoot = getcwd();

    $rectorConfig->paths(
        [
            $projectRoot . '/src',
            $projectRoot . '/tests',
            __DIR__ . '/rector.php',
        ]
    );
    $rectorConfig->skip([
        $projectRoot . '/vendor',
        AddOverrideAttributeToOverriddenMethodsRector::class,
    ]);

    $rectorConfig->sets(
        [
            LevelSetList::UP_TO_PHP_83,
            SetList::TYPE_DECLARATION,
        ]
    );
};
