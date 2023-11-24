<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//User
Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/post/{post_id}', [PostController::class, 'showPost'])->name('showPost');

//Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('admin.index');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    });

    Route::group(['prefix' => 'posts', 'as' => 'post.', 'middleware' => ['auth:admin',"role:admin,editor"]], function () {
        Route::get('/', [PostController::class, 'showPosts'])->name('posts');
        Route::get('/add', [PostController::class, 'addPostPage'])->name('add_post_page');
        Route::post('/add', [PostController::class, 'addPost'])->name('add_post');

        Route::get('/edit/{post_id}', [PostController::class, 'editPostPage'])->name('edit_post_page');
        Route::post('/edit_post', [PostController::class, 'editPost'])->name('edit_post');

        Route::delete('/delete_post/{post_id}', [PostController::class, 'deletePost'])->name('delete_post');
    });

    Route::group(['prefix' => 'users', 'as' => 'user.', 'middleware' => ['auth:admin', 'role:admin']], function () {
        Route::get('/', [UserController::class, 'index'])->name('users');

        Route::get('/add', [UserController::class, 'addUserPage'])->name('add_user_page');
        Route::post('/add', [UserController::class, 'addUser'])->name('add_user');

        Route::get('/edit/{user_id}', [UserController::class, 'editUserPage'])->name('edit_user_page');
        Route::post('/edit_user', [UserController::class, 'editUser'])->name('edit_user');

        Route::delete('/delete_user/{user_id}', [UserController::class, 'deleteUser'])->name('delete_user');

        Route::get('/{user_id}', [UserController::class, 'detail'])->name('detail');
    });
});
