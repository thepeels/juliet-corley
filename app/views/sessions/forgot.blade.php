@extends('layout')

{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
<div class="container-16">
    <div class="grid-5 push-3 loginform">
        

<h2 class="julie">JulietCorley.com</h2>
<h3 class= "caption">Request password reset</h3>
<fieldset class="login">
{{Form::open(array('url' => '/password/remind','class'=>'form-signup'))}}

<p>This form will send a password reset token to your e-mail address</p>
    {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address'])}}
        {{$errors->first('email')}}</br></br>        
    {{Form::submit('Request Reset',['class'=>'btn btn-info btn-xs'])}}
    
{{Form::close()}}</br>
</fieldset>
</div>
</div>