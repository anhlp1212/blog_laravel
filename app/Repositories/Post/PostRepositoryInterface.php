<?php

namespace App\Repositories\Post;

use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getAllOrderByDesc(string $itemOrderBy, int $paginate);

    public function search(string $keyword, int $paginate);
}
