<?php

$finder = PhpCsFixer\Finder::create()
    ->in(['app', 'tests']);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2'        => true,
        'array_syntax' => ['syntax' => 'short'],
        'elseif'       => true,
        'phpdoc_order' => true,
        'blank_line_before_return' => true,
        'cast_spaces' => true,
        'concat_space' => true,
        'declare_equal_normalize' => true,
        'function_typehint_space' => true,
        'lowercase_cast'          => true,
        'method_separation'       => true,
        'no_empty_statement'      => true,
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_multiline_whitespace_before_semicolons'   => true,
        'no_spaces_around_offset'                     => true,
        'no_unused_imports'                           => true,
    ])
    ->setFinder($finder);
