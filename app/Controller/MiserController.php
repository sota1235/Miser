<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Controller;

use Dietcube\Controller;

class MiserController extends Controller
{
    /**
     * @param string  $pageName
     * @return string
     */
    public function getMisers(string $pageName)
    {
        // TODO: implement

        $data = [
        ];

        return $this->json($data);
    }

    /**
     * @param string  $pageName
     * @return string
     */
    public function postMiser(string $pageName)
    {
        // TODO: implement

        $data = [
        ];

        return $this->json($data);
    }

    /**
     * @param string  $pageName
     * @param string  $miserId
     * @return string
     */
    public function updateMiser(string $pageName, string $miserId)
    {
        // TODO: validation for $miserID. It must be integer.
        // TODO: implement

        $data = [
        ];

        return $this->json($data);
    }
}
