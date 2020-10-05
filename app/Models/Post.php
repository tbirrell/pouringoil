<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Post extends BaseModel
{
    protected $appends = ['content'];

    //=== RELATIONSHIPS ===//
    public function postable()
    {
        return $this->morphTo();
    }

    //=== ATTRIBUTES ===//
    public function getContentAttribute()
    {
        if ($this->postable_type === TextPost::class) {
            return $this->postable->text;
        }

        if ($this->postable_type === FilePost::class) {
           return Storage::disk('posts')->get($this->postable->filepath);
        }
    }
}
