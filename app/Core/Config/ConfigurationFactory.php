<?php

namespace App\Core\Config;

class ConfigurationFactory
{
    private static ConfigurationRepository $instance;

    private function __clone()
    {
    }

    public static function create(): ConfigurationRepository
    {
        if (empty(self::$instance)) {
            self::$instance = new ConfigurationRepository();
        }
        return self::$instance;
    }
}