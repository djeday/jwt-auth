<?php

namespace App\Presentation\Controllers;

use App\Core\Exceptions\ActionNotFoundException;

abstract class BaseController
{
    /**
     * @param string $name
     * @param array $arguments
     * @throws ActionNotFoundException
     */
    public function __call(string $name, array $arguments)
    {
        throw new ActionNotFoundException("Action $name Not Found.", 404);
    }
}