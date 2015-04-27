@extends('layout')

@section('content')
<div class='centered'>
	
{{Form::open(array('url' => '/user/adduser','class'=>'form-signup'))}}
<h1 >hi! register</h1>
{{--<ul>
	@foreach($errors->all() as $error)
		<li>{{ $error}}</li>
	@endforeach
</ul>--}}
	
	{{Form::input('text','newuser',null,['class'=>'newclass','placeholder'=>'Name'])}}<br>
	
	{{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address'])}}
		{{$errors->first('email')}}<br>
	
	{{Form::input('password','password',null,['class'=>'newclass','placeholder'=>'Password'])}}
		{{$errors->first('password')}}<br>
	
	{{Form::submit('Register',['class'=>'btn newclass'])}}
{{form::close()}}
<br><br>

{{Form::open(array('url' => '/password/remind','class'=>'form-signup'))}}

<h3>Need a password reset?</h3>
    {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address'])}}
        {{$errors->first('email')}}<br>
        
    {{Form::submit('Request Reset',['class'=>'btn newclass'])}}
    
{{Form::close()}}

</div>
@stop