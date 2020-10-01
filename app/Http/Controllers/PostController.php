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
        dd('wtf');
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
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $post->title = $data['title'];
        $post->slug = strtolower(str_replace(' ', '-', $data['title']));
        $post->stub = $data['stub'];
        $text = $post->postable;
        $text->text = $data['content'];
        dump($text);
        $post->save();
        $text->save();
    }

    public function destroy(Post $post)
    {
        //
    }
}
