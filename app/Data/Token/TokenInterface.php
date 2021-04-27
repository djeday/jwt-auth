<?php

namespace App\Data\Token;

interface TokenInterface {
    
    public function generate(int $userId): string;

    public function validate(): bool;

    public function payload();
}