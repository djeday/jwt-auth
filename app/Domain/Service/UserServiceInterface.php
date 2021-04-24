<?php

namespace App\Domain\Service;

use App\Core\Exceptions\BaseException;
use App\Data\Request\RequestInterface;

interface UserServiceInterface
{
    /**
     * @param \App\Data\Request\RequestInterface $request
     * @throws BaseException
     */
    public function createUserFromRequest(RequestInterface $request);
}