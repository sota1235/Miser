<?php
/**
 *
 */

namespace Miser\Controller;

use Dietcube\Controller;

class TopController extends Controller
{
    public function index()
    {
        $calendarService = $this->get('service.calendar');
        $currentMonth = $calendarService->getCurrentMonth();

        return $this->render('index', [
            'month' => $currentMonth,
        ]);
    }
}
