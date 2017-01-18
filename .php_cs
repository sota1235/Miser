<?php

$finder = PhpCsFixer\Finder::create()
    ->in(['app', 'tests']);

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2'        => true,
        '@Symfony'     => true,
        'array_syntax' => ['syntax' => 'short'],
        'elseif'       => true,
    ])
    ->setFinder($finder);
