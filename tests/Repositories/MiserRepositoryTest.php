<?php

namespace Miser\Repositories;

use Mockery as m;
use Mockery\MockInterface as i;
use Psr\Log\LoggerInterface;
use Miser\Entities\MiserEntity;
use Miser\DataAccess\Fluent\Miser;

class MiserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var i|LoggerInterface */
    protected $logger;

    /** @var i|Miser */
    protected $miser;

    /** @var MiserRepository */
    protected $repository;

    public function setUp()
    {
        parent::setUp();

        $this->miser  = m::mock(Miser::class);
        $this->logger = m::mock(LoggerInterface::class);

        $this->repository = new MiserRepository($this->miser);
        $this->repository->setLogger($this->logger);
    }

    public function testGetMisersShouldReturnMiserEntityArray()
    {
        $this->miser->shouldReceive('getMisers')->andReturn([
            [
                'miser_id' => 1,
                'status'   => 1,
                'date_id'  => 2,
                'page_id'  => 3,
                'created'  => '2016-12-24 12:00:00',
                'year'     => 2016,
                'month'    => 12,
                'day'      => 23,
            ],
            [
                'miser_id' => 2,
                'status'   => 0,
                'date_id'  => 4,
                'page_id'  => 5,
                'created'  => '2016-12-24 12:00:00',
                'year'     => 2016,
                'month'    => 12,
                'day'      => 24,
            ],
        ]);

        $misers = $this->repository->getMisers('page name', 2016, 12);

        $this->assertInstanceOf(MiserEntity::class, $misers[0]);
        $this->assertInstanceOf(MiserEntity::class, $misers[1]);
        $this->assertCount(2, $misers);
    }

    public function testGetMisersShouldReturnEmptyWithNoData()
    {
        $this->miser->shouldReceive('getMisers')->andReturn([]);

        $this->assertEquals([], $this->repository->getMisers('page name', 2016, 12));
    }

    public function testGetMisersShouldReturnEmptyWithDatabaseException()
    {
        $this->miser->shouldReceive('getMisers')->andThrow(new \Exception);
        $this->logger->shouldReceive('log')->once();

        $this->assertEquals([], $this->repository->getMisers('page name', 2016, 12));
    }

    public function testAddMiserShouldReturnSuccessResult()
    {
        $miserId = 1235;
        $this->miser->shouldReceive('add')->andReturn($miserId);

        $this->assertEquals($miserId, $this->repository->addMiser(1235, 2016, 12, 24, true));
    }

    public function testAddMiserShouldReturnFailedResult()
    {
        $this->miser->shouldReceive('add')->andReturnNull();

        $this->assertNull($this->repository->addMiser(333, 2016, 12, 24, true));
    }

    public function testAddMiserShouldReturnFalseWithDatabaseException()
    {
        $this->miser->shouldReceive('add')->andThrow(new \Exception);
        $this->logger->shouldReceive('log')->once();

        $this->assertNull($this->repository->addMiser(1235, 2016, 12, 24, true));
    }
}
