<?php
namespace MTR\PostPackage\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model 
{
    protected $guard = [];

    public function posts()
    {
        return $this->morphMany(Post::class,'author');
    }
}

