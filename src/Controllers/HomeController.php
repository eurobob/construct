<?php

namespace Livit\Build\Controllers;

use Livit\Build\Controllers\AppController;


class HomeController extends AppController
{
    public function index()
    {
        $page = $this->pageRepository->findByName('test');
        return view('build::pages.home.index', ['page' => $page]);
    }
}
