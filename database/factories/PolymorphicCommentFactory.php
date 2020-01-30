<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PolymorphicComment;
use Faker\Generator as Faker;

$factory->define(PolymorphicComment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence(5),
        // 'commentable_id' =>,
        // 'commentable_type' =>
    ];
});
