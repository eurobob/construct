<?php

namespace App\Http\Controllers;

use Eurobob\Construct\Controllers\EurobobConstructAppController;
use Eurobob\Construct\Repositories\PageRepository;
use App\Http\Controllers\Controller;
use App\User;

class AppController extends Controller
{
    use EurobobConstructAppController {
        EurobobConstructAppController::__construct as private __EurobobConstructAppControllerConstruct;
    }

    public function __construct(PageRepository $pageRepository)
    {
        $this->__EurobobConstructAppControllerConstruct($pageRepository);
    }
}
