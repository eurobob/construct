<?php

namespace Eurobob\Construct\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EditableController extends Controller
{
    public function update($model, $id, Request $request)
    {
        $object = $model::find($id);
        $object->fill($request->all());
        $object->save();
    }
}
