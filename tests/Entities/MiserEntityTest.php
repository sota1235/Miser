<?php

namespace Miser\Entities;

use PHPUnit\Framework\TestCase;

class MiserEntityTest extends TestCase
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
