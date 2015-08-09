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
 

<h3>Your Purchases</h3>


<?php
$email =  Auth::user()->email;
$icons = showPurchases($email);

?>
<p><bold><?php echo Auth::user()->email;?></bold> - You have paid for:</p>
<table class ="userdownloads">
        <tr>
            <th>Image</th>
            <th></th>
        </th>
        @foreach ($icons as $row)
        <tr>
            <td>{{$row->purchase}}</td>
            <td><a href="/download/freedbdownload/{{$row->image_id}}/{{$row->purchase}}"class="btn btn-default btn-xs">Download again</a></td>
        </tr>
        @endforeach
    </table>


<h4><a href="/download" class="btn btn-primary btn-xs">Go back to fish icon page</a></h4>

</div>
@stop
@section('footer')
<h5 style = "text-align:center;">@include('includes.footer')</h5>
@stop