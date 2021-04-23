<?php

namespace App\Data\Response;

interface ResponseInterface
{
    public function setHeader(string $key, string $value);
    
    public function setStatusCode(int $code, string $text = null);

    public function setContent(?string $content);

    public function send();
}