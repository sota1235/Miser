<?php
/**
 *
 */

namespace Miser;

use Dietcube\Application as DCApplication;
use Pimple\Container;
use CalendR\Calendar;
use Miser\Service\SampleService;
use Miser\Service\CalendarService;

class Application extends DCApplication
{
    public function init(Container $container)
    {
        // do something before boot
        $container['calendar'] = function () {
            return new Calendar;
        };
    }

    public function config(Container $container)
    {
        // setup container or services here
        $container['service.sample'] = function () use ($container)  {
            $sample_service = new SampleService();
            $sample_service->setLogger($container['logger']);

            return $sample_service;
        };

        $container['service.calendar'] = function ($c) {
            $calendarService = new CalendarService($c['calendar']);

            return $calendarService;
        };
    }
}
