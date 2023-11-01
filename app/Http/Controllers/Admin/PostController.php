<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Post\PostRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    const INDEX_NAV = 2;
    protected $postRepo;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index()
    {
        $posts = $this->postRepo->getAll();
        return view('index', ['posts' => $posts]);
    }

    public function show_posts()
    {
        $posts = $this->postRepo->getAllOrderByDesc();
        return view('admin.posts.posts', ['posts' => $posts, 'title' => 'Posts Management', 'index_nav' => Self::INDEX_NAV]);
    }

    public function add_post_page()
    {
        return view('admin.posts.add_post', ['title' => 'Add Post', 'index_nav' => Self::INDEX_NAV]);
    }

    public function add_post(StorePostRequest $request)
    {
        $data = $request->all();
        // Save file on public/images
        $imageName = Carbon::now()->timestamp . '_' . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);
        // Insert data on table posts
        $urlImage = 'images/' . $imageName;
        $this->postRepo->create([
            'user_id' => auth()->guard('admin')->user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $urlImage
        ]);
        return redirect()->route('posts');
    }

    public function edit_post_page($post_id)
    {
        $post = $this->postRepo->find($post_id);
        if ($post->exists()) {
            return view('admin.posts.edit_post', ['post' => $post, 'title' => 'Edit Post', 'index_nav' => Self::INDEX_NAV]);
        }
    }

    public function edit_post(StorePostRequest $request)
    {
        $data = $request->all();
        if (!isset($data['image'])) {
            $this->postRepo->update(
                $data['id'],
                [
                    'user_id' => auth()->guard('admin')->user()->id,
                    'title' => $data['title'],
                    'description' => $data['description'],
                ]
            );
        } else {
            // Save file on public/images
            $imageName = Carbon::now()->timestamp . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            // Insert data on table posts
            $urlImage = 'images/' . $imageName;
            $this->postRepo->update(
                $data['id'],
                [
                    'user_id' => auth()->guard('admin')->user()->id,
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'image' => $urlImage
                ]
            );
        }
        return redirect()->route('posts');
    }
}
