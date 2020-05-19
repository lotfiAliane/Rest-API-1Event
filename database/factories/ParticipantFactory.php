<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {
    return [
        'firstname'=> $faker->name,
        'lastName' =>$faker->name,
        'email'=>$faker->email,
        'phone'=>$faker->phoneNumber,
        'city' => $faker->country,
        'profession'=>$faker->Company

    ];
});
