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
    ); // [1, 2, 3]

    $desc = '<p>The all method returns the underlying array represented by the collection:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-average">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-average', function () {
    dump(
        collect([1, 2, 3])->average()
    );
    $desc = '<p>Alias for the avg method.</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-avg">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-avg', function () {
    dump(
        $average = collect([
            ['foo' => 10],
            ['foo' => 10],
            ['foo' => 20],
            ['foo' => 40],
        ])->avg('foo')
    ); // 20

    dump(
        $average = collect([1, 1, 2, 4])->avg()
    ); // 2

    $desc = '<p>The avg method returns the average value of a given key:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-chunk">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-chunk', function () {
    $collection = collect([1, 2, 3, 4, 5, 6, 7]);
    $chunks = $collection->chunk(4);

    dump(
        $chunks->toArray()
    ); // [[1, 2, 3, 4], [5, 6, 7]]

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
    ); // [1, 2, 3, 4, 5, 6, 7, 8, 9]

    $desc = '<p>The collapse method collapses a collection of arrays into a single, flat collection</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-combine">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-combine', function () {
    $collection = collect(['name', 'age']);
    $combined = $collection->combine(['George', 29]);

    dump(
        $combined->all()
    ); // ['name' => 'George', 'age' => 29]

    $desc = '<p>The combine method combines the values of the collection, as keys, with the values of another array or collection:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-collect">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-collect', function () {
    $collectionA = collect([1, 2, 3]);

    dump(
        $collectionB = $collectionA->collect()
    ); // [1, 2, 3]

    $lazyCollection = Illuminate\Support\LazyCollection::make(function () {
        yield 1;
        yield 2;
        yield 3;
    });

    dump(
        $collection = $lazyCollection->collect()
    );

    dump(
        get_class($collection)
    ); // 'Illuminate\Support\Collection'

    dump(
        $collection->all()
    ); // [1, 2, 3]

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
    ); // ['John Doe', 'Jane Doe', 'Johnny Doe']

    $desc = '<p>The concat method appends the given array or collection values onto the end of the collection:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-contains">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-contains', function () {
    $collection = collect(['name' => 'Desk', 'price' => 100]);

    dump(
        $collection->contains('Desk')
    ); // true

    dump(
        $collection->contains('New York')
    ); // false

    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 100],
    ]);

    dump(
        $collection->contains('product', 'Bookcase')
    ); // false

    $collection = collect([1, 2, 3, 4, 5]);
    dump(
        $collection->contains(function ($value, $key) {
            return $value > 5;
        })
    ); // false

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
        $collection->count()
    ); // 4

    $desc = '<p>The count method returns the total number of items in the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-countBy">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-countBy', function () {

    $collection = collect([1, 2, 2, 2, 3]);

    $counted = $collection->countBy();

    dump(
        $counted->all()
    ); // [1 => 1, 2 => 3, 3 => 1]

    $collection = collect(['alice@gmail.com', 'bob@yahoo.com', 'carlos@gmail.com']);

    $counted = $collection->countBy(function ($email) {
        return substr(strrchr($email, "@"), 1);
    });

    dump(
        $counted->all()
    ); // ['gmail.com' => 2, 'yahoo.com' => 1]

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

    dump(
        $diff->all()
    ); // [1, 3, 5]

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

    dump(
        $diff->all()
    ); // ['color' => 'orange', 'remain' => 6]

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
    ); // ['one' => 10, 'three' => 30, 'five' => 50]

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
    items: array:2 [
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
    ); // [2 => 'a', 4 => 'b']

    $employees = collect([
        ['email' => 'abigail@example.com', 'position' => 'Developer'],
        ['email' => 'james@example.com', 'position' => 'Designer'],
        ['email' => 'victoria@example.com', 'position' => 'Developer'],
    ]);

    dump(
        $employees->duplicates('position')
    ); // [2 => 'Developer']

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
    ); // false

    $collection = collect([]);

    dump(
        $collection->every(function ($value, $key) {
            return $value > 2;
        })
    ); // true

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
    ); // ['product_id' => 1]

    $desc = '<p>The except method returns all items in the collection except for those with the specified keys:</p>';
    $desc .= '<p>For the inverse of except, see the only method.</p>';
    $desc .= '<p>This methods behavior is modified when using Eloquent Collections.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-filter">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-filter', function () {
    $collection = collect([1, 2, 3, 4]);

    $filtered = $collection->filter(function ($value, $key) {
        return $value > 2;
    });

    dump(
        $filtered->all()
    ); // [3, 4]

    $collection = collect([1, 2, 3, null, false, '', 0, []]);

    dump(
        $collection->filter()->all()
    ); // [1, 2, 3]

    $desc = '<p>The filter method filters the collection using the given callback, keeping only those items that pass a given truth test:</p>';
    $desc .= '<p>If no callback is supplied, all entries of the collection that are equivalent to false will be removed:</p>';
    $desc .= '<p>For the inverse of filter, see the reject method.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-first">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-first', function () {
    dump(
        collect([1, 2, 3, 4])->first(function ($value, $key) {
            return $value > 2;
        })
    ); // 3

    dump(
        collect([1, 2, 3, 4])->first()
    ); // 1

    $desc = '<p>The first method returns the first element in the collection that passes a given truth test:</p>';
    $desc .= '<p>You may also call the first method with no arguments to get the first element in the collection. If the collection is empty, null is returned:</p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-firstWhere">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-firstWhere', function () {
    $collection = collect([
        ['name' => 'Regena', 'age' => null],
        ['name' => 'Linda', 'age' => 14],
        ['name' => 'Diego', 'age' => 23],
        ['name' => 'Linda', 'age' => 84],
    ]);

    dump(
        $collection->firstWhere('name', 'Linda')
    ); // ['name' => 'Linda', 'age' => 14]

    dump(
        $collection->firstWhere('age', '>=', 18)
    ); // ['name' => 'Diego', 'age' => 23]

    dump(
        $collection->firstWhere('age')
    ); // ['name' => 'Linda', 'age' => 14]

    $desc = '<p>The firstWhere method returns the first element in the collection with the given key / value pair:</p>';
    $desc .= '<p>You may also call the firstWhere method with an operator:</p>';
    $desc .= '<p>Like the where method, you may pass one argument to the firstWhere method. In this scenario, the firstWhere method will return the first item where the given item keys value is "truthy":</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-flatMap">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-flatMap', function () {

    $collection = collect([
        ['name' => 'Sally'],
        ['school' => 'Arkansas'],
        ['age' => 28],
    ]);

    $flattened = $collection->flatMap(function ($values) {
        return array_map('strtoupper', $values);
    });

    dump(
        $flattened->all()
    ); // ['name' => 'SALLY', 'school' => 'ARKANSAS', 'age' => '28'];

    $desc = '<p>The flatMap method iterates through the collection and passes each value to the given callback.</p>';
    $desc .= '<p>The callback is free to modify the item and return it, thus forming a new collection of modified items.</p>';
    $desc .= '<p>Then, the array is flattened by a level:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-flatten">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-flatten', function () {

    $collection = collect(['name' => 'taylor', 'languages' => ['php', 'javascript']]);

    $flattened = $collection->flatten();

    dump(
        $flattened->all()
    ); // ['taylor', 'php', 'javascript'];

    $collection = collect([
        'Apple' => [
            ['name' => 'iPhone 6S', 'brand' => 'Apple'],
        ],
        'Samsung' => [
            ['name' => 'Galaxy S7', 'brand' => 'Samsung'],
        ],
    ]);

    $products = $collection->flatten(1);

    dump(
        $products->values()->all()
    );

    /*
    [
    ['name' => 'iPhone 6S', 'brand' => 'Apple'],
    ['name' => 'Galaxy S7', 'brand' => 'Samsung'],
    ]
     */

    $desc = '<p>The flatten method flattens a multi-dimensional collection into a single dimension:</p>';
    $desc .= '<p>You may optionally pass the function a "depth" argument:</p>';
    $desc .= '<p>In this example, calling flatten without providing the depth would have also flattened the nested arrays, resulting in ["iPhone 6S", "Apple", "Galaxy S7", "Samsung"]. Providing a depth allows you to restrict the levels of nested arrays that will be flattened.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-flip">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-flip', function () {

    $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);

    $flipped = $collection->flip();

    dump(
        $flipped->all()
    ); // ['taylor' => 'name', 'laravel' => 'framework']

    $desc = '<p>The flip method swaps the collections keys with their corresponding values:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-forget">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-forget', function () {

    $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);

    $collection->forget('name');

    dump(
        $collection->all()
    ); // ['framework' => 'laravel']

    $desc = '<p>The forget method removes an item from the collection by its key:</p>';
    $desc .= '<p>Unlike most other collection methods, forget does not return a new modified collection; it modifies the collection it is called on.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-forPage">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-forPage', function () {

    $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);

    $chunk = $collection->forPage(2, 3);

    dump(
        $chunk->all()
    ); // [4, 5, 6]

    $desc = '<p>The forPage method returns a new collection containing the items that would be present on a given page number. </p>';
    $desc .= '<p>The method accepts the page number as its first argument and the number of items to show per page as its second argument:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-get">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-get', function () {

    $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);

    dump(
        $value = $collection->get('name')
    ); // taylor

    $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);

    dump(
        $value = $collection->get('foo', 'default-value')
    ); // default-value  (if 'foo' key does not exist then return 'default-value')

    dump(
        $collection->get('email', function () {
            return 'default-value';
        })
    ); // default-value

    $desc = '<p>The get method returns the item value at a given key. </p>';
    $desc .= '<p>If the key does not exist, null is returned:</p>';
    $desc .= '<p>You may optionally pass a default value as the second argument:</p>';
    $desc .= '<p>You may even pass a callback as the default value. </p>';
    $desc .= '<p>The result of the callback will be returned if the specified key does not exist:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-groupBy">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-groupBy', function () {

    $collection = collect([
        ['account_id' => 'account-x10', 'product' => 'Chair'],
        ['account_id' => 'account-x10', 'product' => 'Bookcase'],
        ['account_id' => 'account-x11', 'product' => 'Desk'],
    ]);

    $grouped = $collection->groupBy('account_id');

    dump(
        $grouped->toArray()
    );

    /*
    [
    'account-x10' => [
    ['account_id' => 'account-x10', 'product' => 'Chair'],
    ['account_id' => 'account-x10', 'product' => 'Bookcase'],
    ],
    'account-x11' => [
    ['account_id' => 'account-x11', 'product' => 'Desk'],
    ],
    ]
     */

    $grouped = $collection->groupBy(function ($item, $key) {
        return substr($item['account_id'], -3);
    });

    dump(
        $grouped->toArray()
    );

    /*
    [
    'x10' => [
    ['account_id' => 'account-x10', 'product' => 'Chair'],
    ['account_id' => 'account-x10', 'product' => 'Bookcase'],
    ],
    'x11' => [
    ['account_id' => 'account-x11', 'product' => 'Desk'],
    ],
    ]
     */

    $data = new Illuminate\Support\Collection([
        10 => ['user' => 1, 'skill' => 1, 'roles' => ['Role_1', 'Role_3']],
        20 => ['user' => 2, 'skill' => 1, 'roles' => ['Role_1', 'Role_2']],
        30 => ['user' => 3, 'skill' => 2, 'roles' => ['Role_1']],
        40 => ['user' => 4, 'skill' => 2, 'roles' => ['Role_2']],
    ]);

    dump(
        $result = $data->groupBy([
            'skill',
            function ($item) {
                return $item['roles'];
            },
        ], $preserveKeys = true)
    );

    /*
    [
    1 => [
    'Role_1' => [
    10 => [
    'user' => 1, 'skill' => 1, 'roles' => [
    'Role_1',
    'Role_3'
    ]
    ],
    20 => [
    'user' => 2, 'skill' => 1, 'roles' => [
    'Role_1',
    'Role_2'
    ]
    ],
    ],
    'Role_2' => [
    20 => [
    'user' => 2, 'skill' => 1, 'roles' => [
    'Role_1', 'Role_2'
    ]
    ],
    ],
    'Role_3' => [
    10 => [
    'user' => 1, 'skill' => 1, 'roles' => [
    'Role_1', 'Role_3'
    ]
    ],
    ],
    ],
    2 => [
    'Role_1' => [
    30 => [
    'user' => 3, 'skill' => 2, 'roles' => [
    'Role_1'
    ]
    ],
    ],
    'Role_2' => [
    40 => [
    'user' => 4, 'skill' => 2, 'roles' => [
    'Role_2'
    ]
    ],
    ],
    ],
    ];
     */

    $desc = '<p>The groupBy method groups the collections items by a given key:</p>';
    $desc .= '<p>Instead of passing a string key, you may pass a callback. </p>';
    $desc .= '<p>The callback should return the value you wish to key the group by:</p>';
    $desc .= '<p>Multiple grouping criteria may be passed as an array. </p>';
    $desc .= '<p>Each array element will be applied to the corresponding level within a multi-dimensional array:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-has">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-has', function () {

    $collection = collect(['account_id' => 1, 'product' => 'Desk', 'amount' => 5]);

    dump(
        $collection->has('product')
    ); // true

    dump(
        $collection->has(['product', 'amount'])
    ); // true

    dump(
        $collection->has(['amount', 'price'])
    ); // false

    $desc = '<p>The has method determines if a given key exists in the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-implode">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-implode', function () {

    $collection = collect([
        ['account_id' => 1, 'product' => 'Desk'],
        ['account_id' => 2, 'product' => 'Chair'],
    ]);

    dump(
        $collection->implode('product', ', ')
    ); // Desk, Chair

    dump(
        collect([1, 2, 3, 4, 5])->implode('-')
    ); // '1-2-3-4-5'

    $desc = '<p>The implode method joins the items in a collection.  </p>';
    $desc .= '<p>Its arguments depend on the type of items in the collection.</p>';
    $desc .= '<p>If the collection contains arrays or objects, you should pass the key of the attributes you wish to join, and the "glue" string you wish to place between the values:</p>';
    $desc .= '<p>If the collection contains simple strings or numeric values, pass the "glue" as the only argument to the method:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-intersect">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-intersect', function () {

    $collection = collect(['Desk', 'Sofa', 'Chair']);

    $intersect = $collection->intersect(['Desk', 'Chair', 'Bookcase']);

    dump(
        $intersect->all()
    ); // [0 => 'Desk', 2 => 'Chair']

    $desc = '<p>The intersect method removes any values from the original collection that are not present in the given array or collection. </p>';
    $desc .= '<p>The resulting collection will preserve the original collections keys:</p>';
    $desc .= '<p>This methods behavior is modified when using Eloquent Collections.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-intersectByKeys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-intersectByKeys', function () {

    $collection = collect([
        'serial' => 'UX301', 'type' => 'screen', 'year' => 2009,
    ]);

    $intersect = $collection->intersectByKeys([
        'reference' => 'UX404', 'type' => 'tab', 'year' => 2011,
    ]);

    dump(
        $intersect->all()
    ); // ['type' => 'screen', 'year' => 2009]

    $desc = '<p>The intersectByKeys method removes any keys from the original collection that are not present in the given array or collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-isEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-isEmpty', function () {

    dump(
        collect([])->isEmpty()
    ); // true

    $desc = '<p>The isEmpty method returns true if the collection is empty; otherwise, false is returned:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-isNotEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-isNotEmpty', function () {

    dump(
        collect([])->isNotEmpty()
    ); // false

    $desc = '<p>The isNotEmpty method returns true if the collection is not empty; otherwise, false is returned:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-join">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-join', function () {

    dump(
        collect(['a', 'b', 'c'])->join(', ')
    ); // 'a, b, c'

    dump(
        collect(['a', 'b', 'c'])->join(', ', ', and ')
    ); // 'a, b, and c'

    dump(
        collect(['a', 'b'])->join(', ', ' and ')
    ); // 'a and b'

    dump(
        collect(['a'])->join(', ', ' and ')
    ); // 'a'

    dump(
        collect([])->join(', ', ' and ')
    ); // ''

    $desc = '<p>The join method joins the collections values with a string:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-keyBy">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-keyBy', function () {

    $collection = collect([
        ['product_id' => 'prod-100', 'name' => 'Desk'],
        ['product_id' => 'prod-200', 'name' => 'Chair'],
    ]);

    $keyed = $collection->keyBy('product_id');

    dump(
        $keyed->all()
    );

/*
[
'prod-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
'prod-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
]
 */

    $keyed = $collection->keyBy(function ($item) {
        return strtoupper($item['product_id']);
    });

    dump(
        $keyed->all()
    );

/*
[
'PROD-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
'PROD-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
]
 */

    $desc = '<p>The keyBy method keys the collection by the given key. </p>';
    $desc .= '<p>If multiple items have the same key, only the last one will appear in the new collection:</p>';
    $desc .= '<p>You may also pass a callback to the method. </p>';
    $desc .= '<p>The callback should return the value to key the collection by:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-keys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-keys', function () {

    $collection = collect([
        'prod-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
        'prod-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
    ]);

    $keys = $collection->keys();

    dump(
        $keys->all()
    ); // ['prod-100', 'prod-200']

    $desc = '<p>The keys method returns all of the collections keys:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-last">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-last', function () {

    dump(
        collect([1, 2, 3, 4])->last(function ($value, $key) {
            return $value < 3;
        })
    ); // 2

    dump(
        collect([1, 2, 3, 4])->last()
    ); // 4

    $desc = '<p>The last method returns the last element in the collection that passes a given truth test:</p>';
    $desc .= '<p>You may also call the last method with no arguments to get the last element in the collection. If the collection is empty, null is returned:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-macro">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-macro', function () {

    $desc = '<p>The static macro method allows you to add methods to the Collection class at run time. </p>';
    $desc .= '<p>Refer to the documentation on <a href="https://laravel.com/docs/master/collections#extending-collections>">extending collections</a> for more information.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-make">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-make', function () {

    $desc = '<p>The static make method creates a new collection instance.</p>';
    $desc .= '<p>See the <a href="https://laravel.com/docs/master/collections#creating-collections">Creating Collections</a> section.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-map">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-map', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    $multiplied = $collection->map(function ($item, $key) {
        return $item * 2;
    });

    dump(
        $multiplied->all()
    ); // [2, 4, 6, 8, 10]

    $desc = '<p>The map method iterates through the collection and passes each value to the given callback.</p>';
    $desc .= '<p>The callback is free to modify the item and return it, thus forming a new collection of modified items:</p>';
    $desc .= '<p>Like most other collection methods, map returns a new collection instance;</p>';
    $desc .= '<p>it does not modify the collection it is called on. </p>';
    $desc .= '<p>If you want to transform the original collection, use the transform method.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mapInto">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mapInto', function () {

    class Currency {
        /**
         * Create a new currency instance.
         *
         * @param  string  $code
         * @return void
         */
        function __construct(string $code) {
            $this->code = $code;
        }
    }

    $collection = collect(['USD', 'EUR', 'GBP']);

    $currencies = $collection->mapInto(Currency::class);

    dump(
        $currencies->all()
    ); // [Currency('USD'), Currency('EUR'), Currency('GBP')]

    $desc = '<p>The mapInto() method iterates over the collection, creating a new instance of the given class by passing the value into the constructor:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mapSpread">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mapSpread', function () {

    $collection = collect([0, 1, 2, 3, 4, 5, 6, 7, 8, 9]);

    $chunks = $collection->chunk(2);

    $sequence = $chunks->mapSpread(function ($even, $odd) {
        return $even + $odd;
    });

    dump(
        $sequence->all()
    ); // [1, 5, 9, 13, 17]

    $desc = '<p>The mapSpread method iterates over the collections items, passing each nested item value into the given callback. </p>';
    $desc .= '<p>The callback is free to modify the item and return it, thus forming a new collection of modified items:</p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mapToGroups">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mapToGroups', function () {

    $collection = collect([
        [
            'name' => 'John Doe',
            'department' => 'Sales',
        ],
        [
            'name' => 'Jane Doe',
            'department' => 'Sales',
        ],
        [
            'name' => 'Johnny Doe',
            'department' => 'Marketing',
        ],
    ]);

    $grouped = $collection->mapToGroups(function ($item, $key) {
        return [$item['department'] => $item['name']];
    });

    dump(
        $grouped->toArray()
    );

/*
[
'Sales' => ['John Doe', 'Jane Doe'],
'Marketing' => ['Johnny Doe'],
]
 */

    dump(
        $grouped->get('Sales')->all()
    ); // ['John Doe', 'Jane Doe']

    $desc = '<p>The mapToGroups method groups the collections items by the given callback. </p>';
    $desc .= '<p>The callback should return an associative array containing a single key / value pair, </p>';
    $desc .= '<p>thus forming a new collection of grouped values:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mapWithKeys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mapWithKeys', function () {

    $collection = collect([
        [
            'name' => 'John',
            'department' => 'Sales',
            'email' => 'john@example.com',
        ],
        [
            'name' => 'Jane',
            'department' => 'Marketing',
            'email' => 'jane@example.com',
        ],
    ]);

    $keyed = $collection->mapWithKeys(function ($item) {
        return [$item['email'] => $item['name']];
    });

    dump(
        $keyed->all()
    );

/*
[
'john@example.com' => 'John',
'jane@example.com' => 'Jane',
]
 */

    $desc = '<p>The mapWithKeys method iterates through the collection and passes each value to the given callback. </p>';
    $desc .= '<p>The callback should return an associative array containing a single key / value pair:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-max">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-max', function () {

    dump(
        $max = collect([['foo' => 10], ['foo' => 20]])->max('foo')
    ); // 20

    dump(
        $max = collect([1, 2, 3, 4, 5])->max()
    ); // 5

    $desc = '<p>The max method returns the maximum value of a given key:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-median">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-median', function () {

    dump(
        $median = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->median('foo')
    ); // 15

    dump(
        $median = collect([1, 1, 2, 4])->median()
    ); // 1.5

    $desc = '<p>The median method returns the median value of a given key:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-merge">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-merge', function () {

    $collection = collect(['product_id' => 1, 'price' => 100]);

    $merged = $collection->merge(['price' => 200, 'discount' => false]);

    dump(
        $merged->all()
    ); // ['product_id' => 1, 'price' => 200, 'discount' => false]

    $collection = collect(['Desk', 'Chair']);

    $merged = $collection->merge(['Bookcase', 'Door']);

    dump(
        $merged->all()
    ); // ['Desk', 'Chair', 'Bookcase', 'Door']

    $desc = '<p>The merge method merges the given array or collection with the original collection. </p>';
    $desc .= '<p>If a string key in the given items matches a string key in the original collection, the given items value will overwrite the value in the original collection:</p>';
    $desc .= '<p>If the given items keys are numeric, the values will be appended to the end of the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mergeRecursive">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mergeRecursive', function () {

    $collection = collect(['product_id' => 1, 'price' => 100]);

    $merged = $collection->mergeRecursive(['product_id' => 2, 'price' => 200, 'discount' => false]);

    dump(
        $merged->all()
    ); // ['product_id' => [1, 2], 'price' => [100, 200], 'discount' => false]

    $desc = '<p>The mergeRecursive method merges the given array or collection recursively with the original collection. </p>';
    $desc .= '<p>If a string key in the given items matches a string key in the original collection, then the values for these keys are merged together into an array, and this is done recursively:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-min">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-min', function () {

    dump(
        $min = collect([['foo' => 10], ['foo' => 20]])->min('foo')
    ); // 10

    dump(
        $min = collect([1, 2, 3, 4, 5])->min()
    ); // 1

    $desc = '<p>The min method returns the minimum value of a given key:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-mode">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-mode', function () {

    dump(
        $mode = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->mode('foo')
    ); // [10]

    dump(
        $mode = collect([1, 1, 2, 4])->mode()
    ); // [1]

    $desc = '<p>The mode method returns the mode value of a given key:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-nth">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-nth', function () {

    $collection = collect(['a', 'b', 'c', 'd', 'e', 'f']);

    dump(
        $collection->nth(4)
    ); // ['a', 'e']

    dump(
        $collection->nth(4, 1)
    ); // ['b', 'f']

    $desc = '<p>The nth method creates a new collection consisting of every n-th element:</p>';
    $desc .= '<p>You may optionally pass an offset as the second argument:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-only">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-only', function () {

    $collection = collect(['product_id' => 1, 'name' => 'Desk', 'price' => 100, 'discount' => false]);

    $filtered = $collection->only(['product_id', 'name']);

    dump(
        $filtered->all()
    ); // ['product_id' => 1, 'name' => 'Desk']

    $desc = '<p>The only method returns the items in the collection with the specified keys:</p>';
    $desc .= '<p>For the inverse of only, see the except method.</p>';
    $desc .= '<p>This methods behavior is modified when using Eloquent Collections.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pad">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pad', function () {

    $collection = collect(['A', 'B', 'C']);

    $filtered = $collection->pad(5, 0);

    dump(
        $filtered->all()
    ); // ['A', 'B', 'C', 0, 0]

    $filtered = $collection->pad(-5, 0);

    dump(
        $filtered->all()
    ); // [0, 0, 'A', 'B', 'C']

    $desc = '<p>The pad method will fill the array with the given value until the array reaches the specified size.</p>';
    $desc .= '<p>This method behaves like the array_pad PHP function.</p>';
    $desc .= '<p>To pad to the left, you should specify a negative size. No padding will take place if the absolute value of the given size is less than or equal to the length of the array:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-partition">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-partition', function () {

    $collection = collect([1, 2, 3, 4, 5, 6]);

    list($underThree, $equalOrAboveThree) = $collection->partition(function ($i) {
        return $i < 3;
    });

    dump(
        $underThree->all()
    ); // [1, 2]

    dump(
        $equalOrAboveThree->all()
    ); // [3, 4, 5, 6]

    $desc = '<p>The partition method may be combined with the list PHP function to separate elements that pass a given truth test from those that do not:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pipe">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pipe', function () {

    $collection = collect([1, 2, 3]);

    dump(
        $piped = $collection->pipe(function ($collection) {
            return $collection->sum();
        })
    ); // 6

    $desc = '<p>The pipe method passes the collection to the given callback and returns the result:</p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pluck">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pluck', function () {

    $collection = collect([
        ['product_id' => 'prod-100', 'name' => 'Desk'],
        ['product_id' => 'prod-200', 'name' => 'Chair'],
    ]);

    $plucked = $collection->pluck('name');

    dump(
        $plucked->all()
    ); // ['Desk', 'Chair']

    $plucked = $collection->pluck('name', 'product_id');

    dump(
        $plucked->all()
    ); // ['prod-100' => 'Desk', 'prod-200' => 'Chair']

    $collection = collect([
        ['brand' => 'Tesla', 'color' => 'red'],
        ['brand' => 'Pagani', 'color' => 'white'],
        ['brand' => 'Tesla', 'color' => 'black'],
        ['brand' => 'Pagani', 'color' => 'orange'],
    ]);

    $plucked = $collection->pluck('color', 'brand');

    dump(
        $plucked->all()
    ); // ['Tesla' => 'black', 'Pagani' => 'orange']

    $desc = '<p>The pluck method retrieves all of the values for a given key:</p>';
    $desc .= '<p>You may also specify how you wish the resulting collection to be keyed:</p>';
    $desc .= '<p>If duplicate keys exist, the last matching element will be inserted into the plucked collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pop">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pop', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    dump(
        $collection->pop()
    ); // 5

    dump(
        $collection->all()
    ); // [1, 2, 3, 4]

    $desc = '<p>The pop method removes and returns the last item from the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pretend">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pretend', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    $collection->prepend(0);

    dump(
        $collection->all()
    ); // [0, 1, 2, 3, 4, 5]

    $collection = collect(['one' => 1, 'two' => 2]);

    $collection->prepend(0, 'zero');

    dump(
        $collection->all()
    ); // ['zero' => 0, 'one' => 1, 'two' => 2]

    $desc = '<p>The prepend method adds an item to the beginning of the collection:</p>';
    $desc .= '<p>You may also pass a second argument to set the key of the prepended item:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-pull">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-pull', function () {

    $collection = collect(['product_id' => 'prod-100', 'name' => 'Desk']);

    dump(
        $collection->pull('name')
    ); // 'Desk'

    dump(
        $collection->all()
    ); // ['product_id' => 'prod-100']

    $desc = '<p>The pull method removes and returns an item from the collection by its key:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-push">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-push', function () {

    $collection = collect([1, 2, 3, 4]);

    $collection->push(5);

    dump(
        $collection->all()
    ); // [1, 2, 3, 4, 5]

    $desc = '<p>The push method appends an item to the end of the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-put">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-put', function () {

    $collection = collect(['product_id' => 1, 'name' => 'Desk']);

    $collection->put('price', 100);

    dump(
        $collection->all()
    ); // ['product_id' => 1, 'name' => 'Desk', 'price' => 100]

    $desc = '<p>The put method sets the given key and value in the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-random">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-random', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    dump(
        $collection->random()
    ); // 4 - (retrieved randomly)

    $random = $collection->random(3);

    dump(
        $random->all()
    ); // [2, 4, 5] - (retrieved randomly)

    $desc = '<p>The random method returns a random item from the collection:</p>';
    $desc .= '<p>You may optionally pass an integer to random to specify how many items you would like to randomly retrieve. </p>';
    $desc .= '<p>A collection of items is always returned when explicitly passing the number of items you wish to receive:</p>';
    $desc .= '<p>If the Collection has fewer items than requested, the method will throw an InvalidArgumentException.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-reduce">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-reduce', function () {

    $collection = collect([1, 2, 3]);

    dump(
        $total = $collection->reduce(function ($carry, $item) {
            return $carry + $item;
        })
    ); // 6

    dump(
        $collection->reduce(function ($carry, $item) {
            return $carry + $item;
        }, 4)
    ); // 10

    $desc = '<p>The reduce method reduces the collection to a single value, passing the result of each iteration into the subsequent iteration:</p>';
    $desc .= '<p>The value for $carry on the first iteration is null; however, you may specify its initial value by passing a second argument to reduce:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-reject">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-reject', function () {

    $collection = collect([1, 2, 3, 4]);

    $filtered = $collection->reject(function ($value, $key) {
        return $value > 2;
    });

    dump(
        $filtered->all()
    ); // [1, 2]

    $desc = '<p>The reject method filters the collection using the given callback. </p>';
    $desc .= '<p>The callback should return true if the item should be removed from the resulting collection:</p>';
    $desc .= '<p>For the inverse of the reject method, see the filter method.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-replace">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-replace', function () {

    $collection = collect(['Taylor', 'Abigail', 'James']);

    $replaced = $collection->replace([1 => 'Victoria', 3 => 'Finn']);

    dump(
        $replaced->all()
    ); // ['Taylor', 'Victoria', 'James', 'Finn']

    $desc = '<p>The replace method behaves similarly to merge; </p>';
    $desc .= '<p>however, in addition to overwriting matching items with string keys, </p>';
    $desc .= '<p>the replace method will also overwrite items in the collection that have matching numeric keys:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-replaceRecursive">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-replaceRecursive', function () {

    $collection = collect(['Taylor', 'Abigail', ['James', 'Victoria', 'Finn']]);

    $replaced = $collection->replaceRecursive(['Charlie', 2 => [1 => 'King']]);

    dump(
        $replaced->all()
    ); // ['Charlie', 'Abigail', ['James', 'King', 'Finn']]

    $desc = '<p>This method works like replace, but it will recur into arrays and apply the same replacement process to the inner values:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-reverse">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-reverse', function () {

    $collection = collect(['a', 'b', 'c', 'd', 'e']);

    $reversed = $collection->reverse();

    dump(
        $reversed->all()
    );

/*
[
4 => 'e',
3 => 'd',
2 => 'c',
1 => 'b',
0 => 'a',
]
 */

    $desc = '<p>The reverse method reverses the order of the collections items, preserving the original keys:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-search">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-search', function () {

    $collection = collect([2, 4, 6, 8]);

    dump(
        $collection->search(4)
    ); // 1

    dump(
        $collection->search('4', true)
    ); // false

    dump(
        $collection->search(function ($item, $key) {
            return $item > 5;
        })
    ); // 2

    $desc = '<p>The search method searches the collection for the given value and returns its key if found. If the item is not found, false is returned.</p>';
    $desc .= '<p>The search is done using a "loose" comparison, meaning a string with an integer value will be considered equal to an integer of the same value. To use "strict" comparison, pass true as the second argument to the method:</p>';
    $desc .= '<p>Alternatively, you may pass in your own callback to search for the first item that passes your truth test:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-shift">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-shift', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    dump(
        $collection->shift()
    ); // 1

    dump(
        $collection->all()
    ); // [2, 3, 4, 5]

    $desc = '<p>The shift method removes and returns the first item from the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-shuffle">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-shuffle', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    $shuffled = $collection->shuffle();

    dump(
        $shuffled->all()
    ); // [3, 2, 5, 1, 4] - (generated randomly)

    $desc = '<p>The shuffle method randomly shuffles the items in the collection:</p>';
    $desc .= '<p>refresh the browser and the array values will generate randomly</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-skip">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-skip', function () {

    $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

    $collection = $collection->skip(4);

    dump(
        $collection->all()
    ); // [5, 6, 7, 8, 9, 10]

    $desc = '<p>The skip method returns a new collection, without the first given amount of items:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-slice">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-slice', function () {

    $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

    $slice = $collection->slice(4);

    dump(
        $slice->all()
    ); // [5, 6, 7, 8, 9, 10]

    $slice = $collection->slice(4, 2);

    dump(
        $slice->all()
    ); // [5, 6]

    $desc = '<p>The slice method returns a slice of the collection starting at the given index:</p>';
    $desc .= '<p>If you would like to limit the size of the returned slice, pass the desired size as the second argument to the method:</p>';
    $desc .= '<p>The returned slice will preserve keys by default. If you do not wish to preserve the original keys, you can use the values method to reindex them.</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-some">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-some', function () {

    $desc = '<p>Alias for the contains method.</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sort">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sort', function () {

    $collection = collect([5, 3, 1, 2, 4]);

    $sorted = $collection->sort();

    dump(
        $sorted->values()->all()
    ); // [1, 2, 3, 4, 5]

    $desc = '<p>The sort method sorts the collection. </p>';
    $desc .= '<p>The sorted collection keeps the original array keys, so in this example we will use the values method to reset the keys to consecutively numbered indexes:</p>';
    $desc .= '<p>If your sorting needs are more advanced, you may pass a callback to sort with your own algorithm. Refer to the PHP documentation on uasort, which is what the collections sort method calls under the hood.</p>';
    $desc .= '<p>Refer to the PHP documentation on uasort, which is what the collections sort method calls under the hood.</p>';
    $desc .= '<p>If you need to sort a collection of nested arrays or objects, see the sortBy and sortByDesc methods.</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortBy">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortBy', function () {
    dump(
        $collection = collect([
            ['name' => 'Desk', 'price' => 200],
            ['name' => 'Chair', 'price' => 100],
            ['name' => 'Bookcase', 'price' => 150],
        ])
    );

    $sorted = $collection->sortBy('price');

    dump(
        $sorted->values()->all()
    );

/*
[
['name' => 'Chair', 'price' => 100],
['name' => 'Bookcase', 'price' => 150],
['name' => 'Desk', 'price' => 200],
]
 */

    dump(
        $collection = collect([
            ['name' => 'Desk', 'colors' => ['Black', 'Mahogany']],
            ['name' => 'Chair', 'colors' => ['Black']],
            ['name' => 'Bookcase', 'colors' => ['Red', 'Beige', 'Brown']],
        ])
    );

    $sorted = $collection->sortBy(function ($product, $key) {
        return count($product['colors']);
    });

    dump(
        $sorted->values()->all()
    );

/*
[
['name' => 'Chair', 'colors' => ['Black']],
['name' => 'Desk', 'colors' => ['Black', 'Mahogany']],
['name' => 'Bookcase', 'colors' => ['Red', 'Beige', 'Brown']],
]
 */

    $desc = '<p>The sortBy method sorts the collection by the given key. </p>';
    $desc .= '<p>The sorted collection keeps the original array keys, so in this example we will use the values method to reset the keys to consecutively numbered indexes:</p>';
    $desc .= '<p>You can also pass your own callback to determine how to sort the collection values:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortByDesc">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortByDesc', function () {

    $desc = '<p>This method has the same signature as the sortBy method, but will sort the collection in the opposite order.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortkeys">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortkeys', function () {

    $collection = collect([
        'id' => 22345,
        'first' => 'John',
        'last' => 'Doe',
    ]);

    $sorted = $collection->sortKeys();

    dump(
        $sorted->all()
    );

/*
[
'first' => 'John',
'id' => 22345,
'last' => 'Doe',
]
 */

    $desc = '<p>The sortKeys method sorts the collection by the keys of the underlying associative array:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sortKeysDesc">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sortKeysDesc', function () {

    $desc = '<p>This method has the same signature as the sortKeys method, but will sort the collection in the opposite order.</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-splice">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-splice', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    $chunk = $collection->splice(2);

    dump(
        $chunk->all()
    ); // [3, 4, 5]

    dump(
        $collection->all()
    ); // [1, 2]

    $collection = collect([1, 2, 3, 4, 5]);

    $chunk = $collection->splice(2, 1);

    dump(
        $chunk->all()
    ); // [3]

    dump(
        $collection->all()
    ); // [1, 2, 4, 5]

    $collection = collect([1, 2, 3, 4, 5]);

    $chunk = $collection->splice(2, 1, [10, 11]);

    dump(
        $chunk->all()
    ); // [3]

    dump(
        $collection->all()
    ); // [1, 2, 10, 11, 4, 5]

    $desc = '<p>The splice method removes and returns a slice of items starting at the specified index:</p>';
    $desc .= '<p>You may pass a second argument to limit the size of the resulting chunk:</p>';
    $desc .= '<p>In addition, you can pass a third argument containing the new items to replace the items removed from the collection:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-split">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-split', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    $groups = $collection->split(3);

    dump(
        $groups->toArray()
    ); // [[1, 2], [3, 4], [5]]

    $desc = '<p>The split method breaks a collection into the given number of groups:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-sum">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-sum', function () {

    dump(
        collect([1, 2, 3, 4, 5])->sum()
    ); // 15

    $collection = collect([
        ['name' => 'JavaScript: The Good Parts', 'pages' => 176],
        ['name' => 'JavaScript: The Definitive Guide', 'pages' => 1096],
    ]);

    dump(
        $collection->sum('pages')
    ); // 1272

    $collection = collect([
        ['name' => 'Chair', 'colors' => ['Black']],
        ['name' => 'Desk', 'colors' => ['Black', 'Mahogany']],
        ['name' => 'Bookcase', 'colors' => ['Red', 'Beige', 'Brown']],
    ]);

    dump(
        $collection->sum(function ($product) {
            return count($product['colors']);
        })
    ); // 6

    $desc = '<p>The sum method returns the sum of all items in the collection:</p>';
    $desc .= '<p>If the collection contains nested arrays or objects, you should pass a key to use for determining which values to sum:</p>';
    $desc .= '<p>In addition, you may pass your own callback to determine which values of the collection to sum:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-take">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-take', function () {

    $collection = collect([0, 1, 2, 3, 4, 5]);

    $chunk = $collection->take(3);

    dump(
        $chunk->all()
    ); // [0, 1, 2]

    $collection = collect([0, 1, 2, 3, 4, 5]);

    $chunk = $collection->take(-2);

    dump(
        $chunk->all()
    ); // [4, 5]

    $desc = '<p>The take method returns a new collection with the specified number of items:</p>';
    $desc .= '<p>You may also pass a negative integer to take the specified amount of items from the end of the collection:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-tap">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-tap', function () {

    dump(
        collect([2, 4, 3, 1, 5])
            ->sort()
            ->tap(function ($collection) {
                Log::debug('Values after sorting', $collection->values()->toArray());
            })
            ->shift()
    ); // 1

    $desc = '<p>The tap method passes the collection to the given callback, </p>';
    $desc .= '<p>allowing you to "tap" into the collection at a specific point </p>';
    $desc .= '<p>and do something with the items while not affecting the collection itself:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-times">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-times', function () {

    $collection = Illuminate\Support\Collection::times(10, function ($number) {
        return $number * 9;
    });

    dump(
        $collection->all()
    ); // [9, 18, 27, 36, 45, 54, 63, 72, 81, 90]

    $categories = Illuminate\Support\Collection::times(3, function ($number) {
        return factory(App\Category::class)->create(['name' => "Category No. $number"]);
    });

    dump(
        $categories->all()
    );

/*
[
['id' => 1, 'name' => 'Category No. 1'],
['id' => 2, 'name' => 'Category No. 2'],
['id' => 3, 'name' => 'Category No. 3'],
]
 */

    $desc = '<p>The static times method creates a new collection by invoking the callback a given amount of times:</p>';
    $desc .= '<p>This method can be useful when combined with factories to create Eloquent models:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-toArray">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-toArray', function () {

    $collection = collect(['name' => 'Desk', 'price' => 200]);

    dump(
        $collection->toArray()
    );

/*
[
['name' => 'Desk', 'price' => 200],
]
 */

    $desc = '<p>The toArray method converts the collection into a plain PHP array. </p>';
    $desc .= '<p>If the collections values are Eloquent models, the models will also be converted to arrays:</p>';
    $desc .= '<p>toArray also converts all of the collections nested objects that are an instance of Arrayable to an array.</p>';
    $desc .= '<p>If you want to get the raw underlying array, use the all method instead.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-toJson">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-toJson', function () {

    $collection = collect(['name' => 'Desk', 'price' => 200]);

    dump(
        $collection->toJson()
    ); // '{"name":"Desk", "price":200}'

    $desc = '<p>The toJson method converts the collection into a JSON serialized string:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-transform">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-transform', function () {

    $collection = collect([1, 2, 3, 4, 5]);

    $collection->transform(function ($item, $key) {
        return $item * 2;
    });

    dump(
        $collection->all()
    ); // [2, 4, 6, 8, 10]

    $desc = '<p>The transform method iterates over the collection and calls the given callback with each item in the collection. </p>';
    $desc .= '<p>The items in the collection will be replaced by the values returned by the callback:</p>';
    $desc .= '<p>Unlike most other collection methods, transform modifies the collection itself. </p>';
    $desc .= '<p>If you wish to create a new collection instead, use the map method.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-union">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-union', function () {
    $collection = collect([1 => ['a'], 2 => ['b']]);

    $union = $collection->union([3 => ['c'], 1 => ['b']]);

    dump(
        $union->all()
    ); // [1 => ['a'], 2 => ['b'], 3 => ['c']]

    $desc = '<p>The union method adds the given array to the collection. </p>';
    $desc .= '<p>If the given array contains keys that are already in the original collection, the original collections values will be preferred:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unique">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unique', function () {

    $collection = collect([1, 1, 2, 2, 3, 4, 2]);

    $unique = $collection->unique();

    dump(
        $unique->values()->all()
    ); // [1, 2, 3, 4]

    $collection = collect([
        ['name' => 'iPhone 6', 'brand' => 'Apple', 'type' => 'phone'],
        ['name' => 'iPhone 5', 'brand' => 'Apple', 'type' => 'phone'],
        ['name' => 'Apple Watch', 'brand' => 'Apple', 'type' => 'watch'],
        ['name' => 'Galaxy S6', 'brand' => 'Samsung', 'type' => 'phone'],
        ['name' => 'Galaxy Gear', 'brand' => 'Samsung', 'type' => 'watch'],
    ]);

    $unique = $collection->unique('brand');

    dump(
        $unique->values()->all()
    );

/*
[
['name' => 'iPhone 6', 'brand' => 'Apple', 'type' => 'phone'],
['name' => 'Galaxy S6', 'brand' => 'Samsung', 'type' => 'phone'],
]
 */

    $unique = $collection->unique(function ($item) {
        return $item['brand'] . $item['type'];
    });

    dump(
        $unique->values()->all()
    );

/*
[
['name' => 'iPhone 6', 'brand' => 'Apple', 'type' => 'phone'],
['name' => 'Apple Watch', 'brand' => 'Apple', 'type' => 'watch'],
['name' => 'Galaxy S6', 'brand' => 'Samsung', 'type' => 'phone'],
['name' => 'Galaxy Gear', 'brand' => 'Samsung', 'type' => 'watch'],
]
 */

    $desc = '<p>The unique method returns all of the unique items in the collection. </p>';
    $desc .= '<p>The returned collection keeps the original array keys, so in this example we will use the values method to reset the keys to consecutively numbered indexes:</p>';
    $desc .= '<p>When dealing with nested arrays or objects, you may specify the key used to determine uniqueness:</p>';
    $desc .= '<p>You may also pass your own callback to determine item uniqueness:</p>';
    $desc .= '<p>The unique method uses "loose" comparisons when checking item values, meaning a string with an integer value will be considered equal to an integer of the same value.</p>';
    $desc .= '<p>Use the uniqueStrict method to filter using "strict" comparisons.</p>';
    $desc .= '<p>This methods behavior is modified when using Eloquent Collections.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-uniqueStrict">Next Method</a></p>';
    return $desc;

});

Route::get('/collection-uniqueStrict', function () {

    $desc = '<p>This method has the same signature as the unique method;.</p>';
    $desc .= '<p>however, all values are compared using "strict" comparisons.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unless">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unless', function () {

    $collection = collect([1, 2, 3]);

    $collection->unless(true, function ($collection) {
        return $collection->push(4);
    });

    $collection->unless(false, function ($collection) {
        return $collection->push(5);
    });

    dump(
        $collection->all()
    ); // [1, 2, 3, 5]

    $desc = '<p>The unless method will execute the given callback unless the first argument given to the method evaluates to true:</p>';
    $desc .= '<p>For the inverse of unless, see the when method.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unlessEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unlessEmpty', function () {

    $desc = '<p>Alias for the whenNotEmpty method.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unlessNotEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unlessNotEmpty', function () {

    $desc = '<p>Alias for the whenEmpty method.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-unwrap">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-unwrap', function () {

    dump(
        Illuminate\Support\Collection::unwrap(collect('John Doe'))
    ); // ['John Doe']

    dump(
        Illuminate\Support\Collection::unwrap(['John Doe'])
    ); // ['John Doe']

    dump(
        Illuminate\Support\Collection::unwrap('John Doe')
    ); // 'John Doe'

    $desc = '<p>The static unwrap method returns the collections underlying items from the given value when applicable:</p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-values">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-values', function () {

    $collection = collect([
        10 => ['product' => 'Desk', 'price' => 200],
        11 => ['product' => 'Desk', 'price' => 200],
    ]);

    $values = $collection->values();

    dump(
        $values->all()
    );

/*
[
0 => ['product' => 'Desk', 'price' => 200],
1 => ['product' => 'Desk', 'price' => 200],
]
 */

    $desc = '<p>The values method returns a new collection with the keys reset to consecutive integers:</p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-when">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-when', function () {

    $collection = collect([1, 2, 3]);

    $collection->when(true, function ($collection) {
        return $collection->push(4);
    });

    $collection->when(false, function ($collection) {
        return $collection->push(5);
    });

    dump(
        $collection->all()
    ); // [1, 2, 3, 4]

    $desc = '<p>The when method will execute the given callback when the first argument given to the method evaluates to true:</p>';
    $desc .= '<p>For the inverse of when, see the unless method.</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whenEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whenEmpty', function () {

    $collection = collect(['michael', 'tom']);

    $collection->whenEmpty(function ($collection) {
        return $collection->push('adam');
    });

    dump(
        $collection->all()
    ); // ['michael', 'tom']

    $collection = collect();

    $collection->whenEmpty(function ($collection) {
        return $collection->push('adam');
    });

    dump(
        $collection->all()
    ); // ['adam']

    $collection = collect(['michael', 'tom']);

    $collection->whenEmpty(function ($collection) {
        return $collection->push('adam');
    }, function ($collection) {
        return $collection->push('taylor');
    });

    dump(
        $collection->all()
    ); // ['michael', 'tom', 'taylor']

    $desc = '<p>The whenEmpty method will execute the given callback when the collection is empty:</p>';
    $desc .= '<p>For the inverse of whenEmpty, see the whenNotEmpty method.</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whenNotEmpty">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whenNotEmpty', function () {

    $collection = collect(['michael', 'tom']);

    $collection->whenNotEmpty(function ($collection) {
        return $collection->push('adam');
    });

    dump(
        $collection->all()
    ); // ['michael', 'tom', 'adam']

    $collection = collect();

    $collection->whenNotEmpty(function ($collection) {
        return $collection->push('adam');
    });

    dump(
        $collection->all()
    ); // []

    $collection = collect();

    $collection->whenNotEmpty(function ($collection) {
        return $collection->push('adam');
    }, function ($collection) {
        return $collection->push('taylor');
    });

    dump(
        $collection->all()
    ); // ['taylor']

    $desc = '<p>The whenNotEmpty method will execute the given callback when the collection is not empty:</p>';
    $desc .= '<p>For the inverse of whenNotEmpty, see the whenEmpty method.</p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-where">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-where', function () {

    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 100],
        ['product' => 'Bookcase', 'price' => 150],
        ['product' => 'Door', 'price' => 100],
    ]);

    $filtered = $collection->where('price', 100);

    dump(
        $filtered->all()
    );

/*
[
['product' => 'Chair', 'price' => 100],
['product' => 'Door', 'price' => 100],
]
 */

    $collection = collect([
        ['name' => 'Jim', 'deleted_at' => '2019-01-01 00:00:00'],
        ['name' => 'Sally', 'deleted_at' => '2019-01-02 00:00:00'],
        ['name' => 'Sue', 'deleted_at' => null],
    ]);

    $filtered = $collection->where('deleted_at', '!=', null);

    dump(
        $filtered->all()
    );

/*
[
['name' => 'Jim', 'deleted_at' => '2019-01-01 00:00:00'],
['name' => 'Sally', 'deleted_at' => '2019-01-02 00:00:00'],
]
 */

    $desc = '<p>The where method filters the collection by a given key / value pair:</p>';
    $desc .= '<p>The where method uses "loose" comparisons when checking item values, meaning a string with an integer value will be considered equal to an integer of the same value.</p>';
    $desc .= '<p>Use the whereStrict method to filter using "strict" comparisons.</p>';
    $desc .= '<p>Optionally, you may pass a comparison operator as the second parameter.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereStrict">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereStrict', function () {

    $desc = '<p>This method has the same signature as the where method; however, all values are compared using "strict" comparisons.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereBetween">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereBetween', function () {

    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 80],
        ['product' => 'Bookcase', 'price' => 150],
        ['product' => 'Pencil', 'price' => 30],
        ['product' => 'Door', 'price' => 100],
    ]);

    $filtered = $collection->whereBetween('price', [100, 200]);

    dump(
        $filtered->all()
    );

/*
[
['product' => 'Desk', 'price' => 200],
['product' => 'Bookcase', 'price' => 150],
['product' => 'Door', 'price' => 100],
]
 */

    $desc = '<p>The whereBetween method filters the collection within a given range:</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereIn">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereIn', function () {

    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 100],
        ['product' => 'Bookcase', 'price' => 150],
        ['product' => 'Door', 'price' => 100],
    ]);

    $filtered = $collection->whereIn('price', [150, 200]);

    dump(
        $filtered->all()
    );

/*
[
['product' => 'Bookcase', 'price' => 150],
['product' => 'Desk', 'price' => 200],
]
 */

    $desc = '<p>The whereIn method filters the collection by a given key / value contained within the given array:</p>';
    $desc .= '<p>The whereIn method uses "loose" comparisons when checking item values, meaning a string with an integer value will be considered equal to an integer of the same value. </p>';
    $desc .= '<p>Use the whereInStrict method to filter using "strict" comparisons.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereInStrict">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereInStrict', function () {

    $desc = '<p>This method has the same signature as the whereIn method; </p>';
    $desc .= '<p>however, all values are compared using "strict" comparisons.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereInstanceOf">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereInstanceOf', function () {

    $collection = collect([
        new App\User,
        new App\User,
        new App\Post,
    ]);

    $filtered = $collection->whereInstanceOf(App\User::class);

    dump(
        $filtered->all()
    );

// [App\User, App\User]

    $desc = '<p>The whereInstanceOf method filters the collection by a given class type:</p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereNotBetween">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereNotBetween', function () {

    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 80],
        ['product' => 'Bookcase', 'price' => 150],
        ['product' => 'Pencil', 'price' => 30],
        ['product' => 'Door', 'price' => 100],
    ]);

    $filtered = $collection->whereNotBetween('price', [100, 200]);

    dump(
        $filtered->all()
    );

/*
[
['product' => 'Chair', 'price' => 80],
['product' => 'Pencil', 'price' => 30],
]
 */

    $desc = '<p>The whereNotBetween method filters the collection within a given range:</p>';
    $desc .= '<p></p>';
    $desc .= '<p></p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereNotIn">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereNotIn', function () {

    $collection = collect([
        ['product' => 'Desk', 'price' => 200],
        ['product' => 'Chair', 'price' => 100],
        ['product' => 'Bookcase', 'price' => 150],
        ['product' => 'Door', 'price' => 100],
    ]);

    $filtered = $collection->whereNotIn('price', [150, 200]);

    dump(
        $filtered->all()
    );

/*
[
['product' => 'Chair', 'price' => 100],
['product' => 'Door', 'price' => 100],
]
 */

    $desc = '<p>The whereNotIn method filters the collection by a given key / value not contained within the given array:</p>';
    $desc .= '<p>The whereNotIn method uses "loose" comparisons when checking item values, meaning a string with an integer value will be considered equal to an integer of the same value. </p>';
    $desc .= '<p>Use the whereNotInStrict method to filter using "strict" comparisons.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-whereNotInStrict">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-whereNotInStrict', function () {

    $desc = '<p>This method has the same signature as the whereNotIn method; however, all values are compared using "strict" comparisons.</p>';
    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-wrap">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-wrap', function () {

    $collection = Illuminate\Support\Collection::wrap('John Doe');

    dump(
        $collection->all()
    ); // ['John Doe']

    $collection = Illuminate\Support\Collection::wrap(['John Doe']);

    dump(
        $collection->all()
    ); // ['John Doe']

    $collection = Illuminate\Support\Collection::wrap(collect('John Doe'));

    dump(
        $collection->all()
    ); // ['John Doe']

    $desc = '<p>The static wrap method wraps the given value in a collection when applicable:</p>';

    $desc .= '<p><a href="/">Go Back</a></p>';
    $desc .= '<p><a href="/collection-zip">Next Method</a></p>';
    return $desc;
});

Route::get('/collection-zip', function () {

    $collection = collect(['Chair', 'Desk']);

    $zipped = $collection->zip([100, 200]);

    dump(
        $zipped->all()
    ); // [['Chair', 100], ['Desk', 200]]

    $desc = '<p>The zip method merges together the values of the given array with the values of the original collection at the corresponding index:</p>';
    $desc .= '<p>with the values of the original collection at the corresponding index:</p>';
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
