@extends('layouts.app')

@section('page_header','Example Route Closures in routes/web.api')


@section('content')
	<h1>Collections</h1>
	<div>
		@foreach (collect($collectionMethods)->chunk(3) as $chunk)
		    <div class="row">
		        @foreach ($chunk as $collectionMethod)
					<div class="col-xs-4">
						<a href="/collection-{{ $collectionMethod }}">
							{{ $collectionMethod }}
						</a>
					</div>
		        @endforeach
		    </div>
		@endforeach
	</div>

	<hr>

	<h1>Eloquent Relationships</h1>
	<div>
		<p><a href="{{url("/one-to-one")}}">one-to-one</a></p>
		<p><a href="{{url("/one-to-many")}}">one-to-many</a></p>
		<p><a href="{{url("/many-to-many")}}">many-to-many</a></p>

		<p><a href="{{url("/has-one-through")}}">has-one-through</a></p>
		<p><a href="{{url("/has-many-through")}}">has-many-through</a></p>

		<p><a href="{{url("/polymorphic-one-to-one")}}">polymorphic-one-to-one</a></p>
		<p><a href="{{url("/polymorphic-one-to-many")}}">polymorphic-one-to-many</a></p>
		<p><a href="{{url("/polymorphic-many-to-many")}}">polymorphic-many-to-many</a></p>
		<p><a href="{{url("/polymorphic-custom-types")}}">polymorphic-custom-types</a></p>

	</div>




@endsection