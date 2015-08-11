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
			<div id='cssmenu' class="grid-5 alpha">
				<div class="grid-5 jccolouringlogo alpha">
					<p>&nbsp;</p>
				</div>
				@include('includes.main_menu')
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
			<?$form_id = 'form-'.$form_index;?>
			<div class="grid-9 push-1 raised">
				<div class="grid-4 alpha image-column">
					<img src="{{$product->small_size_image->image_url}}" width="270px" />
				</div>
				<div class="grid-4 push-2 omega centered lowered">
					<p class="segoe">{{$product->description_1}}</p>
					<p class="segoe">{{$product->description_2}}</p>
					<p class="segoe">${{number_format(($product->price)/100,2)}}<p>
					{{--add to separate cart function wothout prior purchase--}}
                    {{Form::open(array('id' => $form_id, 'url' => "/shop/cartadd?return_url=$url",'class' => 'shopform form-addfish'))}}
                    	{{ Form::hidden('productId', $product->id)}}
						{{ Form::submit('Add to Cart', ['class' => 'colouringajax btn btn-xs btn-primary']) }}
						{{--<a href="#" class="btn btn-xs btn-primary opaque" title="not yet enabled">Add to Cart</a>--}}
					{{Form::close()}}
						
				</div>  
			</div>
			@endforeach  
			</div> 
		</div> 
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script><?  include_once(public_path().'/packages/menu-script.js');?></script>
@endsection
