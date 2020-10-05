@extends('layouts.app')

@section('content')
    <h1>
        All Posts
    </h1>
    @foreach($posts as $post)
        <div>
            <h3 class="pl-2 font-bold"><a class="text-black no-underline hover:underline" href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h3>
            <div class=" border-b border-grey-300 p-4">
                {{ $post->stub }}
            </div>
        </div>
    @endforeach
@endsection
