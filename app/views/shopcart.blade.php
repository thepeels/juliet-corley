@extends('layout')
@section('stylesheets')<link href='/css/cart.css' rel='stylesheet' type='text/css'>@endsection
@section('content')
<?php
Session::put('cart_instance','shop');//carried into cartstriper
Session::put('dest_email',isset($dest_email)?$dest_email:Session::get('dest_email'));
$owner = (isset(Auth::user()->email)?Auth::user()->email:"guest user");//for title of cart
?>
<div class="cart">
    <h2 class="julie merri">JulietCorley.com</h2>
    <!--<h2 class= "caption h3">Cart for {{Session::get('dest_email')}}</h2>-->
    <h2 class= "caption h3 merri">Cart for {{$owner}}</h2>
        
    <h3><a href="/icon/dumpshopcart" class="btn btn-custom-danger btn-sm">Empty Cart</a></h3>
    
        <table class="cart">
            <tr>
                <th>Image</th>
                <th>Price</th>
                <th>No.</th>
                <th></th><!-- empty <td> required for border in webkit browsers-->
            </tr>
        
            {{shopCartTabulate()}}   
        
            <tr>
                {{shopCartSummary()}}
                <td></td>
            </tr>
        </table></br>
        {{Form::open(array('url' => '/shopcardpay','class'=>'form-inline'))}} 
    	@if(Cart::instance('shop')->total()!=0)
            {{--{{Form::label('text','CardHolder Name (as it appears on the card):')}}
		{{Form::input('text','cardholder_name',null,['class'=>'newclass aligned-right','placeholder'=>'name','size'=>'35'])}}<br>
		{{$errors->first('cardholder_name','<small class="red-error">:message</small>')}}
</br>--}}
    	{{Form::submit('Pay by Card',['class'=>'btn btn-primary'])}}
    	@endif
    	{{Form::close()}}
    <h3><a href="/shop/continue"class="btn btn-info">Continue Shopping</a></h3>
</div>
@endsection