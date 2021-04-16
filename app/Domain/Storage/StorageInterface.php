<?php

namespace App\Domain\Storage;

interface StorageInterface
{
    public function findAll(string $entityName): array;

    public function create(string $entityName, array $data);

    public function update(string $entityName, array $data, int $id);

    public function delete(string $entityName, int $id);
}