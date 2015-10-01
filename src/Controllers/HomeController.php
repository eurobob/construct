<?php

namespace Livit\Build\Controllers;

use Illuminate\Http\Request;
use Livit\Build\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('build::pages.home.index');
    }
}
