<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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
    //retrieve all the files from the resources posts folder using Laravel's Collection approach

    /*
    //ALTERNATE LOOP FUNCTION
    // $posts  = array_map(function($file){
        $document = YamlFrontMatter::parseFile($file);
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date_published,
            $document->author,
            $document->body(),
            $document->slug,
        );
        }, $files);
    */

    //create an array
    //$posts = [];

    //loop through each file in the files array appending each files content to the document array

    /*
    NOTE: Should you find yourself looping over an iterable only to build a new iterable,
    Collections is probably your best bet in optimizing your code
    */

    //foreach ($files as $file) {
    //    $document = YamlFrontMatter::parseFile($file);

    //    $posts[] = new Post(
    //    $document->title,
    //    $document->excerpt,
    //    $document->date_published,
    //    $document->author,
    //    $document->body(),
    //    $document->slug,
    //    );
    //};


    //Use Spatie's YamlFrontMatter to query metadata from each post
    //$document = YamlFrontMatter::parseFile(resource_path('posts\my-fourth-post.html'));

    //Return all the posts from posts array
    return view('posts',[
        'posts' => Post::latest('date_published')->with('category', 'author')->get()
    ]);
});


Route::get('ps/{post}', function($slug) {
    //Introduce a variable to store the path to the post and check if it exists
})->where('post', '[A-z_\-]+');

/*
Alternative route function to find posts by their slugs from the Post model
*/
Route::get('posts/{post:slug}', function (Post $post) {
    //Find a post by its id and pass it to a view called "post"
    //ddd($post);
    return view('post', [
        'post' => $post
    ]);
});

/*
Route to retrieve all posts under similar categories
*/
Route::get('categories/{category:slug}', function (Category $category) {
    //Find a category by its slug and retrieve all of its posts
    return view('posts', [
        'posts' => $category->posts
    ]);
});


/*
Route to retrieve all posts under similar categories
*/
Route::get('authors/{author}', function (User $author) {
    //Retrieve all posts from one singular user
    //dd($author);
    return view('posts', [
        'posts' => $author -> posts
    ]);
});
