@extends('layout')
{{ HTML::style( asset('css/cart.css') ) }}

@section('body-class')
<body class="stripe-payments">
@stop

@section('content')



<div class='cart merri'>
<h2>Pay <span class="julie">Juliet Corley</span></h2>
	

<h5>Please fill in the boxes and submit 
    to make a card payment handled by Stripe.com
</h5>
<fieldset class="stripe-fieldset">

{{Form::open(array('url' => "payment" ,'id' => 'payment-form'))}}{{--what goes in url here--}}

{{Form::label('text','Amount in AUS$')}}
{{Form::input('text','amountindollars',null,['class'=>'newclass aligned-right','placeholder'=>'AUD$','size'=>'5'])}}<br>
{{$errors->first('amountindollars','<small class="red-error">:message</small>')}}
</br>
{{Form::label('text','Please send my receipt e-mail to:')}}
{{Form::input('email','receipt_email',null,['class'=>'newclass aligned-right','placeholder'=>'e-mail','size'=>'35'])}}<br>
{{$errors->first('receipt_email','<small class="red-error">:message</small>')}}
{{--</br>
{{Form::label('text','CardHolder Name (as it appears on the card):')}}
{{Form::input('text','cardholder_name',null,['class'=>'newclass aligned-right','placeholder'=>'name','size'=>'35'])}}<br>
{{$errors->first('cardholder_name','<small class="red-error">:message</small>')}}--}}
</br>
<span class="payment-errors"></span>
{{Form::label('text','Description of item agreed for purchase')}}
{{Form::input('text','itemdescription',null,['class' => 'newclass','placeholder' => 'Item description','size'=>'35'])}}
{{$errors->first('itemdescription','<small class="red-error">:message</small>')}}
</span><br>
<span>
	</br>
{{Form::submit('Pay with Stripe',['class'=>'btn btn-primary btn-sm'])}}
</span> 
{{Form::close()}}
</fieldset>
<h5>
    N.B. No card data are stored or processed on my website, 
    all the secure stuff is handled remotely by 
    <a href ="https://stripe.com" target="blank">Stripe.com</a>
</h5>
</div> 
@stop
