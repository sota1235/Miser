<?php

namespace Miser\Entities;

class PageEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldSuccessWithValidParameter()
    {
        $miser = new PageEntity(1235, 'page name', '2016-04-30');
        assert($miser);
    }
}
