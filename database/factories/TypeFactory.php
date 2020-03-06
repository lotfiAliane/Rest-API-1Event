<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Type;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Type::class, function (Faker $faker) {

        
return [
    'name' => $faker->name(),

    ];
});
