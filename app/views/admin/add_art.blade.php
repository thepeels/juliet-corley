@extends('admin.layout')

@section('content')
	
    <h2>Add a Work of Art</h2>
    {{Form::open(array('url' => "admin/art/add",'class' => 'form-addart', 'files' => true))}}
        <fieldset>
            {{--{{Form::open(array('url' => "fish/validateaddart",'class' => 'form-addart', 'files' => true, 'method' => 'post'))}}--}}
            <div class="form-group">
            	{{ Form::label('name', 'Enter Art Name') }}
            	{{ Form::input('text', 'name', null, ['class' => 'form-control col-6', 'id' => 'name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Enter sale price in dollars') }}
            	{{Form::input('text', 'price', null, ['class' => 'form-control '])}}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Select image') }}
                {{ Form::file('image') }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Enter a description (optional)') }}
                {{ Form::input('text', 'description', null, ['class' => 'form-control col-6', 'id' => 'description']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Enter a category (optional)') }}
                {{ Form::input('text', 'category', null, ['class' => 'form-control col-6', 'id' => 'category']) }}
            </div>
            <div class="form-group">
            	{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            	<a href="/admin/art" class="btn btn-default">Back</a>
            </div>
        </fieldset>
    {{form::close()}}

@stop
