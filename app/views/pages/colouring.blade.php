@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/grid24.css'))}}
{{ HTML::style( asset('css/info.css') ) }}
{{ HTML::style( asset('css/menu-jquery.css'))}}
{{ HTML::style( asset('css/jchome.css') ) }}

@stop
<?$div_index = 1;
$url = Request::url();
$return_url = urlencode($url);
?>
@section('body-class')
<body class="colouring">
@stop
@section('title')
<title>Colouring Pages</title>
@stop
@section('content')
<div class="shading-container">
<div class="container-24">
	<div class="grid-24">
		<div class="grid-18 push-4">
			<div class="grid-5 alpha">
				<div class="grid-5 jccolouringlogo alpha">
					<p>&nbsp;</p>
				</div>
				<div id='cssmenu'>
				@include('includes.main_menu')
				</div>
				{{--@if((Cart::instance('main')->count())>0)--}}
				<div id="colouringcart" class="cart">
                    <h5> Cart Summary: <span id="cartresume">{{cartResume()}} </span></h5>
                   
                   <h3 class="arial"><a href="/icon/makecart?return_url={{$return_url}}" 
                            class="btn btn-primary btn-xs" id="themailaddress">View Cart / Checkout
                        </a>
                            &nbsp;&nbsp;</br>
                        <a href="/icon/ajaxdumpcart" 
                            class= " byajax btn btn-info btn-xs">Empty Cart
                        </a>
                    </h3>
                </div>
                {{--@endif--}}
			</div>
			<div class="grid-13 pull-2 omega"> 
			<div class="grid-13 omega colouringimage">
				<p class="segoe colouring">&nbsp;&nbsp;&nbsp;&nbsp;. . . a good way to</br>
					 relax and unwind</br> 
					 after a stressful</br>
					 &nbsp;day. Try my free</br>
					 &nbsp;&nbsp;&nbsp;&nbsp;pages, and see</br>  
      				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if it works</br>
      				 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for you :)
      			</p>
			</div>
			@foreach ($products as $product)
			<?$div_id = 'position-'.$div_index;?>
			@if (($product->product_sub_type) == 'free')
			{{--$product->full_size_image->image_url--}}
			<div class="grid-11 push-1 raised">
				<div class="grid-4 alpha image-column push-1">
					<img src="{{$product->small_size_image->image_url}}" width="60%" style="margin-left:20%"/>
				</div>
            <div id="{{$div_id}}" class="grid-5 push-2 omega centered lowered">
                
					<p class="segoe">{{$product->description_1}}</p>
					<p class="segoe">{{$product->description_2}}</p>
					<p class="segoe"><a href="/download/freepdfdownload/{{ Image::freeFile($product->full_size_image->image_path) }}/{{ $product->title }}">Download now</a></p>
            </div>
           </div>
            @else
			<div class="grid-11 push-1 raised">
				<div class="grid-4 alpha image-column push-1">
					<img src="{{$product->small_size_image->image_url}}" width="100%" />
				</div>
				<div id="{{$div_id}}" class="grid-5 push-2 omega centered lowered">
					<p class="segoe larger">{{$product->title}}</p>
					<p class="segoe">{{$product->subtitle}}</p>
					<p class="segoe">{{$product->description_1}}</p>
					<p class="segoe">{{$product->description_2}}</p>
					<p class="segoe">${{number_format(($product->price)/100,2)}}<p>
					{{--add to separate cart function wothout prior purchase--}}
                    {{Form::open(array( 'url' => "/shop/cartadd?return_url=$url",'class' => 'shopform form-addfish'))}}
                    	{{ Form::hidden('productId', $product->id)}}
                    	{{ Form::hidden('productType','ColouringPdf')}}
						{{ Form::submit('Add to Cart', ['class' => 'colouringajax btn btn-xs btn-primary']) }}
						{{--<a href="#" class="btn btn-xs btn-primary opaque" title="not yet enabled">Add to Cart</a>--}}
					{{Form::close()}}
						
				</div>  
			</div>
			@endif
			<?$div_index ++;?>
			@endforeach  
			</div> 
		</div> 
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script><?  include_once(public_path().'/packages/menu-script.js');?></script>
@endsection
