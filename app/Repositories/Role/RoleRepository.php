<?php

namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use App\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Role::class;
    }
}
