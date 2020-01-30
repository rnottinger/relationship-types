@extends('layouts.app')

@section('page_header','Collections')


@section('content')


	<div>
		<p><a href="{{url("/one-to-one")}}">one-to-one</a></p>
		<p><a href="{{url("/one-to-many")}}">one-to-many</a></p>
		<p><a href="{{url("/one-to-many-inverse")}}">one-to-many (inverse)</a></p>
		<p><a href="{{url("/many-to-many")}}">many-to-many</a></p>

		<p><a href="{{url("/has-one-through")}}">has-one-through</a></p>
		<p><a href="{{url("/has-many-through")}}">has-many-through</a></p>

		<p><a href="{{url("/polymorphic-one-to-one")}}">polymorphic-one-to-one</a></p>
		<p><a href="{{url("/polymorphic-one-to-many")}}">polymorphic-one-to-many</a></p>
		<p><a href="{{url("/polymorphic-many-to-many")}}">polymorphic-many-to-many</a></p>
		<p><a href="{{url("/polymorphic-custom-types")}}">polymorphic-custom-types</a></p>

	</div>




@endsection