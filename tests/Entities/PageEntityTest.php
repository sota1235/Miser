<?php

namespace Miser\Entities;

use Miser\Entities\PageEntity;

class PageEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldSuccessWithValidParameter()
    {
        $miser = new PageEntity(1235, 'page name', '2016-04-30');
        assert($miser);
    }
}
