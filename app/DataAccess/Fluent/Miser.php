<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\DataAccess\Fluent;

/**
 * Class Miser
 */
class Miser extends FluentDatabase
{
    /**
     * {@inheritdoc}
     */
    protected function table()
    {
        return 'misers';
    }

    /**
     * @param string  $pageName
     * @param int     $year
     * @param int     $month
     * @return \stdClass[]
     */
    public function getMisers(string $pageName, int $year, int $month)
    {
        return $this->builder()
            ->select('m.miser_id', 'm.status', 'd.year', 'd.month', 'd.day')
            ->from($this->table(), 'm')
            ->innerJoin('m', 'pages', 'p', 'm.page_id = p.page_id')
            ->innerJoin('m', 'dates', 'd', 'm.date_id = d.date_id')
            ->where('p.page_name=?')
            ->andWhere('d.year=?')
            ->andWhere('d.month=?')
            ->setParameter(0, $pageName)
            ->setParameter(1, $year)
            ->setParameter(2, $month)
            ->execute()
            ->fetchAll();
    }

    /**
     * @param string  $pageName
     * @param int     $year
     * @param int     $month
     * @return \stdClass[]
     */
    public function getMiser(string $pageName, int $year, int $month, int $day)
    {
        return $this->builder()
            ->select('m.miser_id', 'm.status', 'd.year', 'd.month', 'd.day')
            ->from($this->table(), 'm')
            ->innerJoin('m', 'pages', 'p', 'm.page_id = p.page_id')
            ->innerJoin('m', 'dates', 'd', 'm.date_id = d.date_id')
            ->where('p.page_name=?')
            ->andWhere('d.year=?')
            ->andWhere('d.month=?')
            ->andWhere('d.day=?')
            ->setParameter(0, $pageName)
            ->setParameter(1, $year)
            ->setParameter(2, $month)
            ->setParameter(3, $day)
            ->execute()
            ->fetchAll();
    }

    /**
     * @param int   $pageId
     * @param int   $year
     * @param int   $month
     * @param int   $day
     * @param bool  $status
     * @return bool
     */
    public function add(int $pageId, int $year, int $month, int $day, bool $status)
    {
        $dateId = $this->builder()
            ->select('date_id')
            ->from('dates', 'd')
            ->where('d.year=?')
            ->andWhere('d.month=?')
            ->andWhere('d.day=?')
            ->setParameter(0, $year)
            ->setParameter(0, $month)
            ->setParameter(0, $day)
            ->execute()
            ->fetch();

        if (is_null($dateId)) {
            $this->builder()
                ->insert('dates')
                ->values([
                    'year'  => '?',
                    'month' => '?',
                    'day'   => '?',
                ])
                ->setParameter(0, $year)
                ->setParameter(0, $month)
                ->setParameter(0, $day)
                ->execute()
                ->fetch();
            $dateId = $this->conn->lastInsertId();
        }

        $result = $this->builder()
            ->insert($this->table())
            ->values([
                'status'  => '?',
                'date_id' => '?',
                'page_id' => '?',
            ])
            ->setParameter(0, $status)
            ->setParameter(1, $dateId)
            ->setParameter(2, $pageId)
            ->execute();
    }
}
