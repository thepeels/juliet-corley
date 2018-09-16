@extends('layout')
@section('stylesheets')<link href='/css/cart.css' rel='stylesheet' type='text/css'>@endsection
@section('content')

<div class="cart">
    
    <h2 class="julie merri">JulietCorley.com</h2>
    <!--<h2 class= "caption h3">Cart for {{Session::get('dest_email')}}</h2>-->
    <h2 class= "caption h3 merri">Cart for {{$owner}}</h2>
    <h3><a href="/icon/dumpcart" class="btn btn-custom-danger btn-sm">Empty Cart</a></h3>
    
        <table class="cart">
            <tr>
                <th>Image</th>
                <th>Price</th>
                <th>No.</th>
                <th></th><!-- empty <td> required for border in webkit browsers-->
            </tr>
        
            {{cartTabulate()}}   
        
            <tr>
                {{cartSummary()}}
                <td></td>
            </tr>
        </table>
    {{Form::open(array('url' => '/cardpay','class'=>'form-inline'))}}
    <br>
        {{Form::label('text','Please enter Name of Licensee:')}}
        {{Form::input('text','licensee',null,['class'=>'newclass','placeholder'=>'name','size'=>'35'])}}<br>
        {{$errors->first('licensee','<small class="red-error">:message</small>')}}
        </br>
    	@if(Cart::instance('main')->total()!=0)
	        {{'</br>'}}
            {{Form::submit('Pay by Card',['class'=>'btn btn-primary'])}}
    	@endif

    	{{Form::close()}}    <h3><a href="/icon/continue"class="btn btn-info">Continue Shopping</a></h3>
</div>
@endsection