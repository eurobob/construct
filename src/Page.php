<?php

namespace Livit\Build;

use Livit\Build\App;

class Page extends App
{
    protected $fillable = [
        'name'
    ];

    // public function pageElements()
    // {
    //     return $this->hasMany('Livit\Build\PageElement');
    // }
}
