<?php

namespace Livit\Build\Controllers\Admin;

use Illuminate\Http\Request;
use Livit\Build\Requests;
use App\Http\Controllers\Controller;

class SinkController extends Controller
{

    public function index()
    {
        return view('build::admin.sink.index');
    }
}
