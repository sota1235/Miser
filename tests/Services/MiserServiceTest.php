<?php
declare(strict_types=1);

namespace Miser\Services;

use PHPUnit\Framework\TestCase;
use Miser\Entities\PageEntity;
use Miser\Entities\MiserEntity;
use Miser\Repositories\MiserRepositoryInterface;
use Miser\Repositories\PageRepositoryInterface;

class MiserServiceTest extends TestCase
{
    /** @var MiserRepositoryInterface */
    protected $miser;

    /** @var PageRepositoryInterface */
    protected $page;

    /** @var MiserService */
    protected $service;

    public function setUp()
    {
        parent::setUp();

        $this->miser = $this->createMock(MiserRepositoryInterface::class);
        $this->page  = $this->createMock(PageRepositoryInterface::class);

        $this->service = new MiserService($this->miser, $this->page);
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
        $this->miser->method('getMisers')->willReturn([$miserEntity]);

        $this->assertEquals($expected, $this->service->getMisers('page_name', 2017, 14));
    }

    public function testGetMisersReturnEmpty()
    {
        $expected = [];

        $this->miser->method('getMisers')->willReturn([]);

        $this->assertEquals($expected, $this->service->getMisers('page_name', 2017, 14));
    }

    public function testAddMiserShouldSuccess()
    {
        $miserId = 1235;

        $this->page->method('getPage')->willReturn(
            new PageEntity(1, 'page_name', '2014-04-10')
        );
        $this->miser->method('addMiser')->willReturn($miserId);

        $this->assertEquals($miserId, $this->service->addMiser('sota', 2017, 1, 30, true));
    }

    public function testAddMiserShouldFailWithMiserRepo()
    {
        $this->page->method('getPage')->willReturn(
            new PageEntity(1, 'page_name', '2014-04-10')
        );
        $this->miser->method('addMiser')->willReturn(null);

        $this->assertNull($this->service->addMiser('sota', 2017, 1, 30, false));
    }

    public function testAddMiserShouldFailWithNotExistingPage()
    {
        $this->page->method('getPage')->willReturn(null);

        $this->assertNull($this->service->addMiser('sota', 2017, 1, 30, true));
    }
}
