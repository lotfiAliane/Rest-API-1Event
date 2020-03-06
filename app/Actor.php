<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //
    protected $fillable=['name','slug'];

    

    public function films()
    {
      return $this>morphsToMany(App\film::class,'filmable');
    }
}
