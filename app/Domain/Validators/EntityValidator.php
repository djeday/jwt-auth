<?php

namespace App\Domain\Validators;

class EntityValidator
{
    /**
     * @var \App\Domain\Validators\BaseFieldValidator[]
     */
    protected array $fieldValidatorList;

    public function __construct(array $array)
    {
        $this->fieldValidatorList = $array;
    }

    public function validate(object $entity) {
        foreach ($this->fieldValidatorList as $key => $validator) {
            $fieldName = 'get' . lcfirst($key);
            $validator->validate($entity->$fieldName());
        }
    }
}