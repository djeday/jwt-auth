<?php

namespace App\Data\Repository;

use App\Data\Database\Entity\User;
use App\Core\Exceptions\User\UserException;
use App\Data\Database\Entity\AbstractEntity;
use App\Data\Storage\Repository\AbstractDoctrineRepository;
use App\Domain\Repository\UserRepositoryInterface;

class UserRepository extends AbstractDoctrineRepository implements UserRepositoryInterface
{
    public function getEntityClass(): string
    {
        return User::class;
    }

    public function findUserByEMail(string $email): ?AbstractEntity {
        $userInfo = $this->getByOne(['email' => $email]);
        if (empty($userInfo)) {
            throw new UserException('Email not found.', 400);
        }
        return $userInfo;
    }
}