<?php

namespace App\Core\Routing;

use App\Core\Request\SymfonyRequest;

class RouterFactory
{
    public static function create(): Router
    {
        return new Router(
            new SymfonyRequest()
        );
    }
}