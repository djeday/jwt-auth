<?php

namespace App\Core\Routing;

use App\Data\Request\RequestFactory;

class RouterFactory
{
    public static function create(): Router
    {
        $request = RequestFactory::create();
        return new Router($request);
    }
}