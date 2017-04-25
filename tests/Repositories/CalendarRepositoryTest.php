<?php

namespace Miser\Repositories;

use PHPUnit\Framework\TestCase;
use CalendR\Calendar;
use Miser\Entities\CalendarDayEntity;

class CalendarRepositoryTest extends TestCase
{
    /** @var CalendarRepository */
    protected $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = new CalendarRepository(new Calendar);
    }

    public function testGetCurrentMonthDaysShouldReturnCalendarDayEntityArray()
    {
        $months = $this->repository->getCurrentMonthDays();

        $this->assertContainsOnlyInstancesOf(CalendarDayEntity::class, $months);
    }

    public function testGetMonthDaysShouldReturnCalendarDayEntityArray()
    {
        $months = $this->repository->getMonthDays(2016, 5);

        $this->assertContainsOnlyInstancesOf(CalendarDayEntity::class, $months);
    }

    /**
     * @expectedException Exception
     */
    public function testGetMonthDaysShouldThrowException()
    {
        $months = $this->repository->getMonthDays(2016, 13);

        $this->assertContainsOnlyInstancesOf(CalendarDayEntity::class, $months);
    }
}
