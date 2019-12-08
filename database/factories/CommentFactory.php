<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'commentable_type'=>'App\Video',
        'commentable_id'=>rand(1,4),
        'content'=>$faker->sentence()
    ];
});
