<?php

namespace App\Data\Mapper;

use App\Core\Entity\User\UserCredentials;
use App\Data\Database\Entity\User;

class UserCredentialsToUserMapper
{
    public function map(UserCredentials $userCredentials): User
    {
        $user = new User();
        $user->setEmail($userCredentials->getEmail());
        $user->setPassword(password_hash($userCredentials->getPassword(), PASSWORD_BCRYPT));
        $user->setLogin($userCredentials->getLogin());
        $user->setName($userCredentials->getName());

        return $user;
    }
}