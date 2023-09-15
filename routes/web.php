<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    $posts = [];

    if (auth()->check()) {
        $posts = auth()->user()->getUsersPosts()->latest()->get();
    }

    return view('home', ["posts" => $posts]);
});

Route::get("/all-posts", function () {
    $posts = Post::all();
    return view("all-posts", ["posts" => $posts]);
});

Route::post('/registration', [UserController::class, "registerUser"]);

Route::post('/logout', [UserController::class, "logoutUser"]);

Route::post('/login', [UserController::class, "loginUser"]);

Route::post('/submit-post', [PostsController::class, "submitPost"]);

Route::get('/edit-post/{post}', [PostsController::class, "postEditor"]);

Route::put('/edit-post/{post}', [PostsController::class, "updatePost"]);

Route::delete('/delete-post/{post}', [PostsController::class, "deletePost"]);
