<?php

use App\Core\Routing\RouterFactory;
use App\Presentation\Controllers\UserController;

set_error_handler('App\Utils\ErrorUtil::errorHandler', E_ALL);
set_exception_handler('App\Utils\ErrorUtil::exceptionHandler');

$router = RouterFactory::create();
$router->addRoute('/api/user/register', ['POST'], UserController::class, 'signUp');
$router->addRoute('/api/user/login', ['POST'], UserController::class, 'signIn');
$router->run();
