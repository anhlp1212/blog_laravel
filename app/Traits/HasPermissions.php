<?php

namespace App\Traits;

use App\Models\Role;

trait HasPermissions
{
    protected $permissionList = null;

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->role->name === $role ? true : false;
        }
        return false;
    }

    public function hasPermission($permission = null)
    {
        if (is_null($permission)) {
            return $this->getPermissions()->count() > 0;
        }

        if (is_string($permission)) {
            return $this->getPermissions()->contains('name', $permission);
        }

        return false;
    }

    private function getPermissions()
    {
        if ($this->role) {
            if (!$this->role->relationLoaded('permissions')) {
                $this->role->load('permissions');
            }

            $this->permissionList = $this->role->permissions->flatten();
        }

        return $this->permissionList ?? collect();
    }
}
