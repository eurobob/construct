<?php

namespace Livit\Build\Controllers;

use Illuminate\Http\Request;
use Livit\Build\Requests;
use Livit\Build\Controllers\AppController;

class HomeController extends AppController
{
    public function index()
    {
        return view('build::pages.home.index');
    }
}
