<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getAllOrderByDesc();

    public function getUserRoleAdmin();

    public function getUsersForTable();
}
