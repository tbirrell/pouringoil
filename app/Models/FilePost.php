<?php

namespace App\Models;

class FilePost extends BaseModel
{
    //=== RELATIONSHIPS ===//
    public function post()
    {
        return $this->morphOne(Post::class, 'postable');
    }
}
