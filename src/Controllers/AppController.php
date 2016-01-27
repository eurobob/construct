<?php

namespace Livit\Build\Controllers;

use App\Http\Controllers\Controller;
use Livit\Build\Repositories\PageRepository;
use Livit\Build\User;

class AppController extends Controller
{

    protected $user;
    protected $unauthorisedUserCount;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->user = \Auth::user();
        $this->unauthorisedUserCount = count(User::whereAuthorised(0)->get());
        \View::share('user', $this->user);
        \View::share('unauthorisedUserCount', $this->unauthorisedUserCount);
    }
}
