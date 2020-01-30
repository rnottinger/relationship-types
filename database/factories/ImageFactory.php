<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $imageable = [
        App\User::class,
        App\Post::class,
    ];
    $imageableType = $faker->randomElement($imageable);
    $imageable = factory($imageableType)->create(); // create a random User or Post
    return [
        'url' => $faker->url,
        'imageable_type' => $imageableType,
        'imageable_id' => $imageable->id,
    ];
});
