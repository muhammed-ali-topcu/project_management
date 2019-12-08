<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Taggable;
use Faker\Generator as Faker;

$factory->define(Taggable::class, function (Faker $faker) {
    return [
        //
        'tag_id'=>rand(1,3),
        'taggable_id'=>rand(1,8),
        'taggable_type'=>'App\Video'
    ];
});
