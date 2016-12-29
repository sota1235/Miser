<?php
/**
 *
 */

use Monolog\Logger;

return [
    'debug' => true,

    'logger' => [
        'path' => dirname(dirname(__DIR__)) . '/storage/logs/app_development.log',
        'level' => Logger::DEBUG,
    ],

    'database' => [
        'driver' => 'pdo_sqlite',
        'path'   => dirname(dirname(__DIR__)) . '/storage/database.sqlite',
    ],
];
