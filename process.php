<?php

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
require_once('vendor/autoload.php');
\Stripe\Stripe::setApiKey("sk_test_52kYTPdthw2AD6uKOPpbBLCo");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];

// Charge the user's card:
$charge = \Stripe\Charge::create(array(
  "amount" => 750,
  "currency" => "eur",
  "description" => "Example charge",
  "source" => $token,
));


?>
