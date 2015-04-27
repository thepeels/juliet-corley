<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<script type="javascript">
	function showbutton(){
		$('.waiting')FadeIn(1000);
		document.onload = showbutton;
	}
</script>
<title>Stripe</title>
 
<?php require_once(public_path().'/stripe/config.php');

$amountindollars = Input::get('amountindollars');
$amountincents= $amountindollars*100;
$itemdescription = Input::get('itemdescription');
?>
<h2>Pay Juliet Corley $<?=$amountindollars?> for <?=$itemdescription?></h2>
<h4>Please wait for page to finish loading before proceeding.</h4>
<form action="{{url('payment/pay')}}" method="POST"> {{--pay or test pay uses different stripe keys--}}
	<input name ="amountincents" type="hidden" value="<?=$amountincents?>">
	<input name ="itemdescription" type="hidden" value="<?=$itemdescription?>">


  <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button waiting"
    data-key="{{Config::get('stripe.stripe.public')}}"
    data-amount="<?=$amountincents;?>"
    data-name="JulietCorley.com"
    data-description="<?=$itemdescription;?>"
    data-image="">
  </script>


</form>
</head>
