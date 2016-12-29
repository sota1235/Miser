<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\DataAccess\Fluent;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * Class FluentDatabase
 */
abstract class FluentDatabase
{
    /** @var string */
    protected $table;

    /** @var Connection */
    protected $connection;

    /**
     * @param Connection  $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return QueryBuilder
     */
    protected function builder()
    {
        return $this->connection->createQueryBuilder();
    }
}
