@extends('layouts.app')

@section('content')
    <posts-form :post="{{$post}}"></posts-form>
@endsection
