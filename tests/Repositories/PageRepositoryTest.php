<?php

namespace Miser\Repositories;

use Mockery as m;
use Mockery\MockInterface as i;
use Psr\Log\LoggerInterface;
use Miser\Entities\PageEntity;
use Miser\DataAccess\Fluent\Page;
use Miser\Repositories\PageRepository;

class PageRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var i|LoggerInterface */
    protected $logger;

    /** @var i|Page */
    protected $page;

    /** @var PageRepository */
    protected $repository;

    public function setUp()
    {
        parent::setUp();

        $this->page   = m::mock(Page::class);
        $this->logger = m::mock(LoggerInterface::class);

        $this->repository = new PageRepository($this->page);
        $this->repository->setLogger($this->logger);
    }

    public function testGetPageShouldReturnNullWithEmptyResult()
    {
        $this->page->shouldReceive('getByPageName')->andReturnNull();

        $this->assertNull($this->repository->getPage('page name'));
    }

    public function testGetPageShouldReturnPageEntity()
    {
        $mockRecord = [
            'page_id'   => 1235,
            'page_name' => 'sota1235',
            'created'   => '2016-12-25 12:00:00',
        ];

        $this->page->shouldReceive('getByPageName')->andReturn($mockRecord);

        $this->assertInstanceOf(PageEntity::class, $this->repository->getPage('page name'));
    }

    public function testGetPageShouldReturnNullWithDatabaseException()
    {
        $this->page->shouldReceive('getByPageName')->andThrow(new \Exception);
        $this->logger->shouldReceive('log')->once();

        $this->assertNull($this->repository->getPage('page name'));
    }

    public function testAddPageShouldReturnSuccessResultFromDatabase()
    {
        $this->page->shouldReceive('add')->andReturn(true);

        $this->assertTrue($this->repository->addPage('page name'));
    }

    public function testAddPageShouldReturnFailedResultFromDatabase()
    {
        $this->page->shouldReceive('add')->andReturn(false);

        $this->assertFalse($this->repository->addPage('page name'));
    }

    public function testAddPageShouldReturnFalseWithDatabaseException()
    {
        $this->page->shouldReceive('add')->andThrow(new \Exception);
        $this->logger->shouldReceive('log')->once();

        $this->assertFalse($this->repository->addPage('page name'));
    }
}
