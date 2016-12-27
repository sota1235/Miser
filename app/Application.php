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
use Miser\Repositories as Repo;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

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
        $this->bindRepositoryInterfaces($container);
        $this->detectDatabaseConnection($container);

        // setup container or services here
        $container['service.sample'] = function () use ($container)  {
            $sample_service = new SampleService();
            $sample_service->setLogger($container['logger']);

            return $sample_service;
        };

        $container['service.calendar'] = function ($c) {
            $calendarService = new CalendarService($c[Repo\CalendarRepositoryInterface::class]);

            return $calendarService;
        };

        $this->detectConfigForTwit($container);
    }

    /**
     * RepositoryのInterfaceをbind
     *
     * @param Container  $container
     */
    protected function bindRepositoryInterfaces(Container $container)
    {
        $container[Repo\CalendarRepositoryInterface::class] = function ($container) {
            return new Repo\CalendarRepository($container['calendar']);
        };
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

    /**
     * Getting database connection.
     *
     * @param Container  $container
     */
    protected function detectDatabaseConnection(Container $container)
    {
        $container['db'] = function ($c) {
            // TODO: Get config from .env or config files.
            $conn = [
                'driver' => 'pdo_sqlite',
                'path'   => __DIR__.'/../storage/database.sqlite',
            ];
            $config = new Configuration([\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]);

            return DriverManager::getConnection($conn, $config);
        };
    }
}
