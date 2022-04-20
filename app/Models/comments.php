<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['comment'];
    protected $table = 'comments';


   public function book(){

    return $this->belongsTo(Books::class);

   }
}
