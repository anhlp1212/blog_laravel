<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\Admin;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    //lấy model tương ứng
    public function getModel()
    {
        return Admin::class;
    }

    public function getAllOrderByDesc()
    {
        return $this->model
            ->select('admins.id', 'admins.name', 'email', 'roles.name as role_name')
            ->join('roles', 'roles.id', '=', 'admins.role_id')
            ->orderByDesc('id')
            ->get();
    }

    public function getUserRoleAdmin()
    {
        return $this->model
            ->select('*')
            ->where('role_id', '=', 1)
            ->get();
    }
}
