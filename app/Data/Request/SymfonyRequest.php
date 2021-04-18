<?php

namespace App\Data\Request;

use Symfony\Component\HttpFoundation\Request;

class SymfonyRequest implements RequestInterface
{
    private Request $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    public function getHost(): string {
        return $this->request->getSchemeAndHttpHost();
    }

    public function getUri(): string {
        return $this->request->getRequestUri();
    }

    public function get(string $key): ?string
    {
        return $this->request->query->get($key);
    }
}