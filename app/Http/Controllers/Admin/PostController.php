<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Post\PostRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
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
        $posts = $this->postRepo->getAllOrderByDESC();
        return view('admin.posts.posts', ['posts' => $posts]);
    }

    public function add_post_page()
    {
        return view('admin.posts.add_post');
    }

    public function add_post(StorePostRequest $request)
    {
        // Save file on public/images
        $imageName = Carbon::now()->timestamp . '_' . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);

        // Insert data on table posts
        $urlImage = 'images/' . $imageName;
        $this->postRepo->create([
            'user_id' => 1,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $urlImage
        ]);
        
        return redirect()->route('posts');
    }
}
