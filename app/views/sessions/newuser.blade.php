@extends('layout')

{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
<div class="container-16">
    <div class="grid-5 push-3 loginform">
        

<h2 class="julie">JulietCorley.com</h2>
<h3 class= "caption">Register</h3>
<fieldset class="login">
    {{Form::open(array('url' => '/user/adduser','class'=>'form-signup'))}}

{{--<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error}}</li>
    @endforeach
</ul>--}}
    
    {{Form::input('text','newuser',null,['class'=>'newclass','placeholder'=>'Name'])}}</br>
    
    {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address'])}}
        {{$errors->first('email')}}</br>
    
    {{Form::input('password','password',null,['class'=>'newclass','placeholder'=>'Password'])}}
        {{$errors->first('password')}}</br></br>
    
    {{Form::submit('Register',['class'=>'btn btn-info btn-xs'])}}
{{form::close()}}
</fieldset>
</div>
</div>