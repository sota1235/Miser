<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Repositories;

use Miser\DataAccess\Fluent\Page;

/**
 * Class PageRepository
 */
class PageRepository implements PageRepositoryInterface
{
    /** @var Page */
    protected $page;

    /**
     * @param Page  $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * @param string  $pageName
     * @return bool
     */
    public function addPage(string $pageName)
    {
        return !!$this->page->add($pageName);
    }
}
