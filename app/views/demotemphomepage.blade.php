@extends('layoutplain')

@section('body-class')
<body class="temphomepage" style="background: url(images/bg-images/temp-background-web.jpg) 0% 0% no-repeat #89a;">
@stop

@section('content')

<div style="position:relative;top:10;left:10;clear:both">
<h4><a href="../payment/stripe">Link to Pay for Fish Drawings</a></h4>
<h4><a href="download">Go to Downloads</a></h4>
<h4><a href="art/gallery">Go to Art Works</a></h4>
<h4><a href="icon/info">Icon Commissions</a></h4>
<? if(isset(Auth::user()->name)){?>
    <h4>Hello - {{Auth::user()->name}}</h4>
    <h4><a href="../user/myaccount">My Account</a></h4>
    <h4><a href="{{ URL::to('logout') }}" >LogOut</a></h4>
    <?}?>
<h4><a href="/admin/fish">Admin Pages</a></h4>
</div>
@stop