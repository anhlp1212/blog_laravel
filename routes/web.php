<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Http\Request;

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

//Admin
Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    });

    Route::get('/posts', [PostController::class, 'show_posts'])->name('posts');
    Route::get('/posts/add', [PostController::class, 'add_post_page'])->name('add_post_page');
    Route::post('/posts/add', [PostController::class, 'add_post'])->name('add_post');
});
