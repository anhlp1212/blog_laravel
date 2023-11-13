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
        return $this->model->orderByDesc('id')->get();
    }
}
