<?php

namespace App\Domain\Validators;

use App\Core\Exceptions\User\InvalidLoginException;

class LoginValidator extends BaseFieldValidator
{
    /**
     * @throws InvalidLoginException
     */
    public function validate(string $value)
    {
        $validSymbols = preg_match("/^[a-zA-Z0-9-_]{3,128}$/", $value);
        if (!$validSymbols) {
            throw new InvalidLoginException(
                "Login should contain [a-zA-Z0-9-_] and length [3, 128]"
            );
        }
    }
}