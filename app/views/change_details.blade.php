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
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script type="text/javascript">
            
            $(document).keypress(function(e) {
            if (e.which == 13 && e.target.id != 'noteform') {
                    return false;
                }
            });
        
        </script>

    <h3>Account Details</h3>

    <?php
    if(Auth::check()){?>
    <h4>Registered e-mail - <span>{{Auth::user()->email}}</span></h4>
    <?php }?>

        {{Form::open(array('url' => '/user/edituser','class'=>'form-inline'))}}

            {{--<ul>
                 @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                 @endforeach
            </ul>--}}
        	<?php if(isset($duplicate)){?><span style = "color:#f00">{{$duplicate}}</span><?php }?>
        	{{Form::input('hidden','userid',$id)}}
            {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'Enter new email'])}}
        
            {{Form::submit('Add/Change',['class'=>'btn btn-info btn-xs'])}}
            {{$errors->first('email','<small style="color:#f00">:message</small>')}}<br>
        
        {{Form::close()}}<br>
    <?php
    if(Auth::user()->oauth_email){?>
    <h4>Oauth2 e-mail - <span>{{Auth::user()->oauth_email}}</span></h4>
    <p style="font:italic 12px arial;color:#222">(This shows here because you logged in using	your Account with Facebook, Google etc.)<br><br>
    	You can add/change your registered email to one you may prefer to use for this site,<br>
    	and you can add/change a password, then you are able to use 'email and password' login too.</p><br>
    <?php }?>
    <h4>Change Password</h4>
        
        {{Form::open(array('url' => '/user/editpassword','class'=>'form-inline'))}}

            {{Form::input('hidden','userid',$id)}}
            {{Form::input('password','password',null,['class'=>'newclass input-xs','placeholder'=>'Change Password'])}}
        
            {{Form::submit('Add/Change',['class'=>'btn btn-info btn-xs'])}}
            {{$errors->first('password','<small style="color:#f00">:message</small>')}}<br>
        
        {{Form::close()}}<br>
        
    <h4>Add/Edit Publishing Author Name - <span>{{Auth::user()->detail->author_name}}</span></h4>
        
        {{Form::open(array('url' => '/user/editauthor','class'=>'form-inline'))}}

            {{Form::input('hidden','userid',$id)}}
            {{Form::input('text','authorname',null,['class'=>'newclass','placeholder'=>'Author Name'])}}
        
            {{Form::submit('Add/Edit',['class'=>'btn btn-info btn-xs'])}}
            {{$errors->first('authorname','<small style="color:#f00">:message</small>')}}<br>
        
        {{Form::close()}}<br>
        
    <h4>Add Publishing Aliases - <span>{{Auth::user()->detail->alias}}</span></h4>
        
        {{Form::open(array('url' => '/user/addalias','class'=>'form-inline'))}}

            {{Form::input('hidden','userid',$id)}}
            {{Form::input('text','alias',null,['class'=>'newclass','placeholder'=>'Add an Alias'])}}
        
            {{Form::submit('&nbsp;Add&nbsp;',['class'=>'btn btn-info btn-xs'])}}
            {{$errors->first('alias','<small style="color:#f00">:message</small>')}}<br>
        
        {{Form::close()}}<br>
        
    <h4>Add Postal Address - <span>{{Auth::user()->detail->address}}&nbsp;{{Auth::user()->detail->postcode}}</span></h4>
        
        {{Form::open(array('url' => '/user/addaddress','class'=>'form-inline'))}}

            {{Form::input('hidden','userid',$id)}}
            {{Form::input('text','address',null,['class'=>'newclass','placeholder'=>'Your Address'])}}
            {{Form::submit('&nbsp;Add&nbsp;',['class'=>'btn btn-info btn-xs'])}}<br>
            {{Form::input('text','postcode',null,['class'=>'newclass','placeholder'=>'Postal Code'])}}
        
            {{Form::submit('&nbsp;Add&nbsp;',['class'=>'btn btn-info btn-xs'])}}
            {{$errors->first('address','<small style="color:#f00">:message</small>')}}<br>
        
        {{Form::close()}}<br>
        
    <h4>Add Notes &nbsp;&nbsp;<span style="font:italic 12px arial;color:#222">
    		tip - to edit current note, copy and paste it, then edit in the text box.</span></h4>
    <p><span>{{Auth::user()->detail->note}}</span></p>
        
        {{Form::open(array('url' => '/user/addnote','class'=>'form-signup','id'=>'noteform'))}}

            {{Form::input('hidden','userid',$id)}}
            {{Form::input('text','note',null,['class'=>'noteclass','placeholder'=>'Add a note','rows'=>'3'])}}<br>
        
            {{$errors->first('note','<small style="color:#f00">:message</small>')}}<br>
        
            {{Form::submit('Load / Change the above Note',['name'=>'newnote','class'=>'btn btn-primary btn-xs'])}}
            {{Form::submit('Append to Existing Note',['name'=>'append','class'=>'btn btn-info btn-xs'])}}
            {{Form::submit('Delete Existing Notes',['name'=>'delete','class'=>'btn btn-default btn-xs'])}}
        {{Form::close()}}
        <br>
        

    </div>
@stop
@section('footer')
<h5>@include('includes.footer')</h5>
@stop