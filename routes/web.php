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

Route::get('/querystring-demo', function () {
    $name = request('name');

    return view('test', [
        'name' => $name,
    ]);

    return;
    // return $name;  // will allow users to execute any script in the browser

    // return [
    //     'foo' => 'bar',
    //     'boom' => 'legit',
    // ];

    // return view('welcome');   {{!! <p><a href="{{url("//")}}'">Go Back</a></p> !!}}
});

Route::get('/', function () {

    $collectionMethods = [
        'all',
        'average',
        'avg',
        'chunk',
        'collapse',
        'combine',
        'collect',
        'concat',
        'contains',
        'count',
        'countBy',
        'crossJoin',
        'dd',
        'diff',
        'diffAssoc',
        'diffKeys',
        'dump',
        'duplicates',
        'duplicatesStrict',
        'each',
        'eachSpread',
        'every',
        'except',
        'filter',
        'first',
        'firstWhere',
        'flatMap',
        'flatten',
        'flip',
        'forget',
        'forPage',
        'get',
        'groupBy',
        'has',
        'implode',
        'intersect',
        'intersectByKeys',
        'isEmpty',
        'isNotEmpty',
        'keyBy',
        'keys',
        'last',
        'macro',
        'make',
        'map',
        'mapInto',
        'mapSpread',
        'mapToGroups',
        'mapWithKeys',
        'max',
        'median',
        'merge',
        'mergeRecursive',
        'min',
        'mode',
        'nth',
        'only',
        'pad',
        'partition',
        'pipe',
        'pluck',
        'pop',
        'prepend',
        'pull',
        'push',
        'put',
        'random',
        'reduce',
        'reject',
        'replace',
        'replaceRecursive',
        'reverse',
        'search',
        'shift',
        'shuffle',
        'skip',
        'slice',
        'some',
        'sort',
        'sortBy',
        'sortByDesc',
        'sortDesc',
        'sortKeys',
        'sortKeysDesc',
        'splice',
        'split',
        'sum',
        'take',
        'tap',
        'times',
        'toArray',
        'toJson',
        'transform',
        'union',
        'unique',
        'uniqueStrict',
        'unless',
        'unlessEmpty',
        'unwrap',
        'values',
        'when',
        'whenEmpty',
        'whenNotEmpty',
        'where',
        'whereStrict',
        'whereBetween',
        'whereIn',
        'whereInStrict',
        'whereInstanceOf',
        'whereNotBetween',
        'whereNotInStrict',
        'wrap',
        'zip',
    ];

    return view('relationships.links', compact('collectionMethods'));
});

Route::get('/instantiation', 'MathController@instantiation');

Route::get('/telescope-examples', 'TScopeController@examples');

Route::get('/collection-chaining', function () {

    dump(
        $collection = collect(['taylor', 'abigail', null])->map(function ($name) {
            return strtoupper($name);
        })
            ->reject(function ($name) {
                return empty($name);
            })
    );

    $desc = '<p><ul><li>We will use the collect helper</li>';
    $desc .= '<li>to create a new collection instance from the array,</li>';
    $desc .= '<li>run the strtoupper function on each element,</li>';
    $desc .= '<li>and then remove all empty elements</li></ul></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
    return $desc;
});

Route::get('/collection-macroable', function () {
    Illuminate\Support\Collection::macro('toUpper', function () {
        return $this->map(function ($value) {
            return Illuminate\Support\Str::upper($value);
        });
    });

    $collection = collect(['first', 'second']);

    dump(
        $upper = $collection->toUpper()
    );
    $desc = '<p><pre>// ["FIRST", "SECOND"]</pre></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
    return $desc;
});

