@extends('admin.layout')

@section('title')
<title>Add Products</title>
@stop

@section('content')
    
    <h2>Add a Colouring .pdf</h2>
    <p><em>These items are all entered as 'Product Type -> colouring </em></p>
    {{Form::open(array('url' => "admin/shop/addpdf",'class' => 'form-addfish', 'files' => true))}}
        <fieldset>
            {{--{{Form::open(array('url' => "fish/validateaddfish",'class' => 'form-addfish', 'files' => true, 'method' => 'post'))}}--}}
            <div class="form-group">
                {{ Form::label('name', 'Enter Product Name') }} <em> - this line not displayed</em>
                {{ Form::input('text', 'name', null, ['class' => 'form-control col-6', 'id' => 'name', 'placeholder' => 'item name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Enter Price ($AUD)') }} <em> - for free items see sub-type below</em>
                {{ Form::input('text', 'price', null, ['class' => 'form-control col-6', 'id' => 'price', 'placeholder' => 'price $AUD']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Enter Title') }} <em> - bold type</em>
                {{ Form::input('text', 'title', null, ['class' => 'form-control col-6', 'id' => 'title', 'placeholder' => 'title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Enter Description - first paragraph') }} <em> - all descriptions are optional -
                		but this line is the only text shown beside free pdf download</em>
                {{ Form::input('text', 'description_1', null, ['class' => 'form-control col-6 row-4', 'id' => 'description_1', 'placeholder' => 'paragraph / sentence']) }}
            </div>
            <div class="form-group">
            	{{ Form::label('name', 'Enter Description - second paragraph') }}
            	{{ Form::input('text', 'description_2', null, ['class' => 'form-control col-6 row-4', 'id' => 'description_2', 'placeholder' => 'paragraph / sentence']) }}
            </div>
            {{Form::input('hidden','product_type','colouring')}}
            <div class="form-group">
                {{ Form::label('name', 'Enter "free" if to be free download') }} <em>- to change back from 'free' the item must be deleted </br> and re-entered, 
                	simply editing the product sub_type will not move the file to the required folder </em>
                {{ Form::input('text', 'product_sub_type', null, ['class' => 'form-control col-6 row-4', 'id' => 'product_sub_type', 'placeholder' => 'subtype']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Enter Page display position ') }} <em> - smallest number first, duplicate numbers -> most recent entry first</em>
                {{ Form::input('text', 'page_order', null, ['class' => 'form-control col-6 row-4', 'id' => 'product_sub_type', 'placeholder' => 'display position']) }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Select page display image') }}
                {{ Form::file('image') }}
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Select .pdf File') }}
                {{ Form::file('pdf') }}
            </div>
            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                <a href="/admin/shop" class="btn btn-default">Back</a>
            </div>
        </fieldset>
    {{form::close()}}

@stop

