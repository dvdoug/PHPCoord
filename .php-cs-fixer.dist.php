<?php

/**
 * PHPCoord.
 *
 * @author Doug Wright
 */
declare(strict_types=1);

$config = new PhpCsFixer\Config();

return $config->setRules(
    [
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP71Migration' => true,
        '@PHP71Migration:risky' => true,
        '@PHP73Migration' => true,
        '@PHP74Migration:risky' => true,
        '@PHP74Migration' => true,
        '@PHP80Migration:risky' => true,
        '@PHP80Migration' => true,
        '@PHP81Migration' => true,
        'concat_space' => ['spacing' => 'one'],
        'fopen_flags' => ['b_mode' => true],
        'native_function_invocation' => ['include' => ['@all']],
        'global_namespace_import' => ['import_classes' => true, 'import_constants' => true, 'import_functions' => true],
        'phpdoc_separation' => false,
        'yoda_style' => false,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'no_superfluous_phpdoc_tags' => ['allow_mixed' => false],
        'header_comment' => [
            'location' => 'after_open',
            'comment_type' => 'PHPDoc',
            'separate' => 'none',
            'header' => "PHPCoord.\n\n@author Doug Wright",
        ],
        'phpdoc_line_span' => true,
        'phpdoc_to_comment' => false,
        'ordered_imports' => ['imports_order' => ['class', 'function', 'const'], 'sort_algorithm' => 'none'],
        'declare_strict_types' => true,
    ]
)
    ->setRiskyAllowed(true)
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__ . '/resources')
            ->in(__DIR__ . '/src')
            ->in(__DIR__ . '/tests')
            ->append([__FILE__])
    );
