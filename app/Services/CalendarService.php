<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Services;

use Miser\Repositories\CalendarRepositoryInterface;

/**
 * Class CalendarService
 */
class CalendarService
{
    /** @var CalendarRepositoryInterface */
    protected $calendar;

    /**
     * @param CalendarRepositoryInterface  $calendar
     */
    public function __construct(CalendarRepositoryInterface $calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * Get data of the current month.
     *
     * @return array
     */
    public function getCurrentMonth()
    {
        $currentMonthDays = $this->calendar->getCurrentMonthDays();

        $response = [];

        foreach ($currentMonthDays as $day) {
            $response[] = $day->toArray();
        }

        return $response;
    }

    /**
     * Get data of the month.
     *
     * @param int  $year
     * @param int  $month
     *
     * @return array
     */
    public function getMonth($year, $month)
    {
        $monthDays = $this->calendar->getMonthDays($year, $month);

        foreach ($monthDays as $day) {
            $response[] = $day->toArray();
        }

        return $response;
    }
}
