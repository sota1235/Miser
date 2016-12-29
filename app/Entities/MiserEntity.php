<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Entities;

use Miser\Exceptions\InvalidEntityParameterException;

/**
 * Class Miser
 */
class MiserEntity extends Entity
{
    /** @var int  ID of the miser. */
    protected $id;

    /** @var int  Year of the day. */
    protected $year;

    /** @var int  Month of the day. */
    protected $month;

    /** @var int  Number of the day. */
    protected $day;

    /** @var bool  Miser status of the day. */
    protected $status;

    /**
     * @param int   $id
     * @param int   $year
     * @param int   $month
     * @param int   $day
     * @param bool  $status
     */
    public function __construct(int $id, int $year, int $month, int $day, bool $status)
    {
        if (!checkdate($month, $day, $year)) {
            throw new InvalidEntityParameterException('Invalid date.');
        }

        $this->id     = $id;
        $this->year   = $year;
        $this->month  = $month;
        $this->day    = $day;
        $this->status = $status;
    }
}
