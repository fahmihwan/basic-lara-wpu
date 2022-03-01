<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title' => 'All Posts',
            // 'posts' => Post::all()
            'posts' => Post::latest()->get()
        ]);
    }

    public function show($slug)
    {

        // $post = Post::where('slug', $slug)->first();
        $post = Post::where('slug', $slug)->first();
        return view('post', [
            'title' => 'data post',
            'post' => $post
        ]);
    }
}
