<?php

namespace App\Data\Request;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request implements RequestInterface
{
    private SymfonyRequest $request;

    public function __construct(SymfonyRequest $request)
    {
        $this->request = $request;
    }

    public function getHost(): string {
        return $this->request->getSchemeAndHttpHost();
    }

    public function getUri(): string {
        return $this->request->getRequestUri();
    }

    public function getMethod(): string {
        return $this->request->getMethod();
    }

    public function get(string $key): ?string
    {
        return $this->request->get($key);
    }

    public function post(string $key): ?string
    {
        return $this->request->request->get($key);
    }

    public function getHeader(string $key): ?string 
    {
        return $this->request->headers->get($key);
    }
}