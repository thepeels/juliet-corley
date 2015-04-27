@extends('layout')

@section('content')
    
    <h2>Search for Fish</h2>
    {{Form::open(array('url' => "/icon/seek",'class' => 'form-addfish', 'files' => true))}}
        <fieldset>
            {{--{{Form::open(array('url' => "fish/validateaddfish",'class' => 'form-addfish', 'files' => true, 'method' => 'post'))}}--}}
            <div class="form-group">
                {{ Form::label('name', 'Search by Genus') }}
                {{ Form::input('text', 'genus', null, ['class' => 'form-control col-6', 'id' => 'name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Search by Species') }}
                {{Form::input('text', 'species', null, ['class' => 'form-control '])}}
            </div>
            
            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                <a href="/back" class="btn btn-default">Back</a>
            </div>
        </fieldset>
    {{form::close()}}

@stop
