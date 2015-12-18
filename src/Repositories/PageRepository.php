<?php

namespace Livit\Build\Repositories;

use Livit\Build\Page;

class PageRepository implements PageRepositoryInterface
{

    public function __construct()
    {

    }

    public function findByName($name) {
        $page = Page::where('name', $name)->first();
        if (!$page) {
            $page = new Page;
            $page->name = $name;
            $page->save();
        }
        return $page->name;
    }

}