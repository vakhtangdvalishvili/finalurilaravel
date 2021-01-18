<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    protected $table='post';
    protected $fillable=['user_id', 'category_id', 'title','image','price','add_date'];
}

//public function categories(){
  //  return $this->hasMany(app\Caregory::class);
//}

