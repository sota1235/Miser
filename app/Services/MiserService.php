<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Services;

use Miser\Repositories\MiserRepositoryInterface;

/**
 * Class MiserService
 */
class MiserService
{
    /** @var MiserRepositoryInterface */
    protected $miser;

    /**
     * @param MiserRepositoryInterface  $miser
     */
    public function __construct(MiserRepositoryInterface $miser)
    {
        $this->miser = $miser;
    }

    /**
     * @param string  $pageName
     * @param string  $year
     * @param string  $month
     *
     * @return array
     */
    public function getMisers(string $pageName, string $year, string $month)
    {
        // TODO: implement
    }

    /**
     * @param int     $pageId
     * @param string  $year
     * @param string  $month
     * @param string  $day
     *
     * @return bool
     */
    public function addMiser(int $pageId, string $year, string $month, string $day)
    {
        // TODO: implement
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
