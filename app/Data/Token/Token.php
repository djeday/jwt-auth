<?php

namespace App\Data\Token;

use Firebase\JWT\JWT;

class Token implements TokenInterface
{
    private string $secretKey;

    private array $payload;

    public function __construct(string $jwtSecret)
    {
        $this->secretKey = $jwtSecret;
        $iat = time();
        $this->payload = [
            "iss" => 'http://localhost:8080',   // издатель токена  
            "iat" => $iat,                      // время, когда был создан токен
            "nbf" => $iat,                      // срок, до которого токен не действителен
            "exp" => 30 * 60 * 1000             // срок действия токена
        ];
    }

    public function generate(int $userId): string {
        $this->payload["userId"] = $userId;
        return JWT::encode($this->payload, $this->secretKey);
    }

    public function payload(): array {
        return $this->payload;
    }

    public function validate(): bool {
        return true;
    }
}