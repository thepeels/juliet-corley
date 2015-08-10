<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php if (App::environment('local')){echo("
<link href='http://fonts.googleapis.com/css?family=Trykker' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Overlock' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,400italic' rel='stylesheet' type='text/css'>
");}
else{echo("
<link href='https://fonts.googleapis.com/css?family=Trykker' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Overlock' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,400italic' rel='stylesheet' type='text/css'>
");}
?>
<link rel='stylesheet' href='/css/bootstrap.css' type='text/css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/fonts/MyFontsWebfontsKit.css" type="text/css">
{{ HTML::style( asset('css/cart.css') ) }}
</head>
<body>
	
<title>Payment - Stripe</title>
 
<?php require_once(public_path().'/stripe/config.php');
$amountindollars = Input::get('amountindollars');
$amountincents= $amountindollars*100;
$itemdescription = Input::get('itemdescription');
$receipt_email = Input::get('receipt_email');
?>
<div class="cart merri">
<h3></br> Pay <span class= "julie">Juliet Corley</span> $<?=$amountindollars?> for <?=$itemdescription?></h3></br> 
<h5>Please wait for page to finish loading before proceeding.</h5></br> 
<form action="{{url('payment/testsinglepayment')}}" method="POST"> {{--pay or testpay uses different stripe keys--}}
	<input name ="amountincents" type="hidden" value="<?=$amountincents;?>">
	<input name ="itemdescription" type="hidden" value="<?=$itemdescription;?>">
	<input name ="receipt_email" type="hidden" value="<?=$receipt_email;?>">


  <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button waiting" style="display:none"
    data-key="{{Config::get('stripetest.stripe.public')}}"//stripe.stripe.public - or stripetest.stripe.public
    data-amount="<?=$amountincents;?>"
    data-name="JulietCorley.com"
    data-description="<?=$itemdescription;?>"
    data-receipt_email="<?=$receipt_email;?>"
    data-image="">
  </script>

</form>
</div>
<script type="javascript">
	function showbutton(){
		$('.waiting')FadeIn(2000);
		document.onload = showbutton;
	}
</script>

</body>
