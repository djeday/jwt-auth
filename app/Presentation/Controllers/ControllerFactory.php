<?php

namespace App\Presentation\Controllers;

use App\Core\Config\ConfigurationFactory;
use App\Core\Exceptions\ControllerNotFoundException;
use App\Data\Database\DoctrineManager;
use App\Data\Repository\UserRepository;
use App\Data\Request\RequestFactory;
use App\Data\Response\ResponseFactory;
use App\Domain\Service\UserService;
use ReflectionClass;
use ReflectionException;
use App\Data\Token\Token;

class ControllerFactory
{
    /**
     * @param string $class
     * @return \App\Presentation\Controllers\AbstractController
     * @throws \App\Core\Exceptions\ControllerNotFoundException
     * @throws ReflectionException
     */
    public static function create(string $class): AbstractController
    {
        if (!class_exists($class)) {
            throw new ControllerNotFoundException("Controller $class Not Found.", 404);
        }
        $className = (new ReflectionClass($class))->getShortName();
        $controller = 'create' . $className;

        return self::$controller();
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\DBAL\Exception
     */
    public static function createUserController(): AbstractUserController
    {
        $request = RequestFactory::create();
        $response = ResponseFactory::create();
        $configurationRepository = ConfigurationFactory::create();
        $globalConfiguration = $configurationRepository->getConfiguration();

        $entityManager = DoctrineManager::create(
            $globalConfiguration->getDbHost(),
            $globalConfiguration->getDbName(),
            $globalConfiguration->getDbUser(),
            $globalConfiguration->getDbPass()
        );
        $token = new Token($globalConfiguration->getJwtSecret());
        
        $userRepository = new UserRepository($entityManager);
        $userService = new UserService($userRepository, $token);
        return new UserController($request, $response, $userService);
    }
}