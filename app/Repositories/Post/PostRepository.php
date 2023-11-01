<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Post::class;
    }

    public function getAllOrderByDesc()
    {
        return $this->model->orderByDesc('id')->get();
    }
}
