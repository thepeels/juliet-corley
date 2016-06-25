@extends('layout')

{{ HTML::style( asset('css/imagetable.css') ) }}
{{ HTML::style( asset('css/grid16.css') ) }}
<div class="container-16">
    <div class="grid-5 push-3 loginform">


        <h2 class="julie merri">JulietCorley.com</h2>
        <h3 class="caption merri">Request password reset</h3>
        <fieldset class="login">
            {{Form::open(array('url' => '/password/remind','class'=>'form-signup'))}}

            <p>This form will send a password reset token to your e-mail address</p>
            {{Form::label('email', 'E-mail address to send password-reset') }}
            {{Form::input('email','email',null,['class'=>'newclass','placeholder'=>'E-mail Address'])}}
            {{$errors->first('email','<small style="color:#f00">:message</small>')}}<br><br>
            {{Form::submit('Request Reset',['class'=>'btn btn-info btn-xs'])}}<br><br>
            @if (Session::has('error'))
                <span style="color:#f00">{{ trans(Session::get('error')) }}</span>
            @elseif (Session::has('success'))
                An email with the password reset has been sent.<br>
                Click on the link in the email.
            @endif
            {{Form::close()}}
        </fieldset>
        <br>
    </div>
</div>