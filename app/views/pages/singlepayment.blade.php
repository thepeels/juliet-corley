@extends('layout')
{{ HTML::style( asset('css/cart.css') ) }}

@section('body-class')
<body class="stripe-payments">
@stop

@section('content')



<div class='cart'>
<h3>Pay Juliet Corley</h3>
<fieldset>
	

<h4>Please fill in the boxes and submit 
    to make a card payment handled by Stripe.com
</h4>

{{Form::open(array('url' => "payment" ,'id' => 'payment-form'))}}{{--what goes in url here--}}

{{Form::label('text','Amount in AUS$')}}
{{Form::input('text','amountindollars',null,['class'=>'newclass aligned-right','placeholder'=>'AUD$','size'=>'5'])}}<br>

{{Form::label('text','Receipt e-mail')}}
{{Form::input('text','receipt_email',null,['class'=>'newclass aligned-right','placeholder'=>'e-mail','size'=>'40'])}}<br>

<span class="payment-errors"></span>
{{Form::label('text','Description of item agreed for purchase')}}
{{Form::input('text','itemdescription',null,['class' => 'newclass','placeholder' => 'Item description','size'=>'40'])}}
</span><br>
<span>
{{Form::submit('Pay with Stripe',['class'=>'btn btn-primary btn-sm'])}}
</span> 
{{Form::close()}}
</fieldset>
<h4>
    N.B. No card data are stored or processed on my website, 
    all the secure stuff is handled remotely by 
    <a href ="https://stripe.com" target="blank">Stripe.com</a>
</h3>
</div> 
@stop
