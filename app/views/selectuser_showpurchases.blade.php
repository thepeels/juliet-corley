@extends('admin.layout')
@section('title')
<title>Select User</title>
@stop
@section('content')
<div class='centered'>
    
{{Form::open(array('url' => '/user/userpurchases','class'=>'form-signup'))}}
<h4 >Enter a User's E-mail</h4>
{{--<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error}}</li>
    @endforeach
</ul>--}}
    
    {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address'])}}
        {{$errors->first('email')}}<br>
    
    {{Form::submit('Select',['class'=>'btn btn-primary spaced'])}}
{{form::close()}}
</div>
@stop