<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
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
    //retreive all the files from the resources posts folder
    $files = File::files(resource_path('posts'));
    //create an array
    $documents = [];
    //loop through each file in the files array appending each files content to the document array
    foreach ($files as $file) {
        $documents[] = YamlFrontMatter::parseFile($file);
    };

    ddd($documents);



    //Use Spatie's YamlFrontMatter to query metadata from each post
    //$document = YamlFrontMatter::parseFile(resource_path('posts\my-fourth-post.html'));

    //Return all the posts from the resources/posts directory
    //return view('posts',['posts' => Post::all()]);
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
