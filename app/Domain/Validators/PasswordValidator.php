<?php

namespace App\Domain\Validators;

use App\Core\Exceptions\User\InvalidPasswordException;

class PasswordValidator extends BaseFieldValidator
{
    /**
     * @throws \App\Core\Exceptions\User\InvalidPasswordException
     */
    public function validate(string $value)
    {
        $availableChars = preg_match(
            "/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,64}$/", $value
        );
        if (!$availableChars) {
            throw new InvalidPasswordException(
                "Password should contain [a-zA-Z], lowercase, uppercase, numbers and special chars", 400
            );
        }
    }
}