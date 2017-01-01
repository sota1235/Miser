<?php

namespace Miser\Services;

use Mockery as m;
use Mockery\MockInterface as i;
use Miser\Services\CalendarService;
use Miser\Entities\CalendarDayEntity;
use Miser\Repositories\CalendarRepositoryInterface;

class CalendarServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var i|CalendarRepositoryInterface */
    protected $calendar;

    /** @var CalenderService */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->calendar = m::mock(CalendarRepositoryInterface::class);

        $this->service = new CalendarService($this->calendar);
    }

    public function testGetCurrentMonthShouldReturnArray()
    {
        $expected = [
            ['day' => 26, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 27, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 28, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 29, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 30, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 1,  'isCurrent' => true,  'timestamp' => 1235],
            ['day' => 2,  'isCurrent' => true,  'timestamp' => 1235],
        ];
        // make mock response
        $entities = [];
        foreach ($expected as $expect) {
            $entities[] = new CalendarDayEntity($expect['day'], $expect['isCurrent'], $expect['timestamp']);
        }

        $this->calendar->shouldReceive('getCurrentMonthDays')->andReturn($entities);

        $this->assertEquals($this->service->getCurrentMonth(), $expected);
    }

    public function testGetMonthShouldReturnArray()
    {
        $expected = [
            ['day' => 26, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 27, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 28, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 29, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 30, 'isCurrent' => false, 'timestamp' => 1235],
            ['day' => 1,  'isCurrent' => true,  'timestamp' => 1235],
            ['day' => 2,  'isCurrent' => true,  'timestamp' => 1235],
        ];
        // make mock response
        $entities = [];
        foreach ($expected as $expect) {
            $entities[] = new CalendarDayEntity($expect['day'], $expect['isCurrent'], $expect['timestamp']);
        }

        $this->calendar->shouldReceive('getMonthDays')->andReturn($entities);

        $this->assertEquals($this->service->getMonth(2016, 10), $expected);
    }
}
