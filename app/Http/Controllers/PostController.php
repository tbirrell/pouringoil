<?php

namespace App\Http\Controllers;

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
        //
    }

    public function show($id)
    {
        return view('posts.show');
    }

    public function edit($id)
    {
        return view('posts.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
