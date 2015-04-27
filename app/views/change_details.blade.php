@extends('layout-account')
@section('stylesheets')
{{ HTML::style( asset('css/cart.css') ) }}
@stop
@section('title')
<title>My Account</title>
@stop
@section('body')
<body class="myaccount">
@stop
@section('content')
<div class="centered userdownloads">

    <h3>Account Details</h3>


    <?php
    if(Auth::check()){
        $email =  Auth::user()->email;
        $icons = showPurchases($email);
    
    
    ?>

    <h4>Registered e-mail - <?php echo Auth::user()->email;?></h4>
    <?}?>
    
        {{Form::open(array('url' => '/user/adduser','class'=>'form-signup'))}}

            {{--<ul>
                 @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                 @endforeach
            </ul>--}}
        
        
            {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'Change E-mail Address'])}}</br>
        
            {{$errors->first('email')}}</br>
        
        
            {{Form::submit('Change',['class'=>'btn btn-info btn-xs'])}}
        {{form::close()}}</br></br>
    
    <h4>Change Password</h4>
        
        {{Form::open(array('url' => '/user/adduser','class'=>'form-signup'))}}

            {{Form::input('password','password',null,['class'=>'newclass','placeholder'=>'Change Password'])}}</br>
        
            {{$errors->first('email')}}</br>
        
        
            {{Form::submit('Change',['class'=>'btn btn-info btn-xs'])}}
        {{form::close()}}</br></br>
        
        
        

    </div>
@stop
@section('footer')
<h5>@include('includes.footer')</h5>
@stop