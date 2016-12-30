<?php

namespace Miser\Entities;

use Miser\Entities\MiserEntity;

class MiserEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldSuccessWithValidParameter()
    {
        $miser = new MiserEntity(1, 2016, 12, 24, false);
        assert($miser);
    }

    /**
     * @expectedException Miser\Exceptions\InvalidEntityParameterException
     */
    public function testShouldThrowExceptionWithInvalidParameter()
    {
        $miser = new MiserEntity(1, 2016, 9, 31, true);
    }
}
