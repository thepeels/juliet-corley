@extends('admin.layout')
@section('title')
<title>Select Author</title>
@stop

@section('content')
    
<h2 >List Notes for Author</h2></br>
{{Form::open(array('url' => '/user/authornotes','class'=>'form-signup'))}}
{{--<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error}}</li>
    @endforeach
</ul>--}}
    
        <div class="form-group">
    		{{ Form::label('author', 'Select Author') }}
            {{ Form::select('author', $authors) }}
    	</div>
    	<div class="form-group">
    		{{Form::submit('Show Notes',['class'=>'btn btn-sm btn-primary'])}}
    	</div>
	{{form::close()}}
            @if(Session::has('notselected'))
        		<p>{{Session::get('notselected')}}</p>
    		@endif
@stop