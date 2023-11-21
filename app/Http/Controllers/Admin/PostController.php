<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Post\PostRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Post;

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

    public function showPosts()
    {
        $posts = $this->postRepo->getAllOrderByDesc();
        return view('admin.posts.posts', ['posts' => $posts, 'title' => 'Posts Management']);
    }

    public function addPostPage()
    {
        return view('admin.posts.add_post', ['title' => 'Add Post']);
    }

    public function addPost(StorePostRequest $request)
    {
        if ($request->hasFile('image')) {
            $data = $request->all();
            // Save file on public/images
            $imageName = Carbon::now()->timestamp . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            // Insert data on table posts
            $urlImage = 'images/' . $imageName;
            $this->postRepo->create([
                'admin_id' => auth()->guard('admin')->user()->id,
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $urlImage
            ]);
        }
        return redirect()->route('post.posts');
    }

    public function editPostPage($post_id)
    {
        $post = $this->postRepo->find($post_id);
        if ($post) {
            return view('admin.posts.edit_post', ['post' => $post, 'title' => 'Edit Post']);
        } else {
            return abort(404);
        }
    }

    public function editPost(StorePostRequest $request, Post $post)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }
        $data = $request->all();
        $dataUpdate = [
            'admin_id' => auth()->guard('admin')->user()->id,
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

    public function deletePost($post_id)
    {
        try {
            $post = $this->postRepo->delete($post_id);
            if ($post) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Deleted successfully!'
                ], 200);
            } else {
                return response()->json([
                    'status' => 'false',
                    'message' => 'Error'
                ], 200);
            }
        } catch (Exception $e) {
            Log::error('Caught exception: ',  $e->getMessage(), "\n");
        }
    }
}
