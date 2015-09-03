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
		$id = Auth::user()->id;
    
    ?>

    <h4>Registered e-mail - <?php echo Auth::user()->email;?></h4>
    <?}?>
    
        {{Form::open(array('url' => '/user/edituser','class'=>'form-signup'))}}

            {{--<ul>
                 @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                 @endforeach
            </ul>--}}
        
        	{{Form::input('hidden','userid',$id)}}
            {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'Enter new email'])}}</br>
        
            {{$errors->first('email','<small style="color:#f00">:message</small>')}}</br>
        
        
            {{Form::submit('Change',['class'=>'btn btn-info btn-xs'])}}
        {{form::close()}}</br></br>
    
    <h4>Change Password</h4>
        
        {{Form::open(array('url' => '/user/editpassword','class'=>'form-signup'))}}

            {{Form::input('hidden','userid',$id)}}
            {{Form::input('password','password',null,['class'=>'newclass','placeholder'=>'Change Password'])}}</br>
        
            {{$errors->first('password','<small style="color:#f00">:message</small>')}}</br>
        
        
            {{Form::submit('Change',['class'=>'btn btn-info btn-xs'])}}
        {{form::close()}}</br></br>
        
    <h4>Add/Edit Publishing Author Name - {{Auth::user()->author_name}}</h4>
        
        {{Form::open(array('url' => '/user/editauthor','class'=>'form-signup'))}}

            {{Form::input('hidden','userid',$id)}}
            {{Form::input('authorname','authorname',null,['class'=>'newclass','placeholder'=>'Author Name'])}}</br>
        
            {{$errors->first('authorname','<small style="color:#f00">:message</small>')}}</br>
        
        
            {{Form::submit('Add/Edit',['class'=>'btn btn-info btn-xs'])}}
        {{form::close()}}</br></br>
        
        
        

    </div>
@stop
@section('footer')
<h5>@include('includes.footer')</h5>
@stop