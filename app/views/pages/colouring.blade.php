@extends('layout')
@section('stylesheets')
{{ HTML::style( asset('css/grid24.css'))}}
{{ HTML::style( asset('css/info.css') ) }}
{{ HTML::style( asset('css/menu-jquery.css'))}}
{{ HTML::style( asset('css/jchome.css') ) }}
<meta property="og:url"			content="https://julietcorley.com/colouring"/>
<meta property="og:type"		content="product"/>
<meta property="og:title"		content="colouring downloads"/>
<meta property="og:site_name"	content="Juliet Corley"/>
<meta property="og:description"	content="Colouring can be a good way to relax and unwind after a stressful day.
								Try my colouring pages ansd see if they work for you &#9786;"/>
<meta property="og:image"		content="https://julietcorley.com/images/bg-images/colouring.jpg"/>
@stop

@section('body-class')
<body class="colouring">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
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
                    <h5> Cart Summary: <span id="cartresume">{{shopResume()}} </span></h5>
                   
                   <h3 class="arial"><a href="/icon/makeshopcart"
                            class="btn btn-primary btn-xs" id="themailaddress">View Cart / Checkout
                        </a>
                            &nbsp;&nbsp;</br>
                        <p>
                        <a href="/icon/ajaxdumpshopcart" 
                            class= " byajax btn btn-info btn-xs">Empty Cart
                        </a></p>
                    </h3>
                </div>
                {{--@endif--}}
                <div class="fb-like merri"  
	                data-href="localhost/colouring" 
	                data-width="200" 
	                data-layout="standard" 
	                data-action="like" 
	                data-show-faces="true" 
	                data-share="true"
	                data-colorscheme="light"
	                style="margin-top:35px">
                </div>
                <div>
                	<!-- Facebook Badge START 
                	<a href="https://www.facebook.com/pages/Colouring-pages/1483350095298518" title="Colouring pages" target="_blank">
                		<img class="img" src="https://badge.facebook.com/badge/1483350095298518.11042.1627361987.png" style="border: 0px;" alt=""width="140px"/> <!----><!--                			
                	</a><br />
                	<a href="https://www.facebook.com/pages/Colouring-pages/1483350095298518" title="Colouring pages" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" target="_blank">
                		Colouring Pages on FaceBook
                	</a><br />
                			 Facebook Badge END -->
                </div>
                <div>
                </br><a style="font:normal 12/12px 'Merriweather' serif;color:#23527c;" href="https://www.facebook.com/pages/Colouring-pages/1483350095298518?sk=photos"
                	>my Colouring Pages on facebook
                </a>
                </div>
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
			<?php $div_id = 'position-'.$div_index;?>
			@if (($product->product_sub_type) == 'free') <!-------FREE DownLOAD ------------------>
			{{--$product->full_size_image->image_url--}}
			<div class="grid-11 push-1 raised">
				<div class="grid-4 alpha image-column push-1">
					<img src="{{$product->small_size_image->image_url}}" width="80%" style="margin-left:10%"/>
				</div>
            <div id="{{$div_id}}" class="grid-5 push-2 omega centered lowered">
                	<p class="segoe larger">{{$product->title}}</p>
					<p class="segoe">{{$product->subtitle}}</p>
					<p class="segoe">{{$product->description_1}}</p>
					<p class="segoe">{{$product->description_2}}</p>
					<p class="segoe">
						<a href="/download/freepdfdownload/{{ Image::freeFile($product->full_size_image->image_path) }}/{{ $product->title }}"
							 onclick="return disableDoubleClick()">
							Download now
						</a></p>
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
					{{--add to separate cart function without prior purchase--}}
                    {{ Form::open(array( 'url' => "/shop/cartadd",'class' => 'shopform form-addfish'))}}
                    	{{ Form::hidden('productId', $product->id)}}
                    	{{ Form::hidden('productType','ColouringPdf')}}
						{{ Form::submit('Add to Cart', ['class' => 'colouringajax btn btn-xs btn-primary']) }}
					{{ Form::close()}}
						
				</div>  
			</div>
			@endif
			<?php $div_index ++;?>
			@endforeach  
			</div> 
		</div> 
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php include_once(public_path('packages/menu-script.php'));?>

@endsection
