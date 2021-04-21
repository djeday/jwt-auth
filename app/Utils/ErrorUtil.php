<?php

namespace App\Utils;

use Throwable;
use ErrorException;

class ErrorUtil
{
    public static function exceptionHandler(Throwable $exception)
    {
        if (getenv('APP_DEBUG')) {
            include dirname(__DIR__, 2) . '/template/views/errors/debug.php';
        } else {
            $error_code = $exception->getCode() ?? 500;
            header("HTTP/2 " . $error_code);
        }
    }

    /**
     * @throws ErrorException
     */
    public static function errorHandler($errNo, $errStr, $errFile, $errLine)
    {
        throw new ErrorException($errStr, 0, $errNo, $errFile, $errLine);
    }
}