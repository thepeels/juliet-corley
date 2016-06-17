@extends('layout')
{{ HTML::style( asset('css/cart.css') ) }}
@section('content')
<title>Payment - Stripe</title>

<?php require_once(public_path().'/stripe/lib/Stripe/Stripe.php');
$amountindollars = Input::get('amountindollars');
$amountincents= $amountindollars*100;
$itemdescription = Input::get('itemdescription');
$cardholder_name = Input::get('cardholder_name');
$receipt_email = Input::get('receipt_email');
//dd($cardholder_name);

?>
<div class="cart merri">
    <h3>Pay <span class= "julie">Juliet Corley</span> $<?=$amountindollars?> for <?=$itemdescription?></h3>
    <form action="{{url('payment/singlepayment')}}" method="POST">
        <input name ="amountincents" type="hidden" value="<?=$amountincents;?>">
        <input name ="itemdescription" type="hidden" value="<?=$itemdescription;?>">
        <input name ="receipt_email" type="hidden" value="<?=$receipt_email;?>">

        <script
        src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button waiting" style="display:none"
        data-key="{{Config::get($_ENV['STRIPE_CONFIG'])}}"//stripe.stripe.public - or stripetest.stripe.public
        data-amount="<?=$amountincents;?>"
        data-metadata={'card-holder-name':'<?$cardholder_name?>'}
        data-name="JulietCorley.com"
        data-description="<?=$itemdescription;?>"
        data-image="">
        data-receipt_email="<?=$receipt_email;?>"
        data-zip-code="true"
        </script>
     </form>
</div>
@stop
