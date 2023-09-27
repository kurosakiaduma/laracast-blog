<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

////Handles authenticated user requests
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Check if the user is authenticated
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Retrieve all posts
Route::get('/posts', [PostController::class, 'index']);

// Retrieve individual rocks
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

//Create new post
Route::post('/create-post', [PostController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('/categories', [CategoryController::class, 'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
