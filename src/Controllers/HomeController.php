<?php

namespace Eurobob\Construct\Controllers;

use App\Http\Controllers\AppController;

class HomeController extends AppController
{
    public function index()
    {
        $this->pageRepository->findByName('home');
        return view('build::pages.home.index');
    }
}
