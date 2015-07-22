@extends('layout')
{{ HTML::style( asset('css/cart.css') ) }}
@section('content')
<div class="cart">
    <h2 class="julie">JulietCorley.com</h2>

<?php
$cart_instance = Session::get('cart_instance');
Cart::instance($cart_instance);
if (Cart::count()!=0){
?>		
<h3>Hi {{Auth::user()->email}}</h3>
	<h4 class="caption cr">Thank you, your card payment was successful</h4>


<h4 class="cr">You have paid for:</h4>@if(Session::has('message'))
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




<h3><a href="/download/finished" class="btn  btn-info">Finished Downloading?</a></h3>
<h3><a href="/" class="btn  btn-warning">Go back to Home page</a></h3>
</div>

<script>
function myFunction() {
    location.reload();
}
</script>
@stop