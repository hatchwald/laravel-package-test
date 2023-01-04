<?php
namespace MTR\PostPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  // Disable Laravel's mass assignment protection
  protected $guarded = [];

  protected static function newFactory()
  {
    return \MTR\PostPackage\Database\Factories\PostFactory::new(); 
  }

  public function author()
  {
    return $this->morphTo() ;
  }
}