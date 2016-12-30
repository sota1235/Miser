<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\DataAccess\Fluent;

/**
 * Class Page
 */
class Page extends FluentDatabase
{
    /**
     * {@inheritdoc}
     */
    protected function table()
    {
        return 'pages';
    }

    /**
     * @param string  $pageName
     * @return \stdClass[]
     */
    public function getByPageName(string $pageName)
    {
        return $this->builder()
            ->select('*')
            ->from($this->table(), 'p')
            ->where('p.page_name=?')
            ->setParameter(0, $pageName)
            ->execute()
            ->fetch();
    }

    /**
     * @param string  $pageName
     * @return bool
     */
    public function add(string $pageName)
    {
        $result = $this->builder()
            ->insert($this->table())
            ->values([
                'page_name' => '?',
            ])
            ->setParameter(0, $pageName)
            ->execute();

        return $result;
    }
}
