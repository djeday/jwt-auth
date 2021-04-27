<?php

namespace App\Core\Config;

class ConfigurationRepository implements ConfigurationRepositoryInterface
{
    public function getConfiguration(): Configuration
    {
        $configuration = new Configuration();
        $configuration->setTemplateDir(getenv('TEMPLATE_DIR'));
        $configuration->setAppUrl(getenv('APP_URL'));
        $configuration->setJwtSecret(getenv('JWT_SECRET'));
        $configuration->setDbHost(getenv('DB_HOST'));
        $configuration->setDbName(getenv('DB_DATABASE'));
        $configuration->setDbUser(getenv('DB_USERNAME'));
        $configuration->setDbPass(getenv('DB_PASSWORD'));

        return $configuration;
    }
}