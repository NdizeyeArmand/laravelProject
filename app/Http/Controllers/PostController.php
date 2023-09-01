<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index()
    {

        // $posts = Post::latest()->get();
        // $posts = Post::all();

        return view('main.index', [
            'posts' => Post::latest()->paginate(2)
        ]);
    }

    public function show(Post $post): View
    {
        return view('main.show', [
            'post' => $post
        ]);
    }
}
