<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Repositories;

use Miser\DataAccess\Fluent\Page;
use Dietcube\Components\LoggerAwareTrait;

/**
 * Class PageRepository
 */
class PageRepository implements PageRepositoryInterface
{
    use LoggerAwareTrait;

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
        try {
            $result = !!$this->page->add($pageName);
        } catch (\Exception $e) {
            $this->logger->log($e->getMessage());
            $result = false;
        }

        return $result;
    }
}
