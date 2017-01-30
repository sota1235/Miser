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
            $records = $this->miser->getMisers($pageName, $year, $month);
            $misers  = [];

            foreach ($records as $record) {
                $misers[] = new MiserEntity(
                    $record['miser_id'], $record['year'], $record['month'],
                    $record['day'], !!$record['status']
                );
            }
        } catch (\Exception $e) {
            $this->logger->log(\Psr\Log\LogLevel::ERROR, $e->getMessage());
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
            $this->logger->log(\Psr\Log\LogLevel::ERROR, $e->getMessage());
            $result = false;
        }

        return !!$result;
    }

    /**
     * @param int   $pageId
     * @param int   $miserId
     * @param bool  $status
     */
    public function updateMiser(int $pageId, int $miserId, bool $status)
    {
        // TODO: implement
    }
}
