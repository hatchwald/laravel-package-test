<?php
namespace MTR\PostPackage;

use MTR\PostPackage\Models\Post;

class FilterPost {
    private $postfilter;
    public function __construct()
    {
      $this->postfilter = "";   
    }

    public function withTitle(string $key)
    {
        $this->postfilter = Post::where('title','LIKE',"%$key%")->get();
        return $this->postfilter;
    }
}