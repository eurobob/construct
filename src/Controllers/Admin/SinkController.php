<?php

namespace Eurobob\Construct\Controllers\Admin;

use Illuminate\Http\Request;
use Eurobob\Construct\Requests;
use App\Http\Controllers\Controller;

class SinkController extends Controller
{

    public function index()
    {
        return view('construct::admin.sink.index');
    }
}
