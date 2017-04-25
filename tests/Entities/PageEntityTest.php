<?php

namespace Miser\Entities;

use PHPUnit\Framework\TestCase;

class PageEntityTest extends TestCase
{
    public function testShouldSuccessWithValidParameter()
    {
        $miser = new PageEntity(1235, 'page name', '2016-04-30');
        assert($miser);
    }
}
