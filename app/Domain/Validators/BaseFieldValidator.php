<?php

namespace App\Domain\Validators;

abstract class BaseFieldValidator
{
    abstract public function validate(string $value);
}