<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PostsController;

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
});