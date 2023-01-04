<?php
namespace MTR\PostPackage\Traits;

use MTR\PostPackage\Models\Post;

trait HasPosts{
    public function posts()
    {
        return $this->morphMany(Post::class,'author');
    }
}