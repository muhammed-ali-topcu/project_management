<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UuidTest;
use Faker\Generator as Faker;

$factory->define(UuidTest::class, function (Faker $faker) {
    return [
        //
        'uuid'=>$faker->uuid
    ];
});
