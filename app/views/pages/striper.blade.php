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
$year = ((int)date('y'))*10000;
$last_purchase = Purchase::orderBy('id', 'desc')->first();
$purchase_number = ($last_purchase->id)+$year+1;
//dd($receipt_number);
//dd($cardholder_name);
//dd($_ENV['STRIPE_KEY']);
?>
<div class="cart merri" style="border-radius: 5px">
    <br>
    <h3>Pay <span class= "julie">Juliet Corley</span> $<?=$amountindollars?> for <?=$itemdescription?></h3>
    <br>
        <form action="{{url('payment/singlepayment')}}" method="POST">
            <input name ="amountincents" type="hidden" value="<?=$amountincents;?>">
            <input name ="itemdescription" type="hidden" value="<?=$itemdescription;?>">
            <input name ="receipt_email" type="hidden" value="<?=$receipt_email;?>">
            <input name ="purchase_number" type="hidden" value="<?=$purchase_number;?>">
            <label>Copyright Licensee:&nbsp;</label>
            <input name="cardholder_name" type="text" placeholder="Enter name of Licensee">
            <br><br>

            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button waiting"
                data-key="{{($_ENV['STRIPE_PUBLIC_KEY'])}}"
                data-amount="<?=$amountincents;?>"
                data-metadata={'entered-card-name':'<?$cardholder_name?>','purchase_number':'<?=$purchase_number;?>'}
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