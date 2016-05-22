<?php

namespace Eurobob\Construct\Models;

use Eurobob\Construct\Models\App;

class Page extends App
{
    protected $fillable = [
        'name'
    ];

    // public function pageElements()
    // {
    //     return $this->hasMany('Eurobob\Construct\Models\PageElement');
    // }
}
