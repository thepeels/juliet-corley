@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/grid24.css'))}}
{{ HTML::style( asset('css/info.css') ) }}
{{ HTML::style( asset('css/menu-jquery.css'))}}
{{ HTML::style( asset('css/jchome.css') ) }}

@stop
<?$form_index = 1;
$url = Request::url();
$return_url = urlencode($url);
?>
@section('body-class')
<body class="shop">
@stop
@section('title')
<title>Juliet Corley - Shop</title>
@stop
@section('content')
<div class="shading-container">
	<div class="container-24">
		<div class="grid-24">
			<div class="grid-17 push-4">
				
			</div>
			<div class="grid-17 push-4">
				<div id='cssmenu' class="grid-5 suffix-1 alpha">
					<div class="grid-5  jcshoplogo">
	            		<p>&nbsp;</p>
	       			 </div>
					@include('includes.main_menu')
				</div>
				<div class="grid-12 omega">
					<div class="grid-12">
						<div class="grid-6 one-off">
							<p>&nbsp;</p>
						</div>
						<div class="grid-6">
							<p class="cone-notice">This page is not yet</br>
								fully functional</br>- please email
								</br>me with orders</p>
							<a href="mailto:babyfoot3@bigfoot.com?subject=Shop%20enquiry
								&body=I%20wish%20to%20purchase%20the%20following%20items%20
								from%20your%20shop%3A%0A%0A%0AMy%20address%20is%3A"
								title="Click to email"><p class="babyfoot"></p></a>
						</div>
					</div>
					<div class="grid-11 cart">
						<div class="grid-4 alpha">
							<p>Cart Summary: <span id="cartresume">{{shopResume()}}</span></p>
						</div>
						<div class="grid-3">
							<a href="/icon/makeshopcart?return_url={{$return_url}}"class= "  btn btn-primary btn-xs">View Cart / Checkout</a>
						</div>
						<div class="grid-3 emptycart">
							<a href="/icon/ajaxdumpshopcart" class="byajax btn btn-info btn-xs">Empty Cart</a>
						</div>
					</div>
					@foreach ($products as $product)
					<?$form_id = 'form-'.$form_index;?><!-- redundant -->
					<div class="grid-11 pushdown">
					<div class="grid-5 alpha image-column">
						<img src="{{$product->small_size_image->image_url}}" width="270px">
						<div class="opaque grid-5">
						{{Form::open(array('id' => $form_id, 'url' => "/shop/cartadd?return_url=$url",'class' => 'shopform form-addfish'))}}
							{{ Form::hidden('productId', $product->id)}}
							{{ Form::hidden('productName', $product->title)}}
							{{ Form::hidden('return_url', $return_url)}}
							{{ Form::label('number', 'Order Quantity:&nbsp;',['class' => 'label','style' => 'float:left']) }}
							&nbsp;
							{{ Form::text('number','1',  ['class' => 'form-control quantity', 'id' => 'number','style' => 'float:left;margin-top:0px;']) }}
							&nbsp;
							{{ Form::submit('Add to Cart', ['class' => 'shopajax btn btn-xs btn-primary']) }}
							<!--<a href="shop/cartadd" class="btn btn-xs btn-primary">Back</a>-->
            			{{Form::close()}}
            			</div>
					</div> 
					<div class="grid-5 push-1 omega centered text-description">
						<!--text-->
						<h4 class="segoe">{{$product->title}}</h4>
						<p class="segoe">{{$product->subtitle}}</p>
						<h4 class="segoe">${{number_format(($product->price)/100,2)}}</h4>	
						<p class="segoe">{{$product->description_1}}</p>	
						<p class="segoe">{{$product->description_2}}</p>	
						<p class="segoe">{{$product->description_3}}</p>	
						<p class="segoe">{{$product->description_4}}</p>	
					</div>
					</div>
					<?$form_index ++;?>
					@endforeach
				</div>
			</div>
		</div> 
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script><?  include_once(public_path().'/packages/menu-script.js');?></script>
@stop