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

    public function getAllOrderByDesc(string $itemOrderBy)
    {
        return $this->model
            ->with('role')
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
