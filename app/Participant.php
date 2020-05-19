<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Atelier;
class Participant extends Model
{
    //
    protected $fillable=['firstname','lastName','email','phone','city','profession','ateliers'];
  //  protected $visible = ['profession', 'Atelier','ateliers'];


    public function ateliers()
    {
        return $this->belongsToMany('App\Atelier','participant__ateliers','participant_id','atelier_id')->withPivot('type');
    }
}
