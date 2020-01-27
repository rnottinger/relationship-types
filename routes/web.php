<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/instantiation', 'MathController@instantiation');

Route::get('/telescope-examples', 'TScopeController@examples');

Route::get('/links', 'CollectionController@links');

Route::get('/collection-all', 'CollectionController@all');
Route::get('/collection-average', 'CollectionController@average');
Route::get('/collection-avg', 'CollectionController@avg');
Route::get('/collection-chunk', 'CollectionController@chunk');

/**
 * Eloquent: Relationships
 *
 * The following route closures test the code that implement relationships
 * https://laravel.com/docs/master/eloquent-relationships
 *         see laravel documentation above for more details on how to use relationships
 *         Each route will
 *             first remove all data in the related tables
 *             then generate data and implement the relations
 *             then use the relationships to output related data
 */

Route::get('/one-to-one', function () {
    App\Phone::truncate();
    App\User::truncate();

    // create a user then create a phone and relate it to the user ... see UserFactory
    $user = factory(App\User::class)->create();
    // $phone = App\User::find(1)->phone;
    $phone = $user->phone;
    dump($phone);
    dump($user);

    return 'done';
});

Route::get('/one-to-many', function () {
    App\Comment::truncate();
    App\Post::truncate();

    $posts = factory(App\Post::class, 3)
        ->create()
        ->each(function ($post) {
            $post->comments()->createMany(
                factory(App\Comment::class, 5)->make()->toArray()
            );
        });

    // $comments = App\Post::find(1)->comments;
    // $comment = App\Post::find(1)->comments()->where('title', 'foo')->first();

    // $comment = App\Comment::find(1);
    // echo $comment->post->title;

    foreach ($posts as $post) {
        foreach ($post->comments as $comment) {
            dump($comment);
            dump($comment->post->title);
        }
    }

    return 'done';
});

Route::get('/many-to-many', function () {
    App\RoleUser::truncate();
    App\Role::truncate();
    App\User::truncate();

    // Populate roles
    factory(App\Role::class, 20)->create();

    // Populate users
    $users = factory(App\User::class, 50)->create();

    // Get all the roles attaching up to 3 random roles to each user
    $roles = App\Role::all();

    // Populate the pivot table
    App\User::all()->each(function ($user) use ($roles) {
        $user->roles()->attach(
            $roles->random(rand(1, 3))->pluck('id')->toArray()
        );
    });

    foreach ($users as $user) {
        foreach ($user->roles as $role) {
            // dump($role->pivot->created_at);
            dump($role->pivot);
            dump($role);
        }
    }

    return 'done';
});

Route::get('/has-one-through', function () {
    return 'done';
});

Route::get('/has-many-through', function () {
    return 'done';
});

// Polymorphic Relationships https://laravel.com/docs/master/eloquent-relationships#polymorphic-relationships
Route::get('/polymorphic-one-to-one', function () {
    return 'done';
});

Route::get('/polymorphic-one-to-many', function () {
    return 'done';
});

Route::get('/polymorphic-many-to-many', function () {
    return 'done';
});

Route::get('/polymorphic-types-custom', function () {
    return 'done';
});

// Querying Relations

Route::get('/methods-vs-dynamic-properties', function () {
    return 'done';
});

Route::get('/query-existence', function () {
    return 'done';
});

Route::get('/query-absence', function () {
    return 'done';
});

Route::get('/query-polymorphic', function () {
    return 'done';
});

Route::get('/counting-related-models', function () {
    return 'done';
});
