<?php

namespace App\Data\Response;

interface ResponseInterface
{
    public function setHeader(string $key, string $value);
    
    public function setStatusCode(int $code, ?string $text);

    public function setContent(?string $content);

    public function send();
}