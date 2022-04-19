<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{

   

    protected $table = 'book';

    protected $attributes = [
    
        'page_number' => 10,
        'description' => 'aaaaaaaaaaaaaaaaaaa'
    ];


    public function comments(){

      return $this->hasMany(comments::class);
    }


    public function category(){

      return $this->belongsTo(Category::class);
    }
}
