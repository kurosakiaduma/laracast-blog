<?php
namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
/**
 * Post model instantiated with title, excerpt, body, date_published and author
 */
class Post
{
    public $title;

    public $excerpt;

    public $date_published;

    public $author;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date_published, $author, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date_published = $date_published;
        $this->author = $author;
        $this->body = $body;
        $this->slug = $slug;
    }




    /**
     * returns each individual post page lest throws an exception if the slug URI is not located
     * @param mixed $slug
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return mixed
     */
    public static function find($slug)
    {
        //custom find method for the Posts class
        if (! file_exists($path = resource_path("posts/{$slug}.html"))){
        /*
            //Die and dump for quick debugging. Kills the execution and prints a logging statement
            dd("File does not exist");

            //Die, dump and debug
            ddd("File does not exist");
        */

            //you can also automatically redirect to another page if the link is broken
            // return redirect('/');

            //abort functionality in Laravel when the post slug is not foun
            // abort(404);

            //throw an exception with a helper method representing a 404 model
            throw new ModelNotFoundException();
    }
        /*
        $post = cache()-> remember("posts.{$slug}", 5, function () use ($path) {
        var_dump('file_get_contents');
        return file_get_contents($path);
        });
        */

        //Store the post in the cache for a day
        $post = cache()->remember("posts.{$slug}", now()->addDay(), fn() => file_get_contents($path));
        return $post;
    }
    /**
     * Returns an array of the contents of each post from the resources folder
     * @return array
     */
    public static function all(){
        //store all the files in an array
        $files = File::files(resource_path("posts/"));

        //use array_map to loop over array and pass contents to the callback
        return array_map(function ($file) {
            return $file -> getContents();
        }, $files);

        //arrow function equivalent
        //array_map(fn($file) => $file->getContents, $files)
    }
}
?>
