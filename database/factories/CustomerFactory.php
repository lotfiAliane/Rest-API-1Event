<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\customer;
use Faker\Generator as Faker;

$factory->define(customer::class, function (Faker $faker) {
    return [
        'user_id' =>factory(App\User::class),
        'name' =>$faker->name,
        'active' => random_int(0,1)
    ];
});
