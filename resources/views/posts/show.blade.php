@extends('layouts.app')

@section('content')
    <download-post slug="{{ $post->slug }}"></download-post>
    @markdown($post->content)
@endsection
