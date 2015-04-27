@extends('admin.layout')

@section('title')
<title>Add a Fish</title>
@stop

@section('content')
	
    <h2>Add a Fish Species</h2>
    {{Form::open(array('url' => "admin/fish/add",'class' => 'form-addfish', 'files' => true))}}
        <fieldset>
            {{--{{Form::open(array('url' => "fish/validateaddfish",'class' => 'form-addfish', 'files' => true, 'method' => 'post'))}}--}}
            <div class="form-group">
            	{{ Form::label('name', 'Enter new Species Name') }}
            	{{ Form::input('text', 'name', null, ['class' => 'form-control col-6', 'id' => 'name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Select primary fish image') }}
                {{ Form::file('main-image') }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Select fish silhouette image') }}
                {{ Form::file('silhouette-image') }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Select fish outline image') }}
                {{ Form::file('outline-image') }}
            </div>
            <div class="form-group">
            	{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            	<a href="/admin/fish" class="btn btn-default">Back</a>
            </div>
        </fieldset>
    {{form::close()}}

@stop
