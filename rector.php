<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function(RectorConfig $rectorConfig): void {
    $rectorConfig->importNames();

    $rectorConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
            __DIR__ . '/rector.php',
        ]
    );
    $rectorConfig->skip([
        AddOverrideAttributeToOverriddenMethodsRector::class,
    ]);
    $rectorConfig->sets(
        [
            LevelSetList::UP_TO_PHP_83,
            SetList::TYPE_DECLARATION,
        ]
    );
};