Route::get('/collection-all', function () {
    dump(
        collect([1, 2, 3])->all()
    );
    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-average">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-average', function () {
    dump(
        collect([1, 2, 3])->average()
    );
    $desc = '<p>Get the average value of a given key.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-avg">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-avg', function () {
    // $average = collect([
    //      ['foo' => 10],
    //      ['foo' => 10],
    //      ['foo' => 20],
    //      ['foo' => 40]
    // ])->avg('foo');

    $average = collect([1, 1, 2, 4])->avg();
    dump(
        $average
    );
    $desc = '<p>Get the average value of a given key.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-chunk">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-chunk', function () {
    $collection = collect([1, 2, 3, 4, 5, 6, 7]);
    $chunks = $collection->chunk(4);

    dump(
        $chunks->toArray()
    );

    $desc = '<p>Chunk the collection into chunks of the given size.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-collapse">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-collapse', function () {
    $collection = collect([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
    $collapsed = $collection->collapse();

    dump(
        $collapsed->all()
    );

    $desc = '<p>The collapse method collapses a collection of arrays into a single, flat collection</p>';
    $desc .= '<p>// [1, 2, 3, 4, 5, 6, 7, 8, 9]</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-combine">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-combine', function () {
    $collection = collect(['name', 'age']);
    $combined = $collection->combine(['George', 29]);

    dump(
        $combined->all()
    );

    $desc = '<p>The combine method combines the values of the collection, as keys, with the values of another array or collection:</p>';
    $desc .= '<p>// ["name" => "George", "age" => 29]</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-collect">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-collect', function () {
    $collectionA = collect([1, 2, 3]);

    $collectionB = $collectionA->collect();

    // [1, 2, 3]

    $lazyCollection = Illuminate\Support\LazyCollection::make(function () {
        yield 1;
        yield 2;
        yield 3;
    });

    $collection = $lazyCollection->collect();

    // [1, 2, 3]

    dump(
        $collectionB->all()
    );

    dump(
        get_class($collection),
        $collection->all()
    );

    $desc = '<p>The collect method returns a new Collection instance with the items currently in the collection:</p>';
    $desc .= '<p>// [1, 2, 3]</p>';
    $desc .= 'The collect method is primarily useful for converting lazy collections into standard Collection instances:<br>';
    $desc .= 'The collect method is especially useful when you have an instance of Enumerable and need a non-lazy collection instance. <br>Since collect() is part of the Enumerable contract, you can safely use it to get a Collection instance.';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-concat">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-concat', function () {
    $collection = collect(['John Doe']);

    $concatenated = $collection->concat(['Jane Doe'])->concat(['name' => 'Johnny Doe']);

    dump(
        $concatenated->all()
    );

    $desc = '<p>The concat method appends the given array or collection values onto the end of the collection:</p>';
    $desc .= '<p>// ["John Doe", "Jane Doe", "Johnny Doe"]</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-contains">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-contains', function () {
    $collection = collect(['name' => 'Desk', 'price' => 100]);

    dump(
        $collection->contains('Desk') // true
    );

    dump(
        $collection->contains('New York') // false
    );

    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 100],
    ]);

    dump(
        $collection->contains('product', 'Bookcase') // false
    );

    $collection = collect([1, 2, 3, 4, 5]);
    dump(
        $collection->contains(function ($value, $key) {
            return $value > 5;
        }) // false
    );

    $desc = '<p>The contains method determines whether the collection contains a given item:</p>';
    $desc .= '<p>// true false</p>';
    $desc .= '<p>You may also pass a key / value pair to the contains method, which will determine if the given pair exists in the collection:</p>';
    $desc .= '<p>Finally, you may also pass a callback to the contains method to perform your own truth test:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-count">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-count', function () {
    $collection = collect([1, 2, 3, 4]);

    dump(
        $collection->count() // 4
    );

    $desc = '<p>The count method returns the total number of items in the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-countBy">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-countBy', function () {

    $collection = collect([1, 2, 2, 2, 3]);

    $counted = $collection->countBy();

    dump($counted->all());

    // [1 => 1, 2 => 3, 3 => 1]

    $collection = collect(['alice@gmail.com', 'bob@yahoo.com', 'carlos@gmail.com']);

    $counted = $collection->countBy(function ($email) {
        return substr(strrchr($email, "@"), 1);
    });

    // ['gmail.com' => 2, 'yahoo.com' => 1]

    dump(
        $counted->all()
    );

    $desc = '<p>The countBy method counts the occurrences of values in the collection.<br> By default, the method counts the occurrences of every element:</p>';
    $desc .= '<p>However, you pass a callback to the countBy method to count all items by a custom value:</p>';
    $desc .= '<p>// [1 => 1, 2 => 3, 3 => 1]</p>';
    $desc .= '<p>// ["gmail.com" => 2, "yahoo.com" => 1]</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-crossJoin">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-crossJoin', function () {

    $collection = collect([1, 2]);

    $matrix = $collection->crossJoin(['a', 'b']);

    dump(
        $matrix->all()
    );

    /*
    [
    [1, 'a'],
    [1, 'b'],
    [2, 'a'],
    [2, 'b'],
    ]
     */

    $collection = collect([1, 2]);

    $matrix = $collection->crossJoin(['a', 'b'], ['I', 'II']);

    dump(
        $matrix->all()
    );

    /*
    [
    [1, 'a', 'I'],
    [1, 'a', 'II'],
    [1, 'b', 'I'],
    [1, 'b', 'II'],
    [2, 'a', 'I'],
    [2, 'a', 'II'],
    [2, 'b', 'I'],
    [2, 'b', 'II'],
    ]
     */

    $desc = '<p>The crossJoin method cross joins the collections values among the given arrays or collections, returning a Cartesian product with all possible permutations:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-dd">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-dd', function () {
    $collection = collect(['John Doe', 'Jane Doe']);

    $collection->dd();

    /*
    Collection {
    #items: array:2 [
    0 => "John Doe"
    1 => "Jane Doe"
    ]
    }
     */

// this won't execute because of dd() above stops execution
    dump(
        $collection->count() // 4
    );

    $desc = '<p>The dd method dumps the collections items and ends execution of the script:</p>';
    $desc .= '<p>If you do not want to stop executing the script, use the dump method instead.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-diff">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-diff', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    $diff = $collection->diff([2, 4, 6, 8]);

    dump($diff->all()); // [1, 3, 5]

    $desc = '<p>The diff method compares the collection against another collection or a plain PHP array based on its values. This method will return the values in the original collection that are not present in the given collection:</p>';
    $desc .= '<p>This methods behavior is modified when using Eloquent Collections.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-diffAssoc">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-diffAssoc', function () {

    $collection = collect([
        'color' => 'orange',
        'type' => 'fruit',
        'remain' => 6,
    ]);

    $diff = $collection->diffAssoc([
        'color' => 'yellow',
        'type' => 'fruit',
        'remain' => 3,
        'used' => 6,
    ]);

    dump($diff->all());

// ['color' => 'orange', 'remain' => 6]

    $desc = '<p>The diffAssoc method compares the collection against another collection or a plain PHP array based on its keys and values. </p>';
    $desc .= '<p>This method will return the key / value pairs in the original collection that are not present in the given collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-diffKeys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-diffKeys', function () {

    $collection = collect([
        'one' => 10,
        'two' => 20,
        'three' => 30,
        'four' => 40,
        'five' => 50,
    ]);

    $diff = $collection->diffKeys([
        'two' => 2,
        'four' => 4,
        'six' => 6,
        'eight' => 8,
    ]);

    dump(
        $diff->all()
    );

// ['one' => 10, 'three' => 30, 'five' => 50]

    $desc = '<p>The diffKeys method compares the collection against another collection or a plain PHP array based on its keys. This method will return the key / value pairs in the original collection that are not present in the given collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-dump">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-dump', function () {

    $collection = collect(['John Doe', 'Jane Doe']);

    $collection->dump();

    /*
    Collection {
    #items: array:2 [
    0 => "John Doe"
    1 => "Jane Doe"
    ]
    }
     */

    $desc = '<p>The dump method dumps the collections items:</p>';
    $desc .= '<p>If you want to stop executing the script after dumping the collection, use the dd method instead.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-duplicates">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-duplicates', function () {

    $collection = collect(['a', 'b', 'a', 'c', 'b']);

    dump(
        $collection->duplicates()
    );

    // [2 => 'a', 4 => 'b']

    $employees = collect([
        ['email' => 'abigail@example.com', 'position' => 'Developer'],
        ['email' => 'james@example.com', 'position' => 'Designer'],
        ['email' => 'victoria@example.com', 'position' => 'Developer'],
    ]);

    dump(
        $employees->duplicates('position')
    );

    // [2 => 'Developer']

    $desc = '<p>The duplicates method retrieves and returns duplicate values from the collection:</p>';
    $desc .= '<p>If the collection contains arrays or objects, you can pass the key of the attributes that you wish to check for duplicate values:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-duplicatesStrict">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-duplicatesStrict', function () {
    $desc = '<p>This method has the same signature as the duplicates method. however, all values are compared using "strict" comparisons.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-each">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-each', function () {

    $collection = collect(['a', 'b', 'a', 'c', 'b']);

    $collection->each(function ($item, $key) {
        //
    });

    $collection->each(function ($item, $key) {
        /* some condition */
        if (true) {
            return false;
        }
    });

    $desc = '<p>The each method iterates over the items in the collection and passes each item to a callback:</p>';
    $desc .= '<p>If you would like to stop iterating through the items, you may return false from your callback:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-eachSpread">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-eachSpread', function () {

    $collection = collect([['John Doe', 35], ['Jane Doe', 33]]);

    $collection->eachSpread(function ($name, $age) {
        //
    });

    $collection->eachSpread(function ($name, $age) {
        return false;
    });

    $desc = '<p>The eachSpread method iterates over the collections items, passing each nested item value into the given callback:</p>';
    $desc .= '<p>You may stop iterating through the items by returning false from the callback:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-every">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-every', function () {

    dump(
        collect([1, 2, 3, 4])->every(function ($value, $key) {
            return $value > 2;
        })
    );

// false

    $collection = collect([]);

    dump(
        $collection->every(function ($value, $key) {
            return $value > 2;
        })
    );

// true

    $desc = '<p>The every method may be used to verify that all elements of a collection pass a given truth test:</p>';
    $desc .= '<p>If the collection is empty, every will return true:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-except">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-except', function () {

    $collection = collect(['product_id' => 1, 'price' => 100, 'discount' => false]);

    $filtered = $collection->except(['price', 'discount']);

    dump(
        $filtered->all()
    );

    // ['product_id' => 1]

    $desc = '<p>The except method returns all items in the collection except for those with the specified keys:</p>';
    $desc .= '<p>For the inverse of except, see the only method.</p>';
    $desc .= '<p>This methods behavior is modified when using Eloquent Collections.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-filter">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-filter', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-first">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-first', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-firstWhere">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-firstWhere', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-flatMap">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-flatMap', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-flatten">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-flatten', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-flip">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-flip', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-forget">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-forget', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-forPage">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-forPage', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-get">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-get', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-groupBy">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-groupBy', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-has">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-has', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-implode">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-implode', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-intersect">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-intersect', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-intersectByKeys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-intersectByKeys', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-isEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-isEmpty', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-isNotEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-isNotEmpty', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-join">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-join', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-keyBy">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-keyBy', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-keys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-keys', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-last">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-last', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-macro">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-macro', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-make">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-make', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-map">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-map', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mapInto">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mapInto', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mapSpread">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mapSpread', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mapToGroups">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mapToGroups', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mapWithKeys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mapWithKeys', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-max">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-max', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-median">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-median', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-merge">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-merge', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mergeRecursive">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mergeRecursive', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mint">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mint', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mode">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mode', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-nth">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-nth', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-only">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-only', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pad">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pad', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-partition">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-partition', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pipe">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pipe', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pluck">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pluck', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pop">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pop', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pretend">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pretend', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pull">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pull', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-push">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-push', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-put">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-put', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-random">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-random', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-reduce">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-reduce', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-reject">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-reject', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-replace">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-replace', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-replaceRecursive">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-replaceRecursive', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-reverse">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-reverse', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-search">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-search', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-shift">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-shift', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-shuffle">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-shuffle', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-skip">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-skip', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-slice">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-slice', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-some">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-some', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sort">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sort', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortBy">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortBy', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortByDesc">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortByDesc', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortDesc">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortDesc', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortkeys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortkeys', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortKeysDesc">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortKeysDesc', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-splice">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-splice', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-split">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-split', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sum">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sum', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-take">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-take', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-tap">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-tap', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-times">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-times', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-toArray">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-toArray', function () {

    // dump(

    // );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-toJson">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-toJson', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-transform">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-transform', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-union">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-union', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unique">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unique', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unique">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unique', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-uniqueStrict">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-uniqueStrict', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unless">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unless', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unlessEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unlessEmpty', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unlessNotEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unlessNotEmpty', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unwrap">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unwrap', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-values">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-values', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-when">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-when', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whenEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whenEmpty', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whenNotEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whenNotEmpty', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-where">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-where', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereStrict">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereStrict', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereBetween">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereBetween', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereIn">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereIn', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereInStrict">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereInStrict', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereInstanceOf">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereInstanceOf', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereNotBetween">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereNotBetween', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereNotIn">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereNotIn', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereNotInStrict">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereNotInStrict', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-wrap">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-wrap', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-zip">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-zip', function () {

    dump(

    );

    $desc = '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">This is the last collection method! Go Back</a></p>';
    return $desc;
});

/*
 * Eloquent: Relationships
 *
 * The following route closures test the code that implement relationships
 * https://laravel.com/docs/master/eloquent-relationships
 * https://laravel-news.com/learn-to-use-model-factories-in-laravel-5-1
 *         see laravel documentation above for more details on how to use relationships
 *         Each route will
 *             first remove all data in the related tables
 *             then generate data and implement the relations
 *             then use the relationships to output related data
 */

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

    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
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

    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
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

    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
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
    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;

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

    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
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

    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

Route::get('/polymorphic-one-to-many', function () {
    App\PolymorphicComment::truncate();
    App\User::truncate();
    App\Country::truncate();
    App\Supplier::truncate();
    App\Post::truncate();
    App\Video::truncate();

    // create 3 post
    // then create 5 comments for that post

    $posts = factory(App\Post::class, 3)
        ->create()
        ->each(function ($post) {
            $post->polymorphicComments()
                ->createMany(
                    factory(App\PolymorphicComment::class, 5)->make()->toArray()
                );
        });

    // or if you already had a post...this will create a single post with 5 comments
    // $post->polymorphicComments()
    //      ->createMany(
    //         factory(App\PolymorphicComment::class, 5)->make()->toArray()
    //     );
    //

    // or create a single comment
    // $post->polymorphicComments()
    //      ->create(['body' => 'First Cool Comment']);
    //

    // let's add another comment to the same post
    // $post->polymorphicComments()
    //      ->create(['body' => 'Cool Comment again']);
    //

    // create 3 video
    // then create 5 comments for that video
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

    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

Route::get('/polymorphic-many-to-many', function () {
    App\Taggable::truncate();
    App\Tag::truncate();
    App\User::truncate();
    App\Country::truncate();
    App\Supplier::truncate();
    App\Post::truncate();
    App\Video::truncate();

    // create 20 tags
    $tags = factory(App\Tag::class, 20)->create();

    // create 20 videos
    $videos = factory(App\Video::class, 20)
        ->create()
        ->each(function ($video) use ($tags) {
            // Attaching a random number of tags to each video
            $video->tags()->attach(
                $tags->random(rand(1, 20))->pluck('id')->toArray()
            );
        });
    //
    // create 20 posts
    $posts = factory(App\Post::class, 20)
        ->create()
        ->each(function ($post) use ($tags) {
            // Attaching a random number of tags to each post
            $post->tags()->attach(
                $tags->random(rand(1, 20))->pluck('id')->toArray()
            );
        });

    // Retrieve all of the tags for post with id of 1
    $postA = App\Post::find(1);
    // Retrieve all of the tags for post with id of 2
    $postB = App\Post::find(2);
    dump($postA->tags);
    dump($postB->tags);

    // foreach ($post->tags as $tag) {
    //     //
    // }
    //

    // Retrieve all of the tags for video with id of 1
    $videoA = App\Video::find(1);
    // Retrieve all of the tags for video with id of 2
    $videoB = App\Video::find(2);

    dump($videoA->tags);
    dump($videoB->tags);

    // retrieve all of the owners of a polymorphic relation from the polymorphic model
    //      by accessing the name of the method
    //          that performs the call to the morphByMany()
    // in other words retrieve all of the videos and posts for a specific tag
    $tag = App\Tag::find(1);
    dump($tag->videos);
    dump($tag->posts);
    // foreach ($tag->videos as $video) {
    //     //
    // }

    // php artisan tinker
    // Psy Shell v0.9.12 (PHP 7.3.9 — cli) by Justin Hileman
    // >>> $post = App\Post::first();
    // => null
    // >>> $post = factory(App\Post::class)->create();
    // => App\Post {#3187
    //      title: "qui",
    //      user_id: 1,
    //      updated_at: "2020-01-31 15:38:56",
    //      created_at: "2020-01-31 15:38:56",
    //      id: 1,
    //    }
    // >>> $post->tags()->create(['name' => 'laravel']);
    // => App\Tag {#3183
    //      name: "laravel",
    //      updated_at: "2020-01-31 15:41:41",
    //      created_at: "2020-01-31 15:41:41",
    //      id: 1,
    //    }
    // >>> $post->tags()->create(['name' => 'eloquent']);
    // => App\Tag {#3185
    //      name: "eloquent",
    //      updated_at: "2020-01-31 15:45:44",
    //      created_at: "2020-01-31 15:45:44",
    //      id: 2,
    //    }
    // >>> $video = factory(App\Video::class)->create();
    // => App\Video {#3246
    //      title: "illum",
    //      url: "http://www.quitzon.com/",
    //      updated_at: "2020-01-31 15:47:34",
    //      created_at: "2020-01-31 15:47:34",
    //      id: 4,
    //    }
    // >>>
    // >>> $video->tags()->create(['name' => 'php']);
    // => App\Tag {#3152
    //      name: "php",
    //      updated_at: "2020-01-31 15:50:50",
    //      created_at: "2020-01-31 15:50:50",
    //      id: 3,
    //    }
    //
    //  now lets attach the laravel tag which has an id of 1 to the video
    // >>> $video->tags()->attach(1);
    // => null

    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

Route::get('/polymorphic-types-custom', function () {
    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

// Querying Relations

Route::get('/methods-vs-dynamic-properties', function () {
    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

Route::get('/query-existence', function () {
    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

Route::get('/query-absence', function () {
    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

Route::get('/query-polymorphic', function () {
    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

Route::get('/counting-related-models', function () {
    $desc = '<p>Get all of the items in the collection.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    return $desc;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
