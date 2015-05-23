<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<script type="javascript">
	function showbutton(){
		$('.waiting')FadeIn(2000);
		document.onload = showbutton;
	}
</script>
<title>Stripe</title>
 
<?php require_once(public_path().'/stripe/config.php');

$amountindollars = Input::get('amountindollars');
$amountincents= $amountindollars*100;
$itemdescription = Input::get('itemdescription');
$receipt_email = Input::get('receipt_email');
?>
<h2>Pay Juliet Corley $<?=$amountindollars?> for <?=$itemdescription?></h2>
<h4>Please wait for page to finish loading before proceeding.</h4>
<form action="{{url('payment/testpay')}}" method="POST"> {{--pay or testpay uses different stripe keys--}}
	<input name ="amountincents" type="hidden" value="<?=$amountincents;?>">
	<input name ="itemdescription" type="hidden" value="<?=$itemdescription;?>">
	<input name ="receipt_email" type="hidden" value="<?=$receipt_email;?>">


  <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button waiting"
    data-key="{{Config::get('stripetest.stripe.public')}}"//stripe.stripe.public - or stripetest.stripe.public
    data-amount="<?=$amountincents;?>"
    data-name="JulietCorley.com"
    data-description="<?=$itemdescription;?>"
    data-receipt_email="<?=$receipt_email;?>"
    data-image="">
  </script>


</form>
</head>
