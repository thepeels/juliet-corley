@extends('admin.layout')

@section('title')
<title>Edit Product</title>
@stop

@section('content')
	<p>Use this page to amend chosen fields and then Load the changes into the Record </p>
    <h2>Edit Product . . "{{$product->name}}"</h2>
            @if($product->product_sub_type == 'free')
				<p style="color:#F00">This is a FREE download, to change it to PAID FOR it must be deleted and re-entered.</p>
			@endif
    {{Form::open(array('url' => "admin/shop/edit",'class' => 'form-addfish', 'files' => true))}}
    		<div class="form-group">
            	{{ Form::submit('Load Edits', ['class' => 'btn btn-sm btn-primary']) }}
            	<a href="/admin/shop" class="btn btn-default btn-sm">Back</a>
            </div>
        <fieldset>
            {{--{{Form::open(array('url' => "fish/validateaddfish",'class' => 'form-addfish', 'files' => true, 'method' => 'post'))}}--}}
            {{ Form::hidden('productId', $product->id)}}
            <div class="form-group">
            	{{ Form::label('name', 'Edit Product Name') }} <em> - this line not displayed</em>
            	{{ Form::input('text', 'name', $product->name, ['class' => 'form-control col-6', 'id' => 'name', 'placeholder' => 'item name']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Price ($AUD)') }}
            	{{ Form::input('text', 'price', $product->price/100,['class' => 'form-control col-6', 'id' => 'price', 'placeholder' => 'price $AUD']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Title') }} <em> - bold type</em>
            	{{ Form::input('text', 'title', $product->title, ['class' => 'form-control col-6', 'id' => 'title', 'placeholder' => 'title']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Subtitle') }} <em> - normal type</em>
            	{{ Form::input('text', 'subtitle', $product->subtitle, ['class' => 'form-control col-6', 'id' => 'subtitle', 'placeholder' => 'subtitle']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Description - first paragraph') }} <em> - all descriptions are optional</em>
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
            @if($product->product_type != 'colouring')
            <div class="form-group">
            	{{ Form::label('name', 'Edit Product Type or Category') }} <em> - types may be used in the future for sorting, can be added later</em>
            	{{ Form::input('text', 'product_type', $product->product_type, ['class' => 'form-control col-6 row-4', 'id' => 'product_type', 'placeholder' => 'type']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Edit Product subType ') }} 
            	{{ Form::input('text', 'product_sub_type', $product->product_sub_type, ['class' => 'form-control col-6 row-4', 'id' => 'product_sub_type', 'placeholder' => 'subtype']) }}
            </div>
            @endif
            <div class="form-group">
            	{{ Form::label('name', 'Edit Page display position ') }} <em> - smallest number first, duplicate numbers - most recent entry first</em>
            	{{ Form::input('text', 'page_order', $product->page_order, ['class' => 'form-control col-6 row-4', 'id' => 'product_sub_type', 'placeholder' => 'display position']) }}
            </div>
            <!--<div class="form-group">//but not needed in edit - can delete
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
