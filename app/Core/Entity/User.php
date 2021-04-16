<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected int $id;

    /**
     * @ORM\Column(type="integer", name="role_id")
     */
    protected int $roleId;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    protected string $login;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    protected string $password;

    /* @ORM\Column(type="string", length=1024)
     */
    protected string $name;

    /* @ORM\Column(type="string", length=1024)
     */
    protected string $email;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    protected string $created;

    public function getId(): int
    {
        return $this->id;
    }

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