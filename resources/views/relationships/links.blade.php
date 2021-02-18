@extends('layouts.app')

@section('page_header','Example Route Closures in routes/web.api')


@section('content')
	<div>
		<div class="container">
			<h1><a href="{{url('/horizon')}}">Horizon</a>
			<h1><a href="{{url('/telescope')}}">Telescope</a>
			<h1>Demo Routes</h1>
			<p><a href="{{url("/querystring-demo")}}">Query String</a></p>
			<p><a href="{{url("/collection-chaining")}}">Collection Chaining</a></p>
			<p><a href="{{url("/collection-macroable")}}">Collection Macroable</a></p>
		</div>
		<div class="container">
			<h1><a href="https://laravel.com/docs/master/collections">Collection Methods</a></h1>
			@foreach (collect($collectionMethods)->chunk(3) as $chunk)
			    <div class="row">
			        @foreach ($chunk as $collectionMethod)
						<div class="col-sm-4">
							<a href="/collection-{{ $collectionMethod }}">
								{{ $collectionMethod }}
							</a>
						</div>
			        @endforeach
			    </div>
			@endforeach
		</div>

		<hr>

		<div class="container">
			<h1><a href="https://laravel.com/docs/master/eloquent-collections">Eloquent Relationships</a></h1>
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

	</div>




@endsection