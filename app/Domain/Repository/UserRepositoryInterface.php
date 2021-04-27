<?php

namespace App\Domain\Repository;

use App\Domain\Storage\RepositoryInterface;
use App\Data\Database\Entity\AbstractEntity;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function findUserByEMail(string $email): ?AbstractEntity;
}