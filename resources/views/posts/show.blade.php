@extends('layouts.app')

@section('content')

{{--        {{ markdown()->parse($post->content) }}--}}
    @markdown($post->content)
{{--        {{ $post->content }}--}}
{{--    @endmarkdown--}}
@endsection
