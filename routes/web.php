<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    // $posts = Post::all(); //same as select all from posts and pass it to variable 'posts'
    // $posts = Post::where('user_id', auth()->id())->get();  //selects all from the posts table by user_id but does not start with the perspective of the user relation

    //the auth()->user() returns an instance of the logged in user i.e User(id, name, email, password) 
    // then calls the userPosts method in the User class that defines the relationship btn User and Post
    // finally selects all from posts by user_id and latest

    $posts = []; //define an empty array so that when the user is not logged in it displays nothing on the home page
    if(auth()->check())  //checks if the user is logged in
    {
        $posts = auth()->user()->userPosts()->latest()->get(); //returns an array of posts by the user
    }

    return view('home', ['posts' => $posts]); 
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// post related routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('edit-post/{post}', [PostController::class, 'showEditScreen']);  //{post} is a dynamic parameter
Route::put('edit-post/{post}', [PostController::class, 'updatePost']); 
Route::delete('delete-post/{post}', [PostController::class, 'deletePost']); 