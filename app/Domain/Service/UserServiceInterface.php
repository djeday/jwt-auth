<?php

namespace App\Domain\Service;

use App\Data\Request\RequestInterface;

interface UserServiceInterface
{
    public function createUserFromRequest(RequestInterface $request);
}