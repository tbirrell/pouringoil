@extends('layouts.app')

@section('content')
    @markdown
    {{ $post->content }}
    @endmarkdown
@endsection
