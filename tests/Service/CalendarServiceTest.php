<?php

namespace Miser\Service;

use Carbon\Carbon;
use CalendR\Calendar;
use CalendR\Period\Month;
use Miser\Service\CalendarService;

class CalendarServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var CalenderService */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->service = new CalendarService(new Calendar);
    }

    public function testShouldReturnCalendarObject()
    {
        $this->assertInstanceOf(Month::class, $this->service->getNowMonth());
    }
}
