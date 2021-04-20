<?php

namespace App\Data\Response;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class Response implements ResponseInterface
{
    private SymfonyResponse $response;

    public function __construct(SymfonyResponse $response)
    {
        $this->response = $response;
    }

    public function setHeader(string $key, string $value) {
        $this->response->headers->set($key, $value);
    }

    public function setStatusCode(int $code, string $text = null)
    {
        $this->response->setStatusCode($code, $text)->send();
    }

    public function setContent(?string $content)
    {
        $this->response->setContent($content);
    }

    public function send() {
        $this->response->send();
    }
}