<?php

namespace App\Data\Token;

interface TokenInterface {
    
    public function generate(int $userId): string;

    public function validate(string $jwt): object;

    public function payload();
}