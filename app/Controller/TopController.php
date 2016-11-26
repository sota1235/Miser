<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Controller;

use Dietcube\Controller;

class TopController extends Controller
{
    public function index()
    {
        return $this->render('index');
    }
}
