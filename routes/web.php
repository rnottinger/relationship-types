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

Route::get('/links', function () {
    return view('relationships.links');
});

Route::get('/one-to-one', function () {
    App\Phone::truncate();
    App\User::truncate();
    App\Country::truncate();
    App\Supplier::truncate();

    $phone = factory(App\Phone::class)->create();
    // $phone = App\User::find(1)->phone;
    // $phone = $user->phone; // use the phone() method hasOne relationship on the User model
    dump($phone);
    dump($phone->user); // use the inverse of the hasOne... user() method belongTo() on the Post model

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

    dump($posts);
    foreach ($posts as $post) {
        dump($post);
        // dump($post->comments); // use the hasMany() relationship on the Post model
        foreach ($post->comments as $comment) {
            dump($comment->post->id);
            dump($comment);
            // dump($comment->post->title); // use the inverse of the hasMany ... post() method belongsTo() relationship on the Comment Model to access the 'title' attribute on the Post Model
        }
    }

    return 'done';
});

Route::get('/many-to-many', function () {
    App\RoleUser::truncate();
    App\Role::truncate();
    App\User::truncate();
    App\Country::truncate();
    App\Supplier::truncate();

    // Populate roles
    $roles = factory(App\Role::class, 20)->create();

    // Populate users
    $users = factory(App\User::class, 50)->create();

    // Get all the roles attaching up to 3 random roles to each user
    // Populate the pivot table
    $users->each(function ($user) use ($roles) {
        $user->roles()->attach(
            $roles->random(rand(1, 3))->pluck('id')->toArray()
        );
    });

    foreach ($users as $user) {
        foreach ($user->roles as $role) {
            dump($role->pivot->created_at);
        }
    }

    return 'done';
});

Route::get('/has-one-through', function () {
    App\History::truncate();
    App\User::truncate();
    App\Country::truncate();
    App\Supplier::truncate();

    // will create a history, user, country, & supplier row...
    $history = factory(App\History::class)->create();

    $supplier = $history->user->supplier;

    dump(
        $supplier->userHistory// use the userHistory() method hasOneThrough relationship on the Supplier Model
    );
    return 'done';

    // php artisan tinker
    // Psy Shell v0.9.12 (PHP 7.3.9 — cli) by Justin Hileman
    //
    // >>> use App\History;
    //
    //
    //
    //
    // >>> $history=History::find(1)->first();
    // => App\History {#3163
    //      id: 1,
    //      user_id: 1,
    //      created_at: "2020-01-28 22:50:36",
    //      updated_at: "2020-01-28 22:50:36",
    //    }
    //
    //
    //
    //
    // >>> $history->user
    // => App\User {#3161
    //      id: 1,
    //      name: "Dr. Lawrence Grady",
    //      email: "ecollier@example.com",
    //      email_verified_at: "2020-01-28 22:50:36",
    //      created_at: "2020-01-28 22:50:36",
    //      updated_at: "2020-01-28 22:50:36",
    //      supplier_id: 1,
    //    }
    //
    //
    //
    // >>> $user = $history->user;
    // => App\User {#3161
    //      id: 1,
    //      name: "Dr. Lawrence Grady",
    //      email: "ecollier@example.com",
    //      email_verified_at: "2020-01-28 22:50:36",
    //      created_at: "2020-01-28 22:50:36",
    //      updated_at: "2020-01-28 22:50:36",
    //      supplier_id: 1,
    //    }
    //
    //
    //
    //
    //
    // >>> $supplier=$user->supplier;;
    // => App\Supplier {#3166
    //      id: 1,
    //      created_at: "2020-01-28 22:50:36",
    //      updated_at: "2020-01-28 22:50:36",
    //    }
    //
    //
    //
    //
    // >>> $supplier->userHistory;
    // => App\History {#3185
    //      id: 1,
    //      user_id: 1,
    //      created_at: "2020-01-28 22:50:36",
    //      updated_at: "2020-01-28 22:50:36",
    //      laravel_through_key: 1,
    //    }
});

Route::get('/has-many-through', function () {
    App\User::truncate();
    App\Post::truncate();
    App\Country::truncate();
    App\Supplier::truncate();

    $users = factory(App\User::class, 3)
        ->create()
        ->each(function ($user) {
            $user->posts()->createMany(
                factory(App\Post::class, 5)->make()->toArray()
            );
        });
    foreach ($users as $user) {
        $country = $user->country;
        dump(
            $country->posts// use the posts() method hasManyThrough relation on the Country model
        );
    }

    return 'done';
});

// $users = factory(App\User::class, 3)->create()->each(function ($user) { $user->posts()->createMany( factory(App\Post::class, 5)->make()->toArray() );  });

// Polymorphic Relationships https://laravel.com/docs/master/eloquent-relationships#polymorphic-relationships
Route::get('/polymorphic-one-to-one', function () {
    App\User::truncate();
    App\Country::truncate();
    App\Supplier::truncate();
    App\Post::truncate();
    App\Image::truncate();

    // the table structure and model structure (relationship methods) have been setup

    $image = factory(App\Image::class, 20)->create();

    $post = App\Post::find(1);
    $image = $post->image; // use the image() method morphOne relationship to retrieve the image for a post
    dump($image);

    $image = App\Image::find(1);
    $imageable = $image->imageable;
    // will return either a Post or User instance
    // depending on which type of model owns the image

    dump($imageable);

    return 'done';
});

Route::get('/polymorphic-one-to-many', function () {
    App\PolymorphicComment::truncate();
    App\User::truncate();
    App\Country::truncate();
    App\Supplier::truncate();
    App\Post::truncate();
    App\Video::truncate();
    // create a post
    // then create many comments for that post

    $posts = factory(App\Post::class, 3)
        ->create()
        ->each(function ($post) {
            $post->polymorphicComments()
                ->createMany(
                    factory(App\PolymorphicComment::class, 5)->make()->toArray()
                );
        });

    //
    // create a video
    // then create many comments for that video
    //
    $videos = factory(App\Video::class, 3)
        ->create()
        ->each(function ($video) {
            $video->polymorphicComments()
                ->createMany(
                    factory(App\PolymorphicComment::class, 5)->make()->toArray()
                );
        });

    dump($posts);
    dump($videos);

    $post = App\Post::find(1);
    dump($post->polymorphicComments);

    $video = App\Video::find(1);
    dump($video->polymorphicComments);

    $comment = App\PolymorphicComment::find(1);
    $commentable = $comment->commentable;
    dump($commentable);

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
