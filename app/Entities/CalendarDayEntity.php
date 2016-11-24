<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Entities;

use Miser\Exceptions\InvalidEntityParameterException;

/**
 * Class CalendarDayEntity
 */
class CalendarDayEntity
{
    /** @var int  Number of the day. */
    protected $day;

    /** @var bool  Is the day current day. */
    protected $isCurrent;

    /** @var int  Unix timestamp. */
    protected $timestamp;

    /**
     * @param int     $day
     * @param bool    $isCurrent
     * @param string  $timestamp
     */
    public function __construct(int $day, bool $isCurrent, int $timestamp)
    {
        if ($day < 1 || $day > 31) {
            throw new InvalidEntityParameterException('Invalid parameter: day should be between 1 to 31.');
        }

        if ($timestamp < 0) {
            throw new InvalidEntityParameterException('Invalid parameter: timestamp should be a positive number.');
        }

        $this->day       = $day;
        $this->isCurrent = $isCurrent;
        $this->timestamp = $timestamp;
    }

    /**
     * @param string  $key
     *
     * @return mixed
     */
    public function __get(string $key)
    {
        return $this->{$key};
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'day'       => $this->day,
            'isCurrent' => $this->isCurrent,
            'timestamp' => $this->timestamp,
        ];
    }
}
