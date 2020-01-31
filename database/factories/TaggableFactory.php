<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'taggable_id' => $faker->randomElement(App\Post::pluck('id')->toArray()),
        'taggable_type' => App\Post::class,
    ];
});
