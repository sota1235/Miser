<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Repositories;

use Miser\Entities\MiserEntity;
use Miser\DataAccess\Fluent\Miser;
use Dietcube\Components\LoggerAwareTrait;

/**
 * Class MiserRepository
 */
class MiserRepository implements MiserRepositoryInterface
{
    use LoggerAwareTrait;

    /** @var Miser */
    protected $miser;

    /**
     * @param Miser  $miser
     */
    public function __construct(Miser $miser)
    {
        $this->miser = $miser;
    }

    /**
     * @param string  $pageName
     * @param int     $year
     * @param int     $month
     * @return \Miser\Entities\MiserEntity[]
     */
    public function getMisers(string $pageName, int $year, int $month)
    {
        try {
            $misers = $this->miser->getMisers($pageName, $year, $month);
        } catch (\Exception $e) {
            $this->logger->log($e->getMessage());
            $misers = [];
        }

        return $misers;
    }

    /**
     * @param int   $pageId
     * @param int   $year
     * @param int   $month
     * @param int   $day
     * @param bool  $status
     * @return bool
     */
    public function addMiser(int $pageId, int $year, int $month, int $day, bool $status)
    {
        try {
            $result = $this->miser->add($pageId, $year, $month, $day, $status);
        } catch (\Exception $e) {
            $this->logger->log($e->getMessage());
            $result = false;
        }

        return !!$result;
    }
}
