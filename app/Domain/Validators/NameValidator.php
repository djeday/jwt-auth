<?php

namespace App\Domain\Validators;

use App\Core\Exceptions\User\InvalidNameException;

class NameValidator extends BaseFieldValidator
{
    /**
     * @throws \App\Core\Exceptions\User\InvalidNameException
     */
    public function validate(string $value)
    {
        $validChars = preg_match("/^[^!@#$%^&*0-9]{2,128}$/", $value);
        if (!$validChars) {
            throw new InvalidNameException("Invalid field name", 400);
        }
    }
}