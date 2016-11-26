<?php

namespace Miser\Entities;

use Miser\Entities\UrlLinkEntity;

class UrlLinkEntityTest extends \PHPUnit_Framework_TestCase
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
