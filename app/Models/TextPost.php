<?php

namespace App\Models;

class TextPost extends BaseModel
{
    //=== RELATIONSHIPS ===//
    public function post()
    {
        return $this->morphOne(Post::class, 'postable');
    }
}
