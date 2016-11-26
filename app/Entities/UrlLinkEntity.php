<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Entities;

use Miser\Exceptions\InvalidEntityParameterException;

/**
 * Class UrlLinkEntity
 */
class UrlLinkEntity extends Entity
{
    /** @var int  Url of link. */
    protected $url;

    /**
     * @param string  $url
     */
    public function __construct(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidEntityParameterException('Invalid parameter: Url format compliant with PSR7.');
        }

        $this->url = $url;
    }
}
