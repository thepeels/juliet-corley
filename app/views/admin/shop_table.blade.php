@extends('admin.layout')
@section('title')
<title>Product Table</title>
@stop

@section('attached-nav')
    <p class="attached-nav">
        <a href="/admin/shop/add" class="btn btn-primary">Add a Product</a>
        <a href="/admin/shop/addpdf" class="btn btn-primary">Add a .pdf (colouring)</a>
    </p>
@stop
@section('content')
<div class="container-16">
	@foreach ($products as $product)
		<div class="grid-16">
			<div class=" grid-4 alpha">
			<img src="{{$product->small_size_image->image_url}}" width="210px"></br></br>
			 
			</div>
			<div class="grid-1">
				<p>Position<br/>{{$product->page_order}}</p>
				<a href="/admin/shop/delete/{{ $product->id }}" 
	                class="btn btn-danger btn-xs"
	                style="width:55px"
	                title="Delete Item and all associated images">Delete
	            </a>	
				<a href="/admin/shop/edit/{{ $product->id }}" 
	                class="btn btn-info btn-xs"
	                style="width:55px"
	                title="Edit Item ">Edit
	            </a>	
			</div>
			<div class="push-1 grid-7 omega">
				<p><em>{{$product->name}}</em>&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;(name)</p>
				<h4>{{$product->title}}</em>&nbsp;&nbsp;. . . . . .&nbsp;&nbsp;{{$product->subtitle}}</h4>
				<p>${{number_format(($product->price)/100,2)}}</p>	
				<p>{{$product->description_1}}</p>	
				<p>{{$product->description_2}}</p>	
				<p>{{$product->description_3}}</p>	
				<p>{{$product->description_4}}</p>	
				<p>{{$product->product_type}}&nbsp;&nbsp;. . . . . .&nbsp;&nbsp;{{$product->product_sub_type}}</p>
				<hr/>	
			</div>
		</div>
	@endforeach
</div>
@stop