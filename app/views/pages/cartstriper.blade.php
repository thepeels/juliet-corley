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
$year = ((int)date('y'))*100000;
$amountincents = Cart::total();
$amountindollars= $amountincents/100;
$receipt_email = Input::get('receipt_email');
$cardholder_name = Input::get('cardholder_name');
$last_purchase = Purchase::orderBy('id', 'desc')->first();
$purchase_number = ($last_purchase->id)+$year+1;
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
            <input name ="purchase_number" type="hidden" value="<?=$purchase_number;?>">
            <label>Copyright Licensee:&nbsp;</label>
            <input name="cardholder_name" type="text" placeholder="Enter name of Licensee">
            <br><br>
            <script
                src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button waiting"
                data-key="{{$_ENV['STRIPE_PUBLIC_KEY']}}"
                data-amount="<?=$amountincents;?>"
                data-metadata={'entered-card-name':'<?$cardholder_name?>','purchase_number':'<?=$purchase_number;?>'}
                data-name="JulietCorley.com"
                data-description="<?=$itemdescription;?>"
                data-receipt_email="<?=$receipt_email;?>"
                data-label="Proceed to Stripe Payment Form"
                data-image="">
            </script>
        </form>

</div>

@stop
