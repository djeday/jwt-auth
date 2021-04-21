<?php

use App\Core\Routing\RouterFactory;
use App\Presentation\Controllers\UserController;

set_error_handler('App\Utils\ErrorUtil::errorHandler', E_ALL);
set_exception_handler('App\Utils\ErrorUtil::exceptionHandler');

$router = RouterFactory::create();
$router->addRoute('/api/user/register', UserController::class, 'signUp');
$router->run();
