<?php

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
    return view('posts');
});

Route::get('posts/{post}', function($slug) {
    //Introduce a variable to store the path to the post
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    //Store the post in the cache for 5 seconds
    $post = cache()->remember("posts.{$slug}", 5, function () use ($path) {
        var_dump('file_get_contents');
        return file_get_contents($path);
    });    

    //Check whether the file exists
    if (! file_exists($path)){
        /*
        
        //Die and dump for quick debugging. Kills the execution and prints a logging statement
        dd("File does not exist");
        
        //Die, dump and debug
        ddd("File does not exist");
        */

        //you can also automatically redirect to another page if the link is broken 
        // return redirect('/');
        
        //abort functionality in Laravel
        abort(404);

    }

    $post = file_get_contents($path);
    return view('post',[
        'post' => $post
    ]);
})->where('post', '[A-z_\-]+');