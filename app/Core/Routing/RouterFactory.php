<?php

namespace App\Core\Routing;

use App\Data\Request\SymfonyRequest;

class RouterFactory
{
    public static function create(): Router
    {
        return new Router(
            new SymfonyRequest()
        );
    }
}