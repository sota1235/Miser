<?php

namespace Miser\Entities;

use PHPUnit\Framework\TestCase;

class UrlLinkEntityTest extends TestCase
{
    public function testShouldSuccessWithValidParameter()
    {
        $url = 'http://hoge.com';

        $url = new UrlLinkEntity($url);
    }

    /**
     * @expectedException Miser\Exceptions\InvalidEntityParameterException
     */
    public function testShouldThrowExceptionWithInvalidParameter()
    {
        $url = new UrlLinkEntity('detaramecom');
    }
}
