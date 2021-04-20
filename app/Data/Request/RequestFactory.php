<?php

namespace App\Data\Request;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class RequestFactory
{
    public static function create(): RequestInterface
    {
        return new Request(SymfonyRequest::createFromGlobals());
    }
}