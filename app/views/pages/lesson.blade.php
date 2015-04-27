@extends('layout')

@section('content')

 <h1>{{$name}}</h1> this was a comment
 
@foreach($lessons as $lesson) 

	<h2>{{$lesson}}</h2>
	
@endforeach















@stop