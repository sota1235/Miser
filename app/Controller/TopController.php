<?php

/**
 * @copyright (c) sota1235
 */

namespace Miser\Controller;

use Dietcube\Controller;

class TopController extends Controller
{
    public function index($page)
    {
        return $this->render('index', compact('page'));
    }
}
