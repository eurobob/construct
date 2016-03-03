<?php

namespace Livit\Build\Models;

use Livit\Build\Models\App;

class Page extends App
{
    protected $fillable = [
        'name'
    ];

    // public function pageElements()
    // {
    //     return $this->hasMany('Livit\Build\Models\PageElement');
    // }
}
