<?php

namespace Livit\Build\Controllers;

use App\Http\Controllers\Controller;
use Livit\Build\Repositories\PageRepository;

class AppController extends Controller
{

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }
}
