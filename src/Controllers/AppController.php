<?php

namespace Livit\Build\Controllers;

use App\Http\Controllers\Controller;
use Livit\Build\Repositories\PageRepository;

class AppController extends Controller
{

    protected $user;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->user = \Auth::user();
        \View::share('user', $this->user);
    }
}
