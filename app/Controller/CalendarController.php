<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Controller;

use Dietcube\Controller;

class CalendarController extends Controller
{
    public function index()
    {
        $year = $this->query('year', null);
        $month = $this->query('month', null);

        $isCurrent = (is_null($year) || is_null($month));

        $calendarService = $this->get('service.calendar');

        $monthData = $isCurrent ?
            $calendarService->getCurrentMonth() : $calendarService->getMonth($year, $month);

        return $this->render('index', [
            'month' => $monthData,
        ]);
    }
}
