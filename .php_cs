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
    ])
    ->setFinder($finder);
