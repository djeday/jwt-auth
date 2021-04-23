<?php

namespace App\Data\Request;

interface RequestInterface
{
    public function getHost(): string;

    public function getUri(): string;

    public function getMethod(): string;

    public function get(string $key): ?string;

    public function post(string $key): ?string;
}