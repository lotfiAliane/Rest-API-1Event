<?php

namespace App;
use App\User;


use Illuminate\Database\Eloquent\Model;

class customer extends Model
{


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function format()
    {
        return [
            'customer_id' => $this->id,
            'name' => $this->name,
            'created_by' => $this->user->name
        ];
    }

}
