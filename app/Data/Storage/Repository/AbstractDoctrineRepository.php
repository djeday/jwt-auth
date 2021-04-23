<?php

namespace App\Data\Storage\Repository;

use App\Data\Database\Entity\AbstractEntity;
use App\Domain\Storage\RepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractDoctrineRepository implements RepositoryInterface
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function persist(AbstractEntity $entity): self
    {
        $this->entityManager->persist($entity);
        return $this;
    }

    public function getById(int $id): object
    {
        return $this->entityManager->find($this->getEntityClass(), $id);
    }

    public function getByOne(
        array $conditions = []
    ): ?object
    {
        $repository = $this->entityManager->getRepository($this->getEntityClass());

        return $repository->findOneBy($conditions);
    }

    /**
     * @return AbstractEntity[]
     */
    public function getBy(
        array $conditions = [],
        array $orderBy = [],
        string $limit = null,
        string $offset = null
    ): array
    {
        $repository = $this->entityManager->getRepository($this->getEntityClass());

        return $repository->findBy($conditions, $orderBy, $limit, $offset);
    }

    public function flush()
    {
        $this->entityManager->flush();
        $this->entityManager->clear();
    }

    abstract public function getEntityClass();
}