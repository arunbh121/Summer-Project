<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontBaseController extends Controller
{
    function __loadDataToView($viewPath)
    {
        view()->composer($viewPath, function ($view) {
            $view->with('title', $this->title);
        });
        return $viewPath;
    }
}
