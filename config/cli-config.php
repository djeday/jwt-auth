<?php

require __DIR__ . '/load-config.php';

use App\Core\Config\ConfigurationFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Data\Database\DoctrineManager;

$configurationRepository = ConfigurationFactory::create();
$configurations = $configurationRepository->getConfiguration();
$entityManager = DoctrineManager::create(
    $configurations->getDbHost(),
    $configurations->getDbName(),
    $configurations->getDbUser(),
    $configurations->getDbPass()
);

return ConsoleRunner::createHelperSet($entityManager);