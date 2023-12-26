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

    public function getAllOrderByDesc(string $itemOrderBy, int $paginate)
    {
        return $this->model->orderByDesc($itemOrderBy)->paginate($paginate);
    }

    public function search(string $keyword, int $paginate)
    {
        $posts = Post::search($keyword)->paginate($paginate);
        // Add custom parameters to pagination queries
        $posts->appends(['search' => $keyword]);
        return $posts;
    }
}
