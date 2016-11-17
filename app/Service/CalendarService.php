<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Service;

use Carbon\Carbon;
use CalendR\Calendar;

/**
 * Class CalendarService
 */
class CalendarService
{
    /** @var Calendar */
    protected $factory;

    /**
     * @param Calendar  $calendar
     */
    public function __construct(Calendar $calendar)
    {
        $this->factory = $calendar;
    }

    /**
     * Get data of the current month.
     *
     * @return Calendar
     */
    public function getCurrentMonth()
    {
        /** @var Carbon */
        $now = Carbon::now();

        return $this->factory->getMonth($now->year, $now->month);
    }
}
