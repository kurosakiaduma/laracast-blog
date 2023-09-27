<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()
            ->where('status', 'published')
            ->filter($request->only(['search', 'category', 'author']))
            ->paginate(18);

        return response()->json(['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return response()->json(['post' => $post]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $thumbnail = $request->file('thumbnail')->store('thumbnails');

        $post = Post::create([
            'user_id' => rand(1, 7), // Replace with auth()->id() if you want to use the authenticated user's ID
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'status' => 'published',
        ]);

        return response()->json($post, 201);
    }
}
