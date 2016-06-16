@extends('layout')
{{ HTML::style( asset('css/cart.css') ) }}
@section('content')
<title>Cart Payment</title>

<?php require_once(public_path().'/stripe/config.php');
$cart_instance = Session::get('cart_instance');
Cart::instance($cart_instance); 
$content = Cart::content();
foreach($content as $row){$itemdescription = $row['name'];}
if (Cart::count()>=2){$itemdescription = (Cart::count().'&nbsp;images');}

$amountincents = Cart::total();
$amountindollars= $amountincents/100;
$receipt_email ='john@jjc.me';
//$cardholder_name = Input::get('cardholder_name');
if(Auth::user()){
	if (Auth::user()->email) $receipt_email=Auth::user()->email;
	elseif(Auth::user()->oauth_email) $receipt_email=Auth::user()->oauth_email;
}
#$itemdescription = Cart::count().'&nbsp;items';
#$itemdescription = Input::get('itemdescription');
if (App::environment('local')){
    $form_url = 'payment/pay';
    $config_key = 'stripetest.stripe.public';
} else {
    $form_url = 'payment/pay';
    $config_key = 'stripe.stripe.public';
}
?>
<div class="cartstriper">
    
<h3>Pay <span class="julie">Juliet Corley</span> $<?=$amountindollars?> for <?=$itemdescription?></h3>
<form action="{{url($form_url)}}" method="POST"> {{--pay or test pay uses different stripe keys--}}
	<input name ="amountincents" type="hidden" value="<?=$amountincents?>">
	<input name ="itemdescription" type="hidden" value="<?=$itemdescription?>" style = border-radius:5px;>
	<input name ="receipt_email" type="hidden" value="<?=$receipt_email?>">
	
</br> 
	

  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button waiting"
    data-key="{{Config::get($config_key)}}"//stripe.stripe.public - or stripetest.stripe.public
    data-amount="<?=$amountincents;?>"
    data-name="JulietCorley.com"
    data-description="<?=$itemdescription;?>"

    data-receipt_email="<?=$receipt_email;?>"
    data-zip-code="true"
    data-billing-address="true"
    data-image="">
  </script>


</form>
<p><em>(Sometimes, especially with Firefox, a pop-up indicates that a script has stopped, please 
    select 'continue', be patient, and stripe will shortly complete its job.)</em></p>
</div>

@stop
