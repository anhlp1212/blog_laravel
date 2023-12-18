<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Post\PostRepository;
use App\Repositories\User\UserRepository;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Models\Post;
use Mail;
use App\Mail\SendDemoMail;
use App\Repositories\SendMail\SendMailRepository;

class PostController extends Controller
{
    protected $postRepo;
    protected $userRepo;
    protected $sendMailRepo;

    public function __construct(PostRepository $postRepo, UserRepository $userRepo, SendMailRepository $sendMailRepo)
    {
        $this->postRepo = $postRepo;
        $this->userRepo = $userRepo;
        $this->sendMailRepo = $sendMailRepo;
    }

    public function index()
    {
        $posts = $this->postRepo->getAllPagination();
        return view('index', ['posts' => $posts]);
    }

    public function showPost($post_id)
    {
        $post = $this->postRepo->find($post_id);
        if ($post) {
            return view('post_detail', ['post' => $post, 'title' => $post->title]);
        } else {
            return abort(404);
        }
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
        try {
            if ($request->hasFile('image')) {
                $data = $request->all();
                // Save file on public/images
                $imageName = Carbon::now()->timestamp . '_' . $request->file('image')->getClientOriginalName();
                $request->image->move(public_path('images'), $imageName);
                // Insert data on table posts
                $dataInsert = [
                    'admin_id' => auth()->guard('admin')->user()->id,
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'image' => 'images/' . $imageName
                ];
                if ($this->postRepo->create($dataInsert)) {
                    // Extra 1: Khi đăng ký post thì luu vào table send_mail email của admin và set key send = 0
                    $users = $this->userRepo->getUserRoleAdmin();
                    foreach ($users as $user) {
                        $this->sendMailRepo->create(['admin_email' => $user->email]);
                    }
                    return redirect()->route('post.posts');
                    // Extra 1: when run batch send mail -> send mail to admin
                    // sail artisan app:send-emails
                }
                return redirect()->back()->with('warning', "Unable to process request.");
            }
            return redirect()->back()->with('warning', "Unable to process request. Error: Don't have file image!");
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Unable to process request. Error: ' . $e->getMessage());
        }
    }

    public function editPostPage($post_id)
    {
        $post = $this->postRepo->find($post_id);
        if ($post && auth()->guard('admin')->user()->can('update', $post)) {
            return view('admin.posts.edit_post', ['post' => $post, 'title' => 'Edit Post']);
        } else {
            return abort(404);
        }
    }

    public function editPost(StorePostRequest $request, Post $post)
    {
        try {
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
            if ($this->postRepo->update($data['id'], $dataUpdate)) {
                $post = $this->postRepo->find($data['id']);

                // Send mail to Admin
                $users = $this->userRepo->getUserRoleAdmin();
                foreach ($users as $user) {
                    Mail::to($user->email)->send(new SendDemoMail($post));
                }
                return redirect()->route('post.posts');
            }
            return redirect()->back()->with('warning', "Unable to process request.");
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Unable to process request. Error: ' . $e->getMessage());
        }
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
