<?php

namespace App\Domain\Storage;

use App\Data\Database\Entity\AbstractEntity;

interface RepositoryInterface
{
    public function persist(AbstractEntity $entity): self;

    public function  getById(int $id): object;

    public function getByOne(
        array $conditions = []
    ): ?object;

    public function getBy(
        array $conditions = [],
        array $orderBy = [],
        string $limit = null,
        string $offset = null
    ): array;

    public function flush();
}