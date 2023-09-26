<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
}
