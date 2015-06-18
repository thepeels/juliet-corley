@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/grid24.css'))}}
{{ HTML::style( asset('css/info.css') ) }}
{{ HTML::style( asset('css/menu-jquery.css'))}}
{{ HTML::style( asset('css/jchome.css') ) }}

@stop

@section('body-class')
<body class="homepage">
@stop
@section('title')
<title>Juliet Corley</title>
@stop
@section('content')
	<div class="shading-container">
<div class="container-24">
	<div class="grid-24">
		<div class="grid-14">
			<div class="grid-6 push-4 jchomelogo">
	            <p>&nbsp;</p>
	        </div>
	        <div class="grid-5 push-2">
	        	<h2 class="marine">Marine illustration</h2>
	        	<p class="shells push-1">&nbsp;</p>
	        	<p class="image-strip">&nbsp;</p>
	        	
	        </div>
		<div class="grid-10 push-4">
			<div class="grid-4 alpha">
				<div class="grid-3 push-1 payment-link">
					<p><a href="../payment/stripe" class="underline">Link to Pay for</br>Fish Drawings</a></p>
				</div>
				<div id='cssmenu' class='grid-4 '>
					<ul>
					   <li class='active'><a href='#'><span>Home</span></a></li>
					   <li ><a href='#' title = "Coming Soon"><span style="letter-spacing:-.5px;">Merchandise/Shop</span></a></li>
					   <li><a href='#' title = "Coming Soon"><span>Craft items</span></a></li>
					   <li><a href='#' title = "Coming Soon"><span>Art Gallery</span></a></li>
					   <li><a href='#' title = "Coming Soon"><span>Fish Paintings</span></a></li>
					   <li><a href='#' title = "Coming Soon"><span>Photo Gallery</span></a></li>
					   <li class='has-sub'><a href='#'><span>About me</span></a>
					      <ul>
					         <li><a href='#' title = "Coming Soon"><span>Contact me</span></a></li>
					         <li class='last' title = "Coming Soon"><a href='#'><span>About me</span></a></li>
					      </ul>
					   </li>
					   <li><a href='#' title = "Coming Soon"><span>Project Portfolio</span></a></li>
					   <li class='has-sub'><a href='#'><span>Illustration</span></a>
					      <ul>
					         <li><a href='info' title = "Coming Soon"><span>Portfolio</span></a></li>
					         <li class='last' title = "Coming Soon"><a href='#'><span>Testimonials</span></a></li>
					      </ul>
					   </li>
					   <li class='has-sub'><a href='#'><span>Fish Icons</span></a>
					      <ul>
					         <li><a href='info'><span>Icon Commissions</span></a></li>
					         <li class='last'><a href='download'><span>Icon Database</span></a></li>
					      </ul>
					   </li>
					   <li><a href='#' title = "Coming Soon"><span>links</span></a></li>
					   <li class='final'><a href='../payment/stripe'><span>Card Payments</span></a></li>
					</ul>
					<!--<h1><span style="letter-spacing:-.5px;">Juliet Corley</span></h1>-->
				</div>  	
			</div>
			<div class="grid-5">
				<p class="heading arrow">I am a tropical fish artist and 
					<a href="#" class="underline blues">scientific illustrator</a>, with a background in marine biology.
				</p>
				<div class="grid-2 alpha">
					<p class="mpa game">&nbsp;
					</p>
					<p class="mpa">
						Fishing Game for marine educators
					</p>
				</div>
				<div class="grid-3 omega paint">
					<p class="heading paint">I paint, sketch, craft, 
						and my products and craft 
						pieces can be found <a href="#" class="underline blues" title = "Coming Soon">here</a>.
					</p>
				</div>
				<p class="heading">
					I also design educational materials, games and projects to raise 
					awareness and teach about the </br>world’s reefs. For previous 
					projects, <a href="#" class="underline blues" title = "Coming Soon">see here</a>.
				</p>
				
					 
			</div>
			
			
			
			
		</div> 
		</div> 
		<div class="grid-7 alpha">
			<a href="download"><p class="pageimagelink postcards" title = "Under Construction"></p></a>
			<a href="download"><p class="pageimagelink illustration " title = "Under Construction"></p></a>
			<a href="info"><p class="pageimagelink science"></p></a>
		</div>							
	</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script><?  include_once(public_path().'/packages/menu-script.js');?></script>
@stop