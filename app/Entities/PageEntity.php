<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Entities;

/**
 * Class Page
 */
class PageEntity extends Entity
{
    /** @var int  ID of the page. */
    protected $id;

    /** @var int  Name of the page. */
    protected $name;

    /** @var int  Created time of the page. */
    protected $created;

    /**
     * @param int     $id
     * @param string  $name
     * @param string  $created
     */
    public function __construct(int $id, string $name, string $created)
    {
        $this->id      = $id;
        $this->name    = $name;
        $this->created = $created;
    }
}
