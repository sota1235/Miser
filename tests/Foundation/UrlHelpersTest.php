<?php

namespace Miser;

use PHPUnit\Framework\TestCase;

class UrlHelpersTest extends TestCase
{
    /**
     * @dataProvider getDates
     */
    public function testShouldReturnValidUrl($year, $month, $expected)
    {
        $this->assertEquals($expected, redirectToCalendar($year, $month));
    }

    /**
     * dataProvider for testing
     *
     * @return array
     */
    public function getDates()
    {
        return [
            [2016, 5, '/?year=2016&month=5'],
        ];
    }
}
