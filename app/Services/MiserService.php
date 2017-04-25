<?php
declare(strict_types=1);

/**
 * @copyright (c) sota1235
 */

namespace Miser\Services;

use Miser\Repositories\PageRepositoryInterface;
use Miser\Repositories\MiserRepositoryInterface;

/**
 * Class MiserService
 */
class MiserService
{
    /** @var MiserRepositoryInterface */
    protected $miser;

    /** @var PageRepositoryInterface */
    protected $page;

    /**
     * @param MiserRepositoryInterface  $miser
     * @param PageRepositoryInterface   $page
     */
    public function __construct(
        MiserRepositoryInterface $miser,
        PageRepositoryInterface $page
    ) {
        $this->miser = $miser;
        $this->page = $page;
    }

    /**
     * @param string  $pageName
     * @param string  $year
     * @param string  $month
     *
     * @return array
     */
    public function getMisers(string $pageName, int $year, int $month): array
    {
        $miserEntities = $this->miser->getMisers($pageName, $year, $month);
        $misers = [];

        foreach ($miserEntities as $miserEntity) {
            $misers[] = $miserEntity->toArray();
        }

        return $misers;
    }

    /**
     * @param string  $pageName
     * @param int     $year
     * @param int     $month
     * @param int     $day
     * @param bool    $status
     *
     * @return int|null
     */
    public function addMiser(string $pageName, int $year, int $month, int $day, bool $status): ?int
    {
        $pageEntity = $this->page->getPage($pageName);

        if ($pageEntity === null) {
            // TODO throw exception
            return null;
        }

        $pageId = $pageEntity->id;

        $miserId = $this->miser->addMiser($pageId, $year, $month, $day, $status);

        return $miserId;
    }

    /**
     * @param int   $pageId
     * @param int   $miserId
     * @param bool  $status
     *
     * @return bool
     */
    public function updateMiser(int $pageId, int $miserId, bool $status)
    {
        // TODO: implement
    }
}
