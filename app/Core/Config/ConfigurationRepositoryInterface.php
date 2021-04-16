<?php

namespace App\Core\Config;

interface ConfigurationRepositoryInterface
{
    public function getConfiguration(): Configuration;
}