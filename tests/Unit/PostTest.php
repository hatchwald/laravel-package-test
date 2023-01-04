<?php

namespace MTR\PostPackage\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MTR\PostPackage\Tests\TestCase;
// use PHPUnit\Framework\TestCase;
use MTR\PostPackage\Models\Post;
use MTR\PostPackage\Tests\User;


class PostTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  function a_post_has_a_title()
  {
    $post = Post::factory()->create(['title' => 'Fake Title']);
    $this->assertEquals('Fake Title', $post->title);
  }
  
  /** @test */
  function a_post_has_a_body()
  {
    $post = Post::factory()->create(['body' => 'Fake Body']);
    $this->assertEquals('Fake Body', $post->body);
  }

  /** @test */
  function a_post_has_an_author_id()
  {
    // Note that we are not assuming relations here, just that we have a column to store the 'id' of the author
    $user = User::factory()->create();
    $post = Post::factory()->create(['author_id' => $user->id]); // we choose an off-limits value for the author_id so it is unlikely to collide with another author_id in our tests
    $this->assertEquals($user->id, $post->author_id);
  }

  public function a_post_has_an_author_type()
  {
    $post = Post::factory()->create(['author_type' => 'Fake\User']);
    $this->assertEquals('Fake\User',$post->author_type);
  }

  /** @test */
  function a_post_belongs_to_an_author()
  {
    // Given we have an author
    $author = User::factory()->create();
    // And this author has a Post
    $author->posts()->create([
        'title' => 'My first fake post',
        'body'  => 'The body of this fake post',
    ]);

    $this->assertCount(1, Post::all());
    $this->assertCount(1, $author->posts);

    // Using tap() to alias $author->posts()->first() to $post
    // To provide cleaner and grouped assertions
    tap($author->posts()->first(), function ($post) use ($author) {
        $this->assertEquals('My first fake post', $post->title);
        $this->assertEquals('The body of this fake post', $post->body);
        $this->assertTrue($post->author->is($author));
    });
  }
}