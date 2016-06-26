@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
@stop
<?
$message = (!NULL == Session::has('message')?Session::pull('message'):NULL);

//dd(Session::get('login_from'));?>

@section('content')
<div class="container-16">
    <div class="grid-5 push-3 loginform">
        

    <h2 class="julie merri">JulietCorley.com</h2>
    <h3 class= "caption merri">Log in</h3><br>
    <a href="../authorize/facebook" class ="btn-lg btn-primary" title = "Use your Facebook profile to login">Login with Facebook</a><br><br>
    <a href="../authorize/google" class ="btn-lg btn-danger" title = "Use your Gmail or Googleplus profile to login">Login with Google</a><br><br>
    <a href="../authorize/github" class ="btn-lg btn-info"title = "Use your Github credentials to login">Login with GitHub</a><br><br>
    <?php
    if (isset($message)){
        ?><span style = "color:#f00"><?
    }else{
        ?><span><?
    }?>
    {{$message or '------------- OR -------------'}}</span>
    <br>
    <h5 class= "caption merri">Log in with email and password</h5>
    <fieldset class="login">
        {{Form::open(['route'=>'sessions.store'])}}

            {{Form:: label('email','Email')}}
            <br>
            {{Form::email('email')}}
            {{$errors->first('name','<small style="color:#f00">:message</small>')}}<br><br>

            {{Form:: label('password','Password')}}
            <br>
            {{Form::password('password')}}
            <br><br>
            @if(Auth::guest())
                {{Form::submit('Login',array('class'=>'btn btn-info btn-xs'))}}
            @endif

        {{Form::close()}}
    <br>

    <a href="user/newuser">Register</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="user/reset">Forgot password?</a>
    </fieldset>
    <p class ="merri"><br><small>While you may prefer to not login, there are advantages.<br>
        Creating an account allows you to return and download previously purchased files from your account.
        Being logged in will apply discounts where you have previously ordered either the
        same fish icon or an icon for the same species. <br>
            More details are available under the 'About' menu item. <br>
            JulietCorley.com will never send you spam.</small>
    </p>
    </div>
</div>
@stop