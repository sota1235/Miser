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
     * @return \Miser\Entities\PageEntity|null
     */
    public function getPage(string $pageName);

    /**
     * @param string  $pageName
     * @return bool
     */
    public function addPage(string $pageName);
}
