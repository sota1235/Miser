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

        $this->detectConfigForTwit($container);
    }

    /**
     * Twigの設定を上書き
     *
     * @param Container  $container
     */
    protected function detectConfigForTwit(Container $container)
    {
        $renderer = $container['app.renderer'];

        $redirectToCalendarFunction = new \Twig_SimpleFunction('redirectToCalendar', function ($year, $month) {
            return redirectToCalendar($year, $month);
        });

        $renderer->addFunction($redirectToCalendarFunction);
    }
}
