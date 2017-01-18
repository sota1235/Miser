<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Repositories;

use Carbon\Carbon;
use CalendR\Calendar;
use Miser\Entities\CalendarDayEntity;

/**
 * Class CalendarRepository
 */
class CalendarRepository implements CalendarRepositoryInterface
{
    /** @var Calendar */
    protected $calendarFactory;

    /**
     * @param Calendar  $calendar
     */
    public function __construct(Calendar $calendar)
    {
        $this->calendarFactory = $calendar;
    }

    /**
     * @return CalendarDayEntity[]
     */
    public function getCurrentMonthDays()
    {
        /** @var Carbon */
        $now = Carbon::now();

        $currentMonthCalendar = $this->calendarFactory->getMonth($now->year, $now->month);

        $entities = [];

        foreach ($currentMonthCalendar as $week) {
            foreach ($week as $day) {
                $entities[] = new CalendarDayEntity(
                    (int) $day->format('d'), $currentMonthCalendar->includes($day),
                    (int) $day->format('U')
                );
            }
        }

        return $entities;
    }

    /**
     * @param int  $year
     * @param int  $month
     *
     * @return CalendarDayEntity[]
     */
    public function getMonthDays(int $year, int $month)
    {
        $monthCalendar = $this->calendarFactory->getMonth($year, $month);

        $entities = [];

        foreach ($monthCalendar as $week) {
            foreach ($week as $day) {
                $entities[] = new CalendarDayEntity(
                    (int) $day->format('d'), $monthCalendar->includes($day),
                    (int) $day->format('U')
                );
            }
        }

        return $entities;
    }
}
