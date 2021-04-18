<?php

namespace App\Domain\Validators;

class RegisterUserValidator extends EntityValidator
{
    public function __construct()
    {
        parent::__construct(
            [
                'email' => new EmailValidator(),
                'name' => new NameValidator(),
                'login' => new LoginValidator(),
                'password' => new PasswordValidator()
            ]
        );
    }
}