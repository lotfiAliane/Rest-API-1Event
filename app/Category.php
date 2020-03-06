<?php

namespace App;
use App\film;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
 protected $fillable=['name','slug'];

 public function films()
 {
    return $this->hasMany(film::class);
 }
}
