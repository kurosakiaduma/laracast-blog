<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
    //Return all the posts from the resources/posts directory
    return view('posts',['posts' => Post::all()]);
});


Route::get('ps/{post}', function($slug) {    
    //Introduce a variable to store the path to the post and check if it exists
})->where('post', '[A-z_\-]+');

/*
Alternative route function to find posts by their slug names
*/
Route::get('posts/{post}', function ($slug) {
    //Find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => Post::find($slug)
    ]);

});