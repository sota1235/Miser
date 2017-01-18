<?php
/**
 *
 */

use Monolog\Logger;

return [
    'debug' => true,

    'logger' => [
        'path' => dirname(dirname(__DIR__)).'/storage/logs/app.log',
        'level' => Logger::WARNING,
    ],

    'database' => [
        'driver' => 'pdo_sqlite',
        'path'   => dirname(dirname(__DIR__)).'/storage/database.sqlite',
    ],
];
