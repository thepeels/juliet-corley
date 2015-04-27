<?php
require_once(public_path().'/stripe/lib/Stripe/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_4Nlx9yNGz0dopBKex7XygdEX",//test keys
  "publishable_key" => "pk_test_4NlxkkNmfDOegqOGQ61paMpx"
);

Stripe::setApiKey($stripe['secret_key']);
?>