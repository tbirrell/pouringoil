<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilePost extends Model
{
    //=== RELATIONSHIPS ===//
    public function post()
    {
        return $this->morphOne(Post::class, 'postable');
    }
}
