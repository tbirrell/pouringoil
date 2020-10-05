@extends('layouts.app')

@section('content')
    <posts-form :files="{{ $unposted_files }}"></posts-form>
@endsection
