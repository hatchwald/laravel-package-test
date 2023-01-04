<?php

namespace MTR\PostPackage\Database\Factories;

use MTR\PostPackage\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use MTR\PostPackage\Tests\User;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $author = User::factory()->create();
        return [
            'title' => $this->faker->words(3,true),
            'body' => $this->faker->paragraph,
            'author_id' => $author->id,
            'author_type' => get_class($author)

        ];
    }
}
