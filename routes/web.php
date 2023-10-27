<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PostsController;
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
Route::get('/', [PostsController::class, 'index'])->name('index');

Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');

    Route::middleware('auth:admin')->group(function (){
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    });

    Route::get('/posts', [HomeController::class, 'show_posts'])->name('posts');
    Route::get('/posts/add', [HomeController::class, 'add_post_page'])->name('add_post_page');
    Route::post('/posts/add', [HomeController::class, 'add_post'])->name('add_post');

    Route::get('/posts/edit/{post_id}', [HomeController::class, 'edit_post_page'])->name('edit_post_page');
    Route::post('/posts/edit_post', [HomeController::class, 'edit_post'])->name('edit_post');
});