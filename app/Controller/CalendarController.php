<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Controller;

use Dietcube\Controller;

class CalendarController extends Controller
{
    /**
     * @api {get} /api/calendar Get calendar data.
     * @apiGroup Calendar
     *
     * @apiParam {Number} [year] Number of the year.
     * @apiParam {Number} [month] Number of the month.
     *
     * @apiSuccess {Number} day Date.
     * @apiSuccess {Boolean} isCurrent Is the day current day.
     * @apiSuccess {Number} timestamp Unix timestamp of day.
     *
     * @apiSuccessExample {json} Success Response:
     *  [
     *      {
     *          "day": 27,
     *          "isCurrent": false,
     *          "timestamp": 1490572800
     *      },
     *      {
     *          "day": 28,
     *          "isCurrent": false,
     *          "timestamp": 1490659200
     *      }
     *  ]
     */
    public function index()
    {
        $year = $this->query('year', null);
        $month = $this->query('month', null);

        $isCurrent = (is_null($year) || is_null($month));

        $calendarService = $this->get('service.calendar');

        $monthData = $isCurrent ?
            $calendarService->getCurrentMonth() : $calendarService->getMonth($year, $month);

        return $this->json($monthData);
    }
}
