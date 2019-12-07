<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->title(),
        'description'=>$faker->text(),
        'owner_id'=>2
    ];
});
