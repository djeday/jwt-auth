<?php

namespace App\Data\Database\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends AbstractEntity
{
    /**
     * @ORM\Column(type="integer", name="role_id")
     */
    protected int $roleId;

    /**
     * @ORM\Column(type="string", length=128)
     */
    protected string $login;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    protected string $password;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    protected string $name;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    protected string $email;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    protected string $created;

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): void
    {
        $this->created = $created;
    }
}