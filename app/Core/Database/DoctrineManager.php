<?php

namespace App\Core\Database;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class DoctrineManager
{
    private static EntityManagerInterface $entityManager;

    private const PATH_TO_DB_ENTITIES = '/Entity/';

    private const ANNOTATION_CONFIG = [
        'DEV_MODE' => true,
        'PROXY_DIR' => null,
        'CACHE' => null,
        'USE_SIMPLE_ANNOTATION_READER' => false
    ];

    private function __clone()
    {
    }

    private function __construct()
    {
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\DBAL\Exception
     */
    public static function create($dbHost, $dbName, $dbUser, $dbPass): EntityManagerInterface
    {
        if (empty(self::$entityManager)) {
            $config = Setup::createAnnotationMetadataConfiguration(
                [dirname(__DIR__) . self::PATH_TO_DB_ENTITIES],
                self::ANNOTATION_CONFIG['DEV_MODE'],
                self::ANNOTATION_CONFIG['PROXY_DIR'],
                self::ANNOTATION_CONFIG['CACHE'],
                self::ANNOTATION_CONFIG['USE_SIMPLE_ANNOTATION_READER']
            );
            $dbParams = [
                'host' => $dbHost,
                'user' => $dbUser,
                'dbname' => $dbName,
                'password' => $dbPass,
                'driver' => 'pdo_mysql',
                'charset' => 'utf8',
                'driverOptions' => array(
                    1002 => 'SET NAMES utf8'
                )
            ];
            self::$entityManager = EntityManager::create($dbParams, $config);
            $connection = self::$entityManager->getConnection();
            $connection->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        }
        return self::$entityManager;
    }
}