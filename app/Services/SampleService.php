<?php

namespace Miser\Services;

use Dietcube\Components\LoggerAwareTrait;

class SampleService
{
    use LoggerAwareTrait;

    public function sayHello()
    {
        return 'Hello, welcome to Dietcube.';
    }
}
