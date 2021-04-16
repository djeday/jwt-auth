<?php

namespace App\Core\Request;

interface RequestInterface
{
    public function getHost(): string;

    public function getUri(): string;

    public function get(string $key): ?string;

}