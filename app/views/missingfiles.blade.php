@extends('layoutstripe')

@section('body-class')
<body class="add-fish">
@stop

@section('content')

<h3>The following files are missing:</h3>

<p>
@foreach($missingfiles as $file)
{{$file}}
<br>
@endforeach
</p>

<h3>
	<a href ="/addafish">Go back to Add a Fish input</a>
</h3>