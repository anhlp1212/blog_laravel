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
        $posts = $this->postRepo->getAllOrderByDesc();
        return view('admin.posts.posts', ['posts' => $posts, 'title' => 'Posts Management']);
    }

    public function add_post_page()
    {
        return view('admin.posts.add_post', ['title' => 'Add Post']);
    }

    public function add_post(StorePostRequest $request)
    {
        if ($request->hasFile('image')) {
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
        }
        return redirect()->route('post.posts');
    }

    public function edit_post_page($post_id)
    {
        $post = $this->postRepo->find($post_id);
        if ($post) {
            return view('admin.posts.edit_post', ['post' => $post, 'title' => 'Edit Post']);
        } else {
            return abort(404);
        }
    }

    public function edit_post(StorePostRequest $request)
    {
        $data = $request->all();
        $dataUpdate = [
            'user_id' => auth()->guard('admin')->user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
        ];
        if ($request->hasFile('image')) {
            // Save file on public/images
            $imageName = Carbon::now()->timestamp . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            // Insert data on table posts
            $dataUpdate['image'] = 'images/' . $imageName;
        }
        $this->postRepo->update(
            $data['id'],
            $dataUpdate
        );
        return redirect()->route('post.posts');
    }

    public function delete_post($post_id)
    {
        $post = $this->postRepo->delete($post_id);
        if ($post) {
            return true;
        }
        return abort(404);
    }
}
