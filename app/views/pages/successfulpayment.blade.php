@extends('layout')
{{ HTML::style( asset('css/cart.css') ) }}
@section('content')
<div class="cart">
    <h2 class="julie merri">JulietCorley.com</h2>

<?php
	if (NULL!=Session::get('purchaser')){$purchaser = Session::pull('purchaser');};
	$insert=(isset($purchaser))?('You <strong>'.$purchaser.'</strong> are'):('You {Author Name} are');
	$cart_instance = Session::get('cart_instance');
	Cart::instance($cart_instance);
	if (Cart::count()!=0){
?>		
<h3 class="merri">Hi - <?if(Auth::user()){
							if(NULL != Auth::user()->email){echo(Auth::user()->email);}
							else{echo(Auth::user()->oauth_email);
								}}
		else{echo ($purchaser);}

	?></h3>
	<h4 class="caption cr merri">Thank you, your card payment was successful</h4>


	<p class="cr merri">
	<?if(Auth::user()){
		if(Auth::user()->author_name!=""){
			echo(Auth::user()->author_name.' is');
		}}else
		{echo ($insert);
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
		<p class="cr merri" style="font-size:12px;">(This above applies to Fish Icon 
			images only. Fish Icon images and all other images remain copyright 
			Juliet Corley &copy; {{date("Y")}}).</p>
<h4 class="cr merri">You have paid for:</h4>@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">
    {{Session::pull('message')}}
    &nbsp;&nbsp;&nbsp;<button onclick="myFunction()">Ok</button>
</p>
{{Session::pull('message')}}
@endif
<table class= "cart">
		<tr>
			<th>Image</th>
			<th>Price</th>
			<th>No.</th>
			{{--<th>RowId</th>--}}
			<th>&nbsp;</th>
		</tr>
        {{fillOutPurchasetable()}}
</table>
	
<?}
else echo ('<h3>Your Cart is empty</h3>')
?>
<p class="merri" style="font-size:10px;">
	</br> The above items are now available for download, either now or if you prefer 
	later from the 'My Account' link when you are logged in to the website. Please
	click 'Done' when you are finished.



<!--<h3><a href="/download/finished" class="btn  btn-info">Finished Downloading?</a></h3>-->
<h3><a href="/download/finished" class="btn btn-xs btn-info">Done</a></h3>
</div>


@stop