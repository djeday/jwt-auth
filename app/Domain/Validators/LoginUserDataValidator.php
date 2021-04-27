<?php

namespace App\Domain\Validators;

class LoginUserDataValidator extends EntityValidator
{
    public function __construct()
    {
        parent::__construct(
            [
                'email' => new EmailValidator(),
                'password' => new PasswordValidator()
            ]
        );
    }
}