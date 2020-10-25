<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $post = Post::where('slug', 'about')->first();
        return view('posts.show', compact('post'));
    }

    public function tech()
    {
        $post = Post::where('slug', 'tech')->first();
        return view('posts.show', compact('post'));
    }
}
