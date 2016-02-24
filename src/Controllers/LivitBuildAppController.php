<?php

namespace Livit\Build\Controllers;

trait LivitBuildAppController
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
