<?php

namespace App\Http\Controllers;

use App\Models\FilePost;
use App\Models\Post;
use App\Models\TextPost;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $files = collect(Storage::disk('posts')->allFiles());
        $file_posts = FilePost::all()->map(function ($fp) {
            return $fp->filepath;
        })->toArray();

        $unposted_files = $files->diff($file_posts)->reindex();
        return view('posts.create',compact('unposted_files'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['filepath'] === '') {
            $postable = TextPost::create(['text' => $data['content']]);
        } else {
            $postable = FilePost::create(['filepath' => $data['filepath']]);
        }

        $post = Post::create([
            'title' => $data['title'],
            'slug' => strtolower(str_replace(' ', '-', $data['title'])),
            'stub' => $data['stub'],
            'postable_type' => get_class($postable),
            'postable_id' => $postable->id
        ]);

        return $post->slug;
    }

    public function show(Post $post)
    {
        $parser = markdown()->parser('custom');
        $post_html = $parser->parse($post->content);
        return view('posts.show', compact('post_html'));
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
