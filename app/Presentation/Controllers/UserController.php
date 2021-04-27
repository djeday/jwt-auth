<?php

namespace App\Presentation\Controllers;

use App\Core\Exceptions\BaseException;
use App\Data\Request\RequestInterface;
use App\Data\Response\ResponseInterface;
use App\Domain\Service\UserServiceInterface;

class UserController extends BaseController implements AbstractUserController
{
    private RequestInterface $request;

    private ResponseInterface $response;

    private UserServiceInterface $userService;

    public function __construct(
        RequestInterface $request,
        ResponseInterface $response,
        UserServiceInterface $userService
    )
    {
        $this->request = $request;
        $this->response = $response;
        $this->userService = $userService;
    }

    private function jsonResponse(array $data, int $statusCode): void
    {
        $this->response->setContent(json_encode($data, JSON_PRETTY_PRINT));
        $this->response->setStatusCode($statusCode);
        $this->response->send();
    }

    public function signIn()
    {
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Content-type', 'application/json; charset=utf-8');
        $this->response->setHeader('Access-Control-Allow-Methods', 'POST');
        try {
            $tokenInfo = $this->userService->signIn($this->request);

            $this->jsonResponse(
                $tokenInfo, 200
            );
        } catch (BaseException $exception) {
            $this->jsonResponse(
                ['message' => $exception->getMessage()], $exception->getCode()
            );
        }
    }

    public function signUp()
    {
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Content-type', 'application/json; charset=utf-8');
        $this->response->setHeader('Access-Control-Allow-Methods', 'POST');
        try {
            $this->userService->createUserFromRequest($this->request);

            $this->jsonResponse(
                ['message' => 'User created.'], 201
            );
        } catch (BaseException $exception) {
            $this->jsonResponse(
                ['message' => $exception->getMessage()], $exception->getCode()
            );
        }
    }

    public function validateToken() {
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Content-type', 'application/json; charset=utf-8');
        $this->response->setHeader('Access-Control-Allow-Methods', 'GET');
        $this->response->setHeader('Access-Control-Allow-Headers', 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
        try {
            $this->userService->validateToken($this->request);

            $this->jsonResponse(
                ['message' => 'Token valid.'], 200
            );
        } catch (BaseException $exception) {
            $this->jsonResponse(
                ['message' => $exception->getMessage()], $exception->getCode()
            );
        }
    }
}