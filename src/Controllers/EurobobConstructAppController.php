<?php

namespace Eurobob\Construct\Controllers;

trait EurobobConstructAppController
{

    protected $user;
    protected $appClasses;

    public function __construct($pageRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->user = \Auth::user();
        \View::share('user', $this->user);
    }
}
