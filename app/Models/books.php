<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{

  protected $fillable = [

    "title",
    "description",
    "page_number",
    "id_category",
    "image",

  ];

  protected $table = 'book';

  protected $attributes = [

    'page_number' => 10,
    'description' => 'aaaaaaaaaaaaaaaaaaa'
  ];


  public function comments()
  {

    return $this->hasMany(Comments::class);
  }


  public function category()
  {

    return $this->belongsTo(Category::class, 'id_category');
  }
}
