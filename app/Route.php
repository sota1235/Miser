<?php

namespace Miser;

use Dietcube\RouteInterface;
use Pimple\Container;

class Route implements RouteInterface
{
    /**
     * {@inheritDoc}
     */
    public function definition(Container $container)
    {
        return [
            ['GET',  '/',                                'Top::index'],
            ['GET',  '/{page}',                          'Top::index'],
            ['GET',  '/api/calendar',                    'Calendar::index'],
            ['GET',  '/api/{pageName}/misers',           'Miser::getMisers'],
            ['POST', '/api/{pageName}/miser',            'Miser::postMiser'],
            ['PUT',  '/api/{pageName}/miser/{miserId}/', 'Miser::updateMiser'],
        ];
    }
}
