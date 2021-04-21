<?php

namespace App\Presentation\Controllers;

use App\Data\Request\RequestInterface;
use App\Data\Response\ResponseInterface;
use App\Domain\Repository\UserRepositoryInterface;

class UserController implements AbstractUserController
{
    private RequestInterface $request;

    private ResponseInterface $response;

    private UserRepositoryInterface $userRepository;

    public function __construct(
        RequestInterface $request,
        ResponseInterface $response,
        UserRepositoryInterface $userRepository
    )
    {
        $this->request = $request;
        $this->response = $response;
        $this->userRepository = $userRepository;
    }

    public function signIn() {
    }

    public function signUp() {
    }
}