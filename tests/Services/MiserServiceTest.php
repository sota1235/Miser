<?php

namespace Miser\Services;

use Mockery as m;
use Mockery\MockInterface as i;
use Miser\Entities\MiserEntity;
use Miser\Repositories\MiserRepositoryInterface;

class MiserServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var i|MiserRepositoryInterface */
    protected $miser;

    /** @var MiserService */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->miser= m::mock(MiserRepositoryInterface::class);

        $this->service = new MiserService($this->miser);
    }

    public function testGetMisersReturnData()
    {
        $expected = [
            [
                'id' => 1,
                'year'     => 2017,
                'month'    => 7,
                'day'      => 1,
                'status'   => true,
            ],
        ];

        $testMiser = $expected[0];
        $miserEntity = new MiserEntity(
            $testMiser['id'], $testMiser['year'], $testMiser['month'],
            $testMiser['day'], $testMiser['status']
        );
        $this->miser->shouldReceive('getMisers')->andReturn([$miserEntity]);

        $this->assertEquals($expected, $this->service->getMisers('page_name', 2017, 14));
    }

    public function testGetMisersReturnEmpty()
    {
        $expected = [];

        $this->miser->shouldReceive('getMisers')->andReturn([]);

        $this->assertEquals($expected, $this->service->getMisers('page_name', 2017, 14));
    }

    public function testAddMiserShouldSuccess()
    {
        $this->miser->shouldReceive('addMiser')->andReturn(true);

        $this->assertTrue($this->service->addMiser(1235, 2017, 1, 30));
    }

    public function testAddMiserShouldFail()
    {
        $this->miser->shouldReceive('addMiser')->andReturn(false);

        $this->assertFalse($this->service->addMiser(1235, 2017, 1, 30));
    }
}
