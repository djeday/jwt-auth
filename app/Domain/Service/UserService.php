<?php

namespace App\Domain\Service;

use App\Core\Entity\User\UserCredentials;
use App\Core\Exceptions\User\AuthException;
use App\Data\Mapper\UserCredentialsToUserMapper;
use App\Data\Request\RequestInterface;
use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Validators\RegisterUserValidator;
use App\Domain\Validators\LoginUserDataValidator;
use App\Utils\StringUtil;
use App\Data\Token\TokenInterface;
use Exception;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    private TokenInterface $token;

    public function __construct(UserRepositoryInterface $userRepository, TokenInterface $token)
    {
        $this->userRepository = $userRepository;
        $this->token = $token;
    }

    public function createUserFromRequest(RequestInterface $request) {

        $userCredentials = new UserCredentials();
        $userCredentials->setName(StringUtil::process($request->post('name')));
        $userCredentials->setEmail(StringUtil::process($request->post('email')));
        $userCredentials->setLogin(StringUtil::process($request->post('login')));
        $userCredentials->setPassword(StringUtil::process($request->post('password')));

        $userValidator = new RegisterUserValidator();
        $userValidator->validate($userCredentials);

        $userInfo = $this->userRepository->getByOne(['email' => $userCredentials->getEmail()]);
        if (!empty($userInfo)) {
            throw new AuthException('User already exists.', 400);
        }

        $userCredentialsToUserMapper = new UserCredentialsToUserMapper();
        $user = $userCredentialsToUserMapper->map($userCredentials);
        $this->userRepository->persist($user)->flush();
    }

    public function signIn(RequestInterface $request): array {
        $userCredentials = new UserCredentials();
        $userCredentials->setEmail(StringUtil::process($request->post('email')));
        $userCredentials->setPassword(StringUtil::process($request->post('password')));

        $userValidator = new LoginUserDataValidator();
        $userValidator->validate($userCredentials);
        $user = $this->userRepository->findUserByEMail($userCredentials->getEmail());

        if (!password_verify($userCredentials->getPassword(), $user->getPassword())) {
            throw new AuthException("Incorect password.", 401);
        }
        
        return [
            'jwt' => $this->token->generate($user->getId()),
            'expires_in' => $this->token->payload()['exp']
        ];
    }

    public function validateToken(RequestInterface $request) {
        $authorizationHeader = $request->getHeader("Authorization");
        if (!$authorizationHeader) {
            throw new AuthException("Token not found in request.", 400);
        }
        $jwt = substr($authorizationHeader, 7);
        try {
            $this->token->validate($jwt);
        } catch(Exception $tokenException) {
            throw new AuthException($tokenException->getMessage(), 401);
        }
    }
}