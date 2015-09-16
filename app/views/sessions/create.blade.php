@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
@stop
<?$url = Request::url();
$previous = URL::previous();
//dd($url);
$return_url=urlencode($url);
Session::put('login_from',$previous);
//dd(Session::get('login_from'));?>
@section('content')
<div class="container-16">
    <div class="grid-5 push-3 loginform">
        

<h2 class="julie merri">JulietCorley.com</h2>
<h3 class= "caption merri">Log in</h3>
<fieldset class="login">
    
{{Form::open(['route'=>'sessions.store'])}}

    {{Form:: label('email','Email')}}
    </br>
    {{Form::email('email')}}
    {{$errors->first('name','<small style="color:#f00">:message</small>')}}</br></br> 

    {{Form:: label('password','Password')}}
    </br>
    {{Form::password('password')}} </br> 
    
@if(Session::has('message'))
    {{Session::pull('message','<small style="color:#f00">:message</small>')}}
@endif
    </br>
    @if(Auth::guest())
        {{Form::submit('Login',array('class'=>'btn btn-info btn-xs'))}}
    @endif  

{{Form::close()}}

</br>

<a href="user/newuser">Register</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="user/reset">Forgot password?</a>
</fieldset>

    </div> 
</div>
@stop