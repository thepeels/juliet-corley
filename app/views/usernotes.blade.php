@extends('admin.layout')
@section('title')
<title>Notes</title>
@stop
@section('content')

<?php
#$email = Input::get('email');

#$purchases = adminshowpurchases($email);
	
	if(null!=($oauth_email)) {$mail = $oauth_email;}
	else if(null!=($email)) {$mail = $email;}
	else {$mail = "no mail";}
	?>  
    <h4><a href="../back" class="btn btn-primary">Select different User</a>
    <?echo('&nbsp;&nbsp;Notes Posted by <span style="font-style:italic;color:#39b;">'
    			.$mail.'</span></h4>');?>
    <h4>Notes</h4>
    {{$note}}
    <h4>Author Name</h4>
    {{$author_name}}
    <h4>Aliases</h4>
    {{$alias}}
    <h4>Address</h4>
    {{$address}}&nbsp;{{$postcode}}
    
@stop
@section('footer')  
    <!--<h4><a href="../back" class="btn btn-primary">Select different User</a></h4>-->
@stop
