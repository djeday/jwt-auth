<?php

namespace App\Data\Request;

class RequestFactory
{
    public static function create(): SymfonyRequest
    {
        return new SymfonyRequest();
    }
}