<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getAllOrderByDesc(string $itemOrderBy);

    public function getUserRoleAdmin();
}
