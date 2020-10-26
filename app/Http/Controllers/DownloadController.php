<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloadPost(Post $post)
    {
        echo $post->content;
    }
}
