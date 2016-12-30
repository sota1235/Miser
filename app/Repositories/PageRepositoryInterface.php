<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Repositories;

/**
 * Interface PageRepositoryInterface
 */
interface PageRepositoryInterface
{
    /**
     * @param string  $pageName
     * @return bool
     */
    public function addPage(string $pageName);
}
