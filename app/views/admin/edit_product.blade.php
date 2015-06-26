@extends('admin.layout')

@section('title')
<title>Edit Product</title>
@stop

@section('content')
	<p>Use this page to amend chosen fields and then Load the changes into the Record</p>
    <h2>Edit Product . . "{{$product->name}}"</h2>
    {{Form::open(array('url' => "admin/shop/edit",'class' => 'form-addfish', 'files' => true))}}
    		<div class="form-group">
            	{{ Form::submit('Load Edits', ['class' => 'btn btn-sm btn-primary']) }}
            	<a href="/admin/shop" class="btn btn-default btn-sm">Back</a>
            </div>
        <fieldset>
            {{--{{Form::open(array('url' => "fish/validateaddfish",'class' => 'form-addfish', 'files' => true, 'method' => 'post'))}}--}}
            {{ Form::hidden('productId', $product->id)}}
            <div class="form-group">
            	{{ Form::label('name', 'Edit Product Name') }}
            	{{ Form::input('text', 'name', $product->name, ['class' => 'form-control col-6', 'id' => 'name', 'placeholder' => 'item name']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Price ($AUD)') }}
            	{{ Form::input('text', 'price', $product->price/100,['class' => 'form-control col-6', 'id' => 'price', 'placeholder' => 'price $AUD']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Title') }}
            	{{ Form::input('text', 'title', $product->title, ['class' => 'form-control col-6', 'id' => 'title', 'placeholder' => 'title']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Subtitle') }}
            	{{ Form::input('text', 'subtitle', $product->subtitle, ['class' => 'form-control col-6', 'id' => 'subtitle', 'placeholder' => 'subtitle']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Description - first paragraph') }}
            	{{ Form::input('text', 'description_1', $product->description_1, ['class' => 'form-control col-6 row-4', 'id' => 'description_1', 'placeholder' => 'paragraph / sentence']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Description - second paragraph') }}
            	{{ Form::input('text', 'description_2', $product->description_2, ['class' => 'form-control col-6 row-4', 'id' => 'description_2', 'placeholder' => 'paragraph / sentence']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Description - third paragraph') }}
            	{{ Form::input('text', 'description_3', $product->description_3, ['class' => 'form-control col-6 row-4', 'id' => 'description_3', 'placeholder' => 'paragraph / sentence']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Description - fourth paragraph') }}
            	{{ Form::input('text', 'description_4', $product->description_4, ['class' => 'form-control col-6 row-4', 'id' => 'description_4', 'placeholder' => 'paragraph / sentence']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Product Type or Category') }}
            	{{ Form::input('text', 'product_type', $product->product_type, ['class' => 'form-control col-6 row-4', 'id' => 'product_type', 'placeholder' => 'type']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Product subType ') }}
            	{{ Form::input('text', 'product_sub_type', $product->product_sub_type, ['class' => 'form-control col-6 row-4', 'id' => 'product_sub_type', 'placeholder' => 'subtype']) }}
            </div>
            <!--<div class="form-group">
                {{ Form::label('name', 'Select item image') }}
                {{ Form::file('image') }}
            </div>-->
            <div class="form-group">
            	{{ Form::submit('Load Edits', ['class' => 'btn btn-sm btn-primary']) }}
            	<a href="/admin/shop" class="btn btn-sm btn-default">Back</a>
            </div>
        </fieldset>
    {{form::close()}}

@stop
