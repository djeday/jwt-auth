<?php

namespace App\Domain\Validators;

use App\Core\Exceptions\User\InvalidEmailException;

class EmailValidator extends BaseFieldValidator
{
    /**
     * @throws \App\Core\Exceptions\User\InvalidEmailException
     */
    public function validate($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException("Invalid email format");
        }
    }
}