<?php

namespace App\Core\Request;

class RequestFactory
{
    public static function create(): SymfonyRequest
    {
        return new SymfonyRequest();
    }
}