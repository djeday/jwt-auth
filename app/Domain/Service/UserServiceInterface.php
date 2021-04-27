<?php

namespace App\Domain\Service;

use App\Core\Exceptions\BaseException;
use App\Data\Request\RequestInterface;
use App\Data\Token\TokenInterface;

interface UserServiceInterface
{
    /**
     * @param \App\Data\Request\RequestInterface $request
     * @throws BaseException
     */
    public function createUserFromRequest(RequestInterface $request);

    public function signIn(RequestInterface $request): array;
}