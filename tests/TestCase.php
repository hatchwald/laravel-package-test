<?php

namespace MTR\PostPackage\Tests;

use MTR\PostPackage\PostPackageServiceProvider;
use Orchestra\Testbench\TestCase as orchestra;
class TestCase extends orchestra
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
        PostPackageServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    /// import the CreatePostsTable class from the migration
    include_once __DIR__ . '/../database/migrations/create_posts_table.php.stub';
    include_once __DIR__ . '/../database/migrations/create_users_table.php.stub';

    // run the up() method of that migration class
    (new \CreatePostsTable)->up();
    (new \CreateUsersTable)->up();
  }
}