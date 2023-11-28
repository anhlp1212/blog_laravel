<?php

namespace App\Traits;

trait HasRole
{
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->role->name === $role;
        }
        return false;
    }
}
