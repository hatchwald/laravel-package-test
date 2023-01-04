<?php
namespace MTR\PostPackage\Tests;

use MTR\PostPackage\Tests\User;
use Orchestra\Testbench\Factories\UserFactory as testUserFactory;
use Illuminate\Support\Str;
class UserFactory extends testUserFactory {
    protected $model = User::class;


    public function definition()
    {
     return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('@Password123'),
        'remember_token' => Str::random(10) 
     ];   
    }
}