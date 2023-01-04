<?php
namespace MTR\PostPackage\Database\Seeders;
use Illuminate\Database\Seeder;
use MTR\PostPackage\Models\Post;


class PostSeeder extends Seeder 
{
    public function run()
    {
        Post::factory(10)->create();
    }
}
