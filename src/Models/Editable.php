<?php

namespace Eurobob\Construct\Models;

use Illuminate\Database\Eloquent\Model;

class Editable extends Model
{
    protected $user;

    public function __construct()
    {
        $this->user = \Auth::user();
    }

    public function text($object, $column, $permissions = null)
    {
        return $this->create_element('text', $object, $column, $permissions);
    }

    public function textarea($object, $column, $permissions = null)
    {
        return $this->create_element('textarea', $object, $column, $permissions);
    }

    private function create_element($type, $object, $column, $permissions)
    {
        if (isset($permissions) && $this->user->can($permissions)) {
            return '<span v-if="!appLoaded">'.$object->$column.'</span><editable-'.$type.' model="'.get_class($object).'" row-id="'.$object->id.'" key="'.$column.'" value="'.$object->$column.'"></editable-'.$type.'>';
        }

        return '<span>'.$object->$column.'</span>';
    }
}
