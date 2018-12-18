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
<p class="cr merri"><?php if(Auth::user()->detail->author_name){
		echo(Auth::user()->detail->author_name.' is');
	}else{
		echo('You {Author Name} are');
	}?>&nbsp;entitled to use the Fish Icon 
		images listed below, with the following stipulations:</p>
		<ul class="merri" style="font-size:10px;">
			<li style="font-size:10px;">
				You must be an individual person. (This licence 
				may not be granted to any corporation or group of persons).
			</li>
			<li style="font-size:10px;">
				You may use the listed images for any not-for-profit purpose, 
				as many times as you wish. These images are intended for 
				fish researchers, and so, specifically, the listed images 
				may be used in any not-for-profit publication or scientific 
				paper in which you are named as an author. This includes 
				where you are joint author or one of multiple authors.
			</li>
			<li style="font-size:8px/10px;">
				Your paper containing the images (or a significant extract of 
				your paper) may then be published commercially within any 
				scientific journal, including online journals, such as JEMBE, 
				Journal of Fish Biology, Marine Biology, Fishery Bulletin, 
				Fisheries Research, PLoS, Ecology, Nature, New Scientist, etc.
			</li>
			<li style="font-size:8px/10px;">
				You may not use the listed images for your own financial gain. 
				If you want to use the images in any way other than as part 
				of a research paper, please contact me.
			</li>
		</ul>
		<p class="cr merri" style="font-size:12px;">(This above applies to Fish 
			Icon images only. Fish Icon images and all other images remain 
			copyright Juliet Corley &copy; {{date("Y")}}).</p> 

<h3>Your Purchases</h3>


<?php
//$email =  Auth::user()->email;
//if($email == NULL){$email =  Auth::user()->oauth_email;}
$icons = showPurchases($purchases_email);

?>
<p><bold>{{$purchases_email}}</bold> - You have paid for:</p>
<table class ="userdownloads">
        <tr>
            <th>Image</th>
            <th></th>
        </th>
        @foreach ($icons as $row)
        <tr>
            <td>{{$row->purchase}}</td>
            @if($row->image_id==0)
            <td style="font-size:smaller;">Card Payment ${{number_format($row->amount/100,2,'.','')}}</td>
            @else
            <td><a href="/download/freedbdownload/{{$row->image_id}}/{{$row->purchase}}"class="btn btn-default btn-xs">Download again</a></td>
            @endif
        </tr>
        @endforeach
    </table>
        {{--$icons->links()--}}


<h4><a href="/download" class="btn btn-primary btn-xs">Go back to fish icon page</a></h4>

</div>
@stop
@section('footer')
<h5 style = "text-align:center;">@include('includes.footer')</h5>
@stop