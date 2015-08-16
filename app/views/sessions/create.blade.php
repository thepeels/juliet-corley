@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
@stop
<?$url = Request::url();
$previous = URL::previous();
//dd($url);
$return_url=urlencode($url);
Session::flash('previous_url',$previous);?>
@section('content')
<div class="container-16">
    <div class="grid-5 push-3 loginform">
        

<h2 class="julie">JulietCorley.com</h2>
<h3 class= "caption">Log in</h3>
<fieldset class="login">
    
{{Form::open(['route'=>'sessions.store'])}}

    {{Form:: label('email','Email')}}
    </br>
    {{Form::email('email')}}
    </br>

    {{Form:: label('password','Password')}}
    </br>
    {{Form::password('password')}} 
    </br>
           
    @if($errors->has('email'))
        {{ $errors->first('email')}}
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

<a href="user/newuser">Register</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="user/reset">Forgot password?</a>
</fieldset>

    </div> 
</div>
@stop