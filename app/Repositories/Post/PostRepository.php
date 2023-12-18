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
        return $this->model->orderByDesc('id')->paginate(10);
    }

    public function getAllPagination()
    {
        return $this->model->paginate(10);
    }
}
