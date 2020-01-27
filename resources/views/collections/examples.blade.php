@extends('layouts.app')

@section('page_header','Collections')


@section('content')


	<div>
		<a href="{{url("/collection-all")}}">all()</a>
		<ul>
			<li>The all() method returns the underlying array represented by the collection</li>
		</ul>
		<pre>
			collect([1, 2, 3])->all();

			// [1, 2, 3]
		</pre>
	</div>


	<div>
		<a href="{{url("/collection-average")}}">average()</a>
		<ul>
			<li>Alias for the avg method</li>
		</ul>
		<pre>
			collect([1, 2, 3])->average()
		</pre>
	</div>


	<div>
		<a href="{{url("/collection-avg")}}">avg()</a>
		<ul>
			<li>The avg method returns the average value of a given key</li>
		</ul>
		<pre>
			$average = collect([['foo' => 10], ['foo' => 10], ['foo' => 20], ['foo' => 40]])->avg('foo');

			// 20

			$average = collect([1, 1, 2, 4])->avg();

			// 2
		</pre>
	</div>


	<div>
		<a href="{{url("/collection-chunk")}}">chunk()</a>
		<ul>
			<li>The chunk method breaks the collection into multiple, smaller collections of a given size</li>
		</ul>
		<pre>
			$collection = collect([1, 2, 3, 4, 5, 6, 7]);

			$chunks = $collection->chunk(4);

			$chunks->toArray();

			// [[1, 2, 3, 4], [5, 6, 7]]
		</pre>
	</div>
@endsection