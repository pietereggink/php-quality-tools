<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$projectRoot = getcwd();

$finder = (new Finder())->in([
    $projectRoot . '/bin',
    $projectRoot . '/config',
    $projectRoot . '/src',
    $projectRoot . '/tests',
]);

return (new Config())->setRules([
    '@PER-CS2.0' => true,
    'no_unused_imports' => true,
    'declare_strict_types' => true,
    'no_extra_blank_lines' => true,
    'no_whitespace_in_blank_line' => true,
    'no_spaces_inside_parenthesis' => true,
    'no_trailing_whitespace' => true,
    'function_declaration' => [
        'closure_function_spacing' => 'none',
        'closure_fn_spacing' => 'none',
    ],
    'lambda_not_used_import' => true,
    'return_type_declaration' => [
        'space_before' => 'none',
    ],
    'ordered_imports' => [
        'sort_algorithm' => 'alpha',
        'imports_order' => ['const', 'class', 'function'],
    ],
    'trailing_comma_in_multiline' => true,
    'yoda_style' => [
        'equal' => false,
        'identical' => false,
        'less_and_greater' => null,
        'always_move_variable' => false,
    ],
    'method_chaining_indentation' => true,
])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
