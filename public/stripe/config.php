<?php
require_once(public_path().'/stripe/lib/Stripe/Stripe.php');

$stripe = array(
  "secret_key"      => $_ENV['STRIPE_KEY'],//test keys
  "publishable_key" => $_ENV['STRIPE_PUBLIC_KEY']
);

//Stripe::setApiKey($stripe['secret_key']);
?>