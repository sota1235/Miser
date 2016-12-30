<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Repositories;

use Miser\Entities\PageEntity;
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
     * @return \Miser\Entities\PageEntity|null
     */
    public function getPage(string $pageName)
    {
        try {
            $result = $this->page->getByPageName($pageName);

            if (!$result) {
                return null;
            }

            return new PageEntity(
                $result['page_id'], $result['page_name'], $result['created']
            );
        } catch (\Exception $e) {
            $this->logger->log($e->getMessage());
            return null;
        }
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
