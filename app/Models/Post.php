<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function get_posts()
    {
        $posts = Post::orderByDesc('posts.id')->get();
        return $posts;
    }

    public function add_new_post($data_post)
    {
        $post = new Post;
        $post->title = $data_post['title'];
        $post->description = $data_post['description'];
        $post->image = $data_post['image'];
        $post->user_id = 1;
        $post->save();
    }

    public function get_posts_by_id($post_id)
    {
        $post = Post::where('id', '=', intval($post_id))->get();
        return $post;
    }

    public function update_post_no_image($post_id, $data_post)
    {
        Post::where('id', '=', intval($post_id))
            ->update(['title' => $data_post['title'], 'description' => $data_post['description']]);
    }

    public function update_post_with_image($post_id, $data_post)
    {
        Post::where('id', '=', intval($post_id))
            ->update(['title' => $data_post['title'], 'description' => $data_post['description'], 'image' => $data_post['image']]);
    }
}
