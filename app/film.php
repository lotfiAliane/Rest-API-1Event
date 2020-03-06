<?php

namespace App;
use App\Category;
use App\Type;

use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    protected $fillable=['title','description','year'];
    protected $hidden=['id','created_at','updated_at'];


    public function category()
    {
      return $this->belongsTo(Category::class);
    }
    public function types()
    {
      return $this->morphedByMany(Type::class,'filmable');
    }
    public function actors()
    {
      return $this->morphedByMany(Actor::class,'filmable');
    }
}
