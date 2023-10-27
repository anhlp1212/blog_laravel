<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.dashboard');
    }

    public function show_posts()
    {
        $posts = DB::table('posts')->select('*')->orderByDesc('posts.id');
        $posts = $posts->get();
        return view('admin.posts.posts', ['posts' => $posts]);
    }

    public function add_post_page()
    {
        return view('admin.posts.add_post');
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

                    $data = array('title' => $title, "description" => $description, "image" => $urlImage, "user_id" => 1);
                    DB::table('posts')->insert($data);

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

        $post = DB::table('posts')
                ->select('*')
                ->where('posts.id',intval($post_id));
        $post = $post->get();
        $post = $post[0];

        return view('admin.posts.edit_post', ['post' => $post]);
    }
}
