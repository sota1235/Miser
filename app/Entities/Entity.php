<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Entities;

use Miser\Exceptions\InvalidEntityParameterException;

/**
 * Class Entity
 */
abstract class Entity
{
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
        $reflect = new \ReflectionClass($this);
        $properties = $reflect->getProperties(\ReflectionProperty::IS_PROTECTED);

        $array = [];

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($this);
        }

        return $array;
    }
}
