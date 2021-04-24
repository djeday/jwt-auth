<?php

namespace App\Domain\Service;

use App\Core\Entity\User\UserCredentials;
use App\Core\Exceptions\User\UserException;
use App\Data\Mapper\UserCredentialsToUserMapper;
use App\Data\Request\RequestInterface;
use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Validators\RegisterUserValidator;
use App\Utils\StringUtil;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUserFromRequest(RequestInterface $request) {

        $userCredentials = new UserCredentials();
        $userCredentials->setName(StringUtil::process($request->post('name')));
        $userCredentials->setEmail(StringUtil::process($request->post('email')));
        $userCredentials->setLogin(StringUtil::process($request->post('login')));
        $userCredentials->setPassword(StringUtil::process($request->post('password')));

        $userValidator = new RegisterUserValidator();
        $userValidator->validate($userCredentials);

        $userAlreadyExist = $this->userRepository->getByOne(['email' => $userCredentials->getEmail()]);
        if (!empty($userAlreadyExist)) {
            throw new UserException('User already exists.', 400);
        }

        $userCredentialsToUserMapper = new UserCredentialsToUserMapper();
        $user = $userCredentialsToUserMapper->map($userCredentials);
        $this->userRepository->persist($user)->flush();
    }
}