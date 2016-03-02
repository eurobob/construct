<?php

namespace Livit\Build;

use Illuminate\Database\Eloquent\Model;

class Editable extends Model
{
    protected $user;

    public function __construct()
    {
        $this->user = \Auth::user();
    }

    public function text ($object, $column, $permissions = null)
    {
        if (isset($permissions) && $this->user->can($permissions)) {
            return '<span v-if="!appLoaded">'.$object->$column.'</span><editable-text model="'.get_class($object).'" row-id="'.$object->id.'" key="'.$column.'" value="'.$object->$column.'"></editable-text>';
        }
        
        return '<span>'.$object->$column.'</span>';
    }

    public function textarea ($object, $column, $permissions = null)
    {
        if (isset($permissions) && $this->user->can($permissions)) {
            return '<span v-if="!appLoaded">'.$object->$column.'</span><editable-textarea model="'.get_class($object).'" row-id="'.$object->id.'" key="'.$column.'" value="'.$object->$column.'"></editable-textarea>';
        }
        
        return '<span>'.$object->$column.'</span>';
    }
}
