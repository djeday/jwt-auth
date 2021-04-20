<?php

namespace App\Data\Response;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class ResponseFactory
{
    public static function create(): ResponseInterface {
        return new Response(new SymfonyResponse());
    }
}