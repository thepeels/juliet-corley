@extends('layout')

{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
<div class="container-16">
    <div class="grid-5 push-3 loginform">
        

<h2 class="julie merri">JulietCorley.com</h2>
<h3 class= "caption merri">Register</h3>
<fieldset class="login">
    {{Form::open(array('url' => '/user/adduser','class'=>'form-signup'))}}

{{--<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error}}</li>
    @endforeach
</ul>--}}
    
    {{Form::input('text','name',null,['class'=>'newclass','placeholder'=>'Name'])}} 
        {{$errors->first('name','<small style="color:#f00">:message</small>')}}</br></br> 
    
    {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address'])}}
        {{$errors->first('email','<small style="color:#f00">:message</small>')}}</br></br> 
    
    {{Form::input('text','password',null,['class'=>'newclass','placeholder'=>'Password'])}}
        {{$errors->first('password','<small style="color:#f00">:message</small>')}}</br></br>
    
    {{Form::input('password','password_confirmation',null,['class'=>'newclass','placeholder'=>'Confirm password'])}}
        {{$errors->first('password_confirmation','<small style="color:#f00">:message</small>')}}</br></br>
        
    {{Form::submit('Register',['class'=>'btn btn-info btn-xs'])}}
{{form::close()}}
</fieldset>
</div>
</div>