<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable=['title','author'];

    public function path()
    {
        return 'books/'.$this->id;
    }
}
