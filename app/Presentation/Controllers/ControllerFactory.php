<?php

namespace App\Presentation\Controllers;

use App\Core\Config\ConfigurationFactory;
use App\Core\Exceptions\ControllerNotFoundException;
use App\Presentation\Views\ViewFactory;
use ReflectionClass;
use ReflectionException;

class ControllerFactory
{
    /**
     * @param string $class
     * @return AbstractController
     * @throws ReflectionException | ControllerNotFoundException
     */
    public static function create(string $class): AbstractController
    {
        if (!class_exists($class)) {
            throw new ControllerNotFoundException("Controller $class not found!", 404);
        }
        $className = (new ReflectionClass($class))->getShortName();
        return match ($className) {
            default => null,
        };
    }
}