<?php

namespace App\Data\Repository;

use App\Core\Entity\User;
use App\Data\Storage\Repository\AbstractDoctrineRepository;
use App\Domain\Repository\UserRepositoryInterface;

class UserRepository extends AbstractDoctrineRepository implements UserRepositoryInterface
{
    public function getEntityClass(): string
    {
        return User::class;
    }
}