<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use App\Models\Post as Post;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.dashboard');
    }

    public function show_posts()
    {
        $posts = new Post(); //???
        $posts = $posts->get_posts();
        return view('admin.posts.posts', ['posts' => $posts, 'title' => 'Posts Management', 'index_nav' => 2, 'title_navbar' => 'Posts']);
    }

    public function add_post_page()
    {
        return view('admin.posts.add_post', ['title' => 'Add Post', 'index_nav' => 2, 'title_navbar' => 'Add Post']);
    }

    public function add_post(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'image' => 'required|image|max:5000'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if (!$request->hasFile('image')) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();;
            } else {
                $file = $request->file('image');

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $allowedfileExtension = ['jpg', 'png'];
                $check = in_array($extension, $allowedfileExtension);

                if ($check) {
                    // Save file on public/images
                    $date = Carbon::now();
                    $imagePath = public_path('images');
                    $imageName = $date->timestamp . '_' . $file->getClientOriginalName();
                    $request->image->move($imagePath, $imageName);

                    // Insert data on table posts
                    $title = $request->input('title');
                    $description = $request->input('description');
                    $urlImage = 'images/' . $imageName;

                    $data = array('title' => $title, "description" => $description, "image" => $urlImage);
                    $posts = new Post();  //???
                    $posts = $posts->add_new_post($data);

                    return redirect()
                        ->route('posts')
                        ->withErrors($validator)
                        ->withInput();
                }
            }
        }
    }

    public function edit_post_page($post_id)
    {

        $post = new Post(); //???
        $post = $post->get_posts_by_id($post_id);
        $post = $post[0];

        return view('admin.posts.edit_post', ['post' => $post, 'title' => 'Edit Post', 'index_nav' => 2, 'title_navbar' => 'Edit Post']);
    }

    public function edit_post(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|max:5000'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $post_id = $request->input('id');
            $title = $request->input('title');
            $description = $request->input('description');
            if (!$request->hasFile('image')) {
                $data = array('title' => $title, "description" => $description);
                $post = new Post(); //???
                $post->update_post_no_image($post_id, $data);

                return redirect()
                    ->route('posts')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $file = $request->file('image');

                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $allowedfileExtension = ['jpg', 'png'];
                $check = in_array($extension, $allowedfileExtension);

                if ($check) {
                    // Save file on public/images
                    $date = Carbon::now();
                    $imagePath = public_path('images');
                    $imageName = $date->timestamp . '_' . $file->getClientOriginalName();
                    $request->image->move($imagePath, $imageName);

                    // Insert data on table posts
                    $urlImage = 'images/' . $imageName;

                    $data = array('title' => $title, "description" => $description, "image" => $urlImage);
                    $post = new Post(); //???
                    $post->update_post_with_image($post_id, $data);

                    return redirect()
                        ->route('posts')
                        ->withErrors($validator)
                        ->withInput()
                        ->with(['urlImage' => $urlImage]);
                }
            }
        }
    }
}
