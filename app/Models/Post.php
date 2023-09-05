<?php
namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
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
     * Returns a cached version of the Posts collection that is stored for around 4 minutes
     * @return mixed
     */
    public static function all(){
        return cache()->remember('posts.all', 240, function () {
             return collect(File::files(resource_path('posts')))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->title,
                $document->excerpt,
                $document->date_published,
                $document->author,
                $document->body(),
                $document->slug,
            )
            )
            ->sortByDesc('date_published');
        });
        //arrow function equivalent
        //array_map(fn($file) => $file->getContents, $files)
        }

    /**
     *
     * Of all the blog posts find the one with a slug that matches the one that was requested.
     * This is an alternative to the find method that I posted earlier.
     * @param mixed $slug
     * @return TValue|null
     */
    public static function findExact($slug){
        return static::all()->firstWhere('slug', $slug);
    }
}
?>
