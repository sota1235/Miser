<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Repositories;

/**
 * Interface CalendarRepositoryInterface
 */
interface CalendarRepositoryInterface
{
    /**
     * @return \Miser\Entities\ClaendarDayEntity[]
     */
    public function getCurrentMonthDays();

    /**
     * @param int  $year
     * @param int  $month
     *
     * @return \Miser\Entities\ClaendarDayEntity[]
     */
    public function getMonthDays(int $year, int $month);
}
