<?php

use App\Core\Routing\RouterFactory;

set_error_handler('App\Utils\ErrorUtil::errorHandler', E_ALL);
set_exception_handler('App\Utils\ErrorUtil::exceptionHandler');

$router = RouterFactory::create();
$router->run();
