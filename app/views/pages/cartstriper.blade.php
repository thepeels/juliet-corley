@extends('layout')
{{ HTML::style( asset('css/cart.css') ) }}
@section('content')
<script type="javascript">
	function showbutton(){
		$('.waiting')FadeIn(1000);
		document.onload = showbutton;
	}
</script>
<title>Cart Payment</title>

<?php require_once(public_path().'/stripe/config.php'); 
$content = Cart::content();
foreach($content as $row){$itemdescription = $row['name'];}
if (Cart::count()>=2){$itemdescription = (Cart::count().'&nbsp;images');}

$amountincents = Cart::total();
$amountindollars= $amountincents/100;
#$itemdescription = Cart::count().'&nbsp;items';
#$itemdescription = Input::get('itemdescription');
?>
<div class="cartstriper">
    
<h3>Pay <span class="julie">Juliet Corley</span> $<?=$amountindollars?> for <?=$itemdescription?></h3>
<h4>Please wait for page to finish loading before proceeding.</h4>
<form action="{{url('payment/testpay')}}" method="POST"> {{--pay or test pay uses different stripe keys--}}
	<input name ="amountincents" type="hidden" value="<?=$amountincents?>">
	<input name ="itemdescription" type="hidden" value="<?=$itemdescription?>">

  <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button waiting"
    data-key="{{Config::get('stripetest.stripe.public')}}"
    data-amount="<?=$amountincents;?>"
    data-name="JulietCorley.com"
    data-description="<?=$itemdescription;?>"
    data-image="">
  </script>


</form>
<p><em>(Sometimes, especially with Firefox, a pop-up indicates that a script has stopped, please 
    select 'continue', be patient, and stripe will shortly complete its job.)</em></p>
</div>
@stop
