<?php

namespace App\Http\Controllers;

use Livit\Build\Controllers\LivitBuildAppController;
use Livit\Build\Repositories\PageRepository;
use App\Http\Controllers\Controller;
use App\User;

class AppController extends Controller
{
    use LivitBuildAppController {
        LivitBuildAppController::__construct as private __livitBuildAppControllerConstruct;
    }

    public function __construct(PageRepository $pageRepository)
    {
        $this->__livitBuildAppControllerConstruct($pageRepository);
    }
}
