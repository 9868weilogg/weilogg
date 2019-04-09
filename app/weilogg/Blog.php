<?php

namespace App\weilogg;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = [
    'blog_post',
    'blog_title',
  ];
}
