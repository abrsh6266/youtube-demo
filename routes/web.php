<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    $posts = auth()->user()->usersPosts()->latest()->get();
    //$posts = Post::where('user_id',auth()->id())->get();
    return view('home',['posts'=> $posts]);
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//posts
Route::post('/create-post', [postController::class, 'createPost']);