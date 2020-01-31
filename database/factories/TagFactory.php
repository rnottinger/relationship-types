<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    // $taggable = [
    //     App\Video::class,
    //     App\Post::class,
    // ];

    // return [
    //     'taggable_id' => 1,
    //     'taggable_type' => $faker->randomElement($taggable),
    // ];

    return [
        'name' => $faker->word(1),
    ];
});

// $factory->defineAs(App\Tag::class, 'video', function (Faker $faker) use ($factory) {
//     $follow = $factory->raw(App\Tag::class);

//     $extras = [
//         'taggable_id' => $faker->randomElement(App\Video::pluck('id')->toArray()),
//         'taggable_type' => App\Video::class,
//     ];

//     return array_merge($follow, $extras);
// });

// $factory->defineAs(App\Tag::class, 'post', function (Faker $faker) use ($factory) {
//     $follow = $factory->raw(App\Tag::class);

//     $extras = [
//         'taggable_id' => $faker->randomElement(App\Post::pluck('id')->toArray()),
//         'taggable_type' => App\Post::class,
//     ];

//     return array_merge($follow, $extras);
// });
