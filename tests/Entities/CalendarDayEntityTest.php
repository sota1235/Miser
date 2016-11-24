<?php

namespace Miser\Entities;

use Miser\Entities\CalendarDayEntity;

class CalendarDayEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldSuccessWithValidParameter()
    {
        $day       = 25;
        $isCurrent = true;
        $timestamp = 12345;

        $calendarDay = new CalendarDayEntity($day, $isCurrent, $timestamp);

        $this->assertEquals($calendarDay->day, $day);
        $this->assertEquals($calendarDay->isCurrent, $isCurrent);
        $this->assertEquals($calendarDay->timestamp, $timestamp);
    }

    /**
     * @dataProvider getInvalidParameters
     * @expectedException Miser\Exceptions\InvalidEntityParameterException
     */
    public function testShouldThrowExceptionWithInvalidParameter($day, $isCurrent, $timestamp)
    {
        $calendarDay = new CalendarDayEntity(32, true, 12345);
    }

    /**
     * @return array
     */
    public function getInvalidParameters()
    {
        return [
            // invalid day number
            [-1, true, 12345],
            [32, true, 12345],
            // invalid timestamp
            [15, false, -1],
        ];
    }
}
