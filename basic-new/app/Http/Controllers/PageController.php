<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function posts()
    {
        $posts = Post::with('user')
        ->latest()->paginate();

        return view('posts', ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
