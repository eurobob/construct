<?php

namespace Livit\Build\Controllers;

use Livit\Build\Controllers\AppController;

class HomeController extends AppController
{
    public function index()
    {
        $this->pageRepository->findByName('home');
        return view('build::pages.home.index');
    }

    public function unauthorised()
    {
        $this->pageRepository->findByName('unauthorised');
        return view('build::pages.home.unauthorised');
    }
}
