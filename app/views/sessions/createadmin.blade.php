@extends('layout')

{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
<div class="container-16">
    <div class="grid-5 push-3 loginform">
        

<h2 class="julie">JulietCorley.com</h2>
<h3 class= "caption">Admin Log in</h3>
<fieldset class="login">
    
{{Form::open(['route'=>'sessions.adminstore'])}}

    {{Form:: label('name','Name')}}
    </br>
    {{Form::name('name')}}
    </br>


    {{Form:: label('password','Password')}}
    </br>
    {{Form::password('password')}} 
    </br>       
    @if($errors->has('name'))
        {{ $errors->first('name')}}
    @endif
    </br>
    @if(Auth::guest())
        {{Form::submit('Login',array('class'=>'btn btn-info btn-xs'))}}
    @endif  

{{Form::close()}}

@if(Session::has('message'))
    {{Session::pull('message')}}
@endif
</br>


</fieldset>

    </div> 
</div>