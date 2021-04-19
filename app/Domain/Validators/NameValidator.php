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
        $numbers = preg_match("/[0-9]/", $value);
        $specialChars = preg_match("/[!@#$%^&*]/", $value);
        if ($numbers || $specialChars) {
            throw new InvalidNameException("Invalid field name");
        }
    }
}