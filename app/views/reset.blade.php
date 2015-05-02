@extends('layout')

@section('content')
<div class='centered'>
    
{{Form::open(array('url' => '/password/reset','class'=>'form-signup'))}}

    {{Form::input('hidden','token',$token)}}
    
    {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address'])}}
    
    {{Form::input('password','password',null,['class'=>'newclass','placeholder'=>'Password'])}}

    {{Form::input('password','password-confirmation',null,['class'=>'newclass','placeholder'=>'repeat Password'])}}

    {{Form::submit('Reset Password',['class'=>'btn newclass'])}}
    
{{Form::close()}}
</div>
@stop