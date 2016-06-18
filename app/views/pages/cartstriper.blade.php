@extends('layout')
{{ HTML::style( asset('css/cart.css') ) }}
@section('content')
<title>Cart Payment</title>

<?php require_once(public_path().'/stripe/lib/Stripe/Stripe.php');
$cart_instance = Session::get('cart_instance');
Cart::instance($cart_instance); 
$content = Cart::content();
foreach($content as $row){$itemdescription = $row['name'];}
if (Cart::count()>=2){$itemdescription = (Cart::count().'&nbsp;images');}

$amountincents = Cart::total();
$amountindollars= $amountincents/100;
$receipt_email ='john@jjc.me';
$cardholder_name = Input::get('cardholder_name');
if(Auth::user()){
	if (Auth::user()->email) $receipt_email=Auth::user()->email;
	elseif(Auth::user()->oauth_email) $receipt_email=Auth::user()->oauth_email;
}
?>
<div class="cartstriper merri">
    <h3>Pay <span class="julie">Juliet Corley</span> $<?=$amountindollars?> for <?=$itemdescription?></h3>
        <form action="{{url('payment/pay')}}" method="POST"> {{--pay or test pay uses different stripe keys--}}
            <input name ="amountincents" type="hidden" value="<?=$amountincents?>">
            <input name ="itemdescription" type="hidden" value="<?=$itemdescription?>" >
            <input name ="receipt_email" type="hidden" value="<?=$receipt_email?>">
            <label style="padding-top: 10px;">Copyright Licensee:&nbsp;</label>
            <input name="cardholder_name" type="text" placeholder="Enter name of Licensee" style="border-radius:6px;padding-left:5px;width:220px;">
            <br><br>
            <script
                src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button waiting"
                data-key="{{Config::get($_ENV['STRIPE_CONFIG'])}}"
                data-amount="<?=$amountincents;?>"
                data-metadata={'entered-card-name':'<?$cardholder_name?>'}
                data-name="JulietCorley.com"
                data-description="<?=$itemdescription;?>"
                data-receipt_email="<?=$receipt_email;?>"
                data-zip-code="true"
                data-label="Proceed to Stripe Payment Form"
                data-image="">
            </script>
        </form>

</div>

@stop
