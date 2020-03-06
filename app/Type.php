<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $fillable=['name'];
    protected $visible = ['name'];
    public function films()
    {

      return $this->morphsToMany(App\film::class,'filmable');
    }
}
