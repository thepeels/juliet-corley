@extends('layout')
{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
<div class="container-16">
    <div class="grid-5 push-3 loginform">
@if (Session::has('error'))
  {{ trans(Session::get('reason')) }}
@endif

@section('content')
<h2 class="julie">JulietCorley.com</h2>
<h3 class= "caption">Password reset</h3>
<fieldset class="login">
 
{{ Form::open(array('route' => array('password.reset', $token))) }}
 
  {{ Form::label('email','Email') }}</br>
  {{ Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address']) }}<br>
 
  {{ Form::label('password', 'Password - at least 6 letters/digits') }}<br>
  {{ Form::input('password','password',null,['class'=>'newclass','placeholder'=>'Password']) }}<br>
 
  {{ Form::label('password', '&nbsp;') }}<br>
  {{ Form::input('password','password_confirmation',null,['class'=>'newclass','placeholder'=>'Re-Type Password']) }}
 
  {{ Form::hidden('token', $token) }}</br></br>
 
  {{Form::submit('Reset Password',['class'=>'btn btn-primary btn-xs'])}}
 
{{ Form::close() }}

</fieldset>
<br>

</div>
@stop