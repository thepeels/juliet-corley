@extends('layout')

@if (Session::has('error'))
  {{ trans(Session::get('reason')) }}
@elseif (Session::has('success'))
  An email with the password reset has been sent.
@endif
 
{{ Form::open(array('route' => '/password/remind')) }}
 
  <p>{{ Form::label('email', 'Email',['class'=>'newclass','placeholder'=>'E-mail Address']) }}
  {{ Form::text('email') }}</p>
 
  <p>{{ Form::submit('Submit',['class'=>'btn newclass']) }}</p>
 
{{ Form::close() }}