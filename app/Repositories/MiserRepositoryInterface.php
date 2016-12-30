<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Repositories;

/**
 * Interface MiserRepositoryInterface
 */
interface MiserRepositoryInterface
{
    /**
     * @param string  $pageName
     * @param int     $year
     * @param int     $month
     * @return \Miser\Entities\MiserEntity[]
     */
    public function getMisers(string $pageName, int $year, int $month);

    /**
     * @param int   $pageId
     * @param int   $year
     * @param int   $month
     * @param int   $day
     * @param bool  $status
     * @return bool
     */
    public function addMiser(int $pageId, int $year, int $month, int $day, bool $status);
}
