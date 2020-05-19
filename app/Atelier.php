<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    //
    protected $fillable=['name','animator','laboratory','horaire','places','reserve'];

    public function participants()
    {
        return $this->belongsToMany('App\Participant','participant__ateliers','atelier_id','participant_id')->withPivot('type');;
    }
}
