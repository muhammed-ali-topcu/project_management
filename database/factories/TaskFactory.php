<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->sentence(),
        'last_date'=>now(),
        'completed'=>rand(0,1)==1,
        'project_id'=>rand(7,61728)
    ];
});
