<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\TextPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $text = TextPost::create(['text' => $data['content']]);
        $post = Post::create([
            'title' => $data['title'],
            'slug' => strtolower(str_replace(' ', '-', $data['title'])),
            'stub' => $data['stub'],
            'postable_type' => TextPost::class,
            'postable_id' => $text->id
        ]);


    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit');
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
