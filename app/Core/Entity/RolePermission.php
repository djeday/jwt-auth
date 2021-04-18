<?php

namespace App\Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="roles_permissions")
 */
class RolePermission extends AbstractEntity
{
    /**
     * @ORM\Column(type="integer", name="role_id")
     */
    protected int $roleId;

    /**
     * @ORM\Column(type="integer", name="permission_id")
     */
    protected int $permissionId;

    public function getRoleId(): int
    {
        return $this->roleId;
    }

    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }

    public function getPermissionId(): int
    {
        return $this->permissionId;
    }

    public function setPermissionId(int $permissionId): void
    {
        $this->permissionId = $permissionId;
    }
}